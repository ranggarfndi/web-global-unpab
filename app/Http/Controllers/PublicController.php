<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Partner;
use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        // Mengatur bahasa tampilan berdasarkan session (default: id)
        $locale = session()->get('locale', 'id');
        App::setLocale($locale);

        // Ambil 3 program terbaru yang aktif
        $programs = Program::where('is_active', true)->latest()->take(3)->get();
        
        // Ambil semua partner yang aktif
        $partners = Partner::where('is_active', true)->get();

        return view('pages.home', compact('programs', 'partners'));
    }

    public function programs(Request $request)
    {
        // 1. Set Locale agar data yang tampil sesuai bahasa
        App::setLocale(session()->get('locale', 'id'));
        $locale = app()->getLocale(); // Ambil 'id' atau 'en'
        
        // 2. Base Query: Hanya ambil yang aktif
        $query = Program::where('is_active', true);

        // 3. Filter Pencarian (Support JSON Column)
        if ($request->filled('q')) {
            $search = trim($request->q); // Hapus spasi depan/belakang
            
            $query->where(function($q) use ($search, $locale) {
                // Cari di dalam JSON title berdasarkan locale aktif
                $q->where("title->{$locale}", 'like', "%{$search}%")
                  // ATAU cari di description
                  ->orWhere("description->{$locale}", 'like', "%{$search}%");
            });
        }

        // 4. Filter Status (Open/Closed Registration)
        if ($request->filled('status')) {
            if ($request->status == 'open') {
                // Deadline hari ini atau masa depan
                $query->whereDate('registration_deadline', '>=', now());
            } elseif ($request->status == 'closed') {
                // Deadline sudah lewat
                $query->whereDate('registration_deadline', '<', now());
            }
        }

        // 5. Filter Kategori (Inbound/Outbound)
        // Value dropdown: 'global_opportunities' (Outbound) atau 'experience_at_unpab' (Inbound)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 6. Eksekusi & Pagination
        // withQueryString() penting agar saat pindah halaman (page 2), filter tidak hilang
        $programs = $query->latest()->paginate(9)->withQueryString();
        $activeTarget = 'all';

        return view('pages.programs', compact('programs', 'activeTarget'));
    }

    public function programsByTarget(Request $request, $target)
    {
        App::setLocale(session()->get('locale', 'id'));
        $locale = app()->getLocale();
        
        // Base Query: Filter Target Audience dulu (student/lecturer/staff) + Aktif
        $query = Program::where('target_audience', $target)
                        ->where('is_active', true);

        // --- Logika Filter Sama Persis ---

        // 1. Filter Pencarian
        if ($request->filled('q')) {
            $search = trim($request->q);
            $query->where(function($q) use ($search, $locale) {
                $q->where("title->{$locale}", 'like', "%{$search}%")
                  ->orWhere("description->{$locale}", 'like', "%{$search}%");
            });
        }

        // 2. Filter Status
        if ($request->filled('status')) {
            if ($request->status == 'open') {
                $query->whereDate('registration_deadline', '>=', now());
            } elseif ($request->status == 'closed') {
                $query->whereDate('registration_deadline', '<', now());
            }
        }

        // 3. Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $programs = $query->latest()->paginate(9)->withQueryString();
        $activeTarget = $target; // Untuk menandai tab mana yang aktif di view

        return view('pages.programs', compact('programs', 'activeTarget'));
    }

    public function show($slug)
    {
        // Cari program berdasarkan slug yang aktif
        $program = Program::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Set bahasa (opsional jika sudah ada di middleware, tapi aman untuk ditaruh di sini)
        App::setLocale(session()->get('locale', 'id'));

        return view('pages.show', compact('program'));
    }

    public function partners(Request $request)
    {
        App::setLocale(session()->get('locale', 'id'));
        
        $query = Partner::where('is_active', true);

        // Logika Search
        if ($request->filled('q')) {
            $search = trim($request->q);
            $query->where('name', 'like', '%' . $search . '%');
        }

        $partners = $query->get(); // Kita ambil semua (get) atau bisa paginate jika data sangat banyak

        return view('pages.partners', compact('partners'));
    }

    public function organization(Request $request)
    {
        // 1. Mulai Query dasar (hanya yang aktif)
        $query = OrganizationMember::where('is_active', true);

        // 2. Cek apakah ada pencarian 'q' dari URL
        if ($request->has('q') && $request->q != '') {
            $search = $request->q;
            
            // Filter berdasarkan Nama ATAU Jabatan
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }

        // 3. Urutkan dan ambil data
        $members = $query->orderBy('sort_order', 'asc')->get();

        // 4. Kirim ke View
        return view('pages.about.organization', compact('members'));
    }

    // Fungsi untuk ganti bahasa di frontend
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['id', 'en'])) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}