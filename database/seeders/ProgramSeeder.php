<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            // --- OUTBOUND (Global Opportunities) ---
            [
                'cat' => 'global_opportunities', 'target' => 'student',
                'title' => ['id' => 'IISMA 2026: Beasiswa Pertukaran Luar Negeri', 'en' => 'IISMA 2026: Overseas Exchange Scholarship'],
                'overview' => ['id' => 'Program unggulan Kemendikbudristek untuk mahasiswa.', 'en' => 'Leading program for Indonesian students.'],
                'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800', 'days' => 60
            ],
            [
                'cat' => 'global_opportunities', 'target' => 'lecturer',
                'title' => ['id' => 'Erasmus+ Teaching Mobility di Spanyol', 'en' => 'Erasmus+ Teaching Mobility in Spain'],
                'overview' => ['id' => 'Kesempatan mengajar bagi dosen di universitas Eropa.', 'en' => 'Teaching opportunities for lecturers in European universities.'],
                'img' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=800', 'days' => 30
            ],
            [
                'cat' => 'global_opportunities', 'target' => 'staff',
                'title' => ['id' => 'Workshop Manajemen PT di National University of Singapore', 'en' => 'HE Management Workshop at NUS'],
                'overview' => ['id' => 'Pelatihan tata kelola internasional untuk tenaga kependidikan.', 'en' => 'International governance training for staff.'],
                'img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800', 'days' => 45
            ],
            [
                'cat' => 'global_opportunities', 'target' => 'student',
                'title' => ['id' => 'Summer School: Keamanan Cyber di Estonia', 'en' => 'Summer School: Cyber Security in Estonia'],
                'overview' => ['id' => 'Kursus singkat intensif tentang IT Security.', 'en' => 'Intensive short course on IT Security.'],
                'img' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800', 'days' => 90
            ],
            [
                'cat' => 'global_opportunities', 'target' => 'lecturer',
                'title' => ['id' => 'Fulbright Visiting Scholar Program', 'en' => 'Fulbright Visiting Scholar Program'],
                'overview' => ['id' => 'Pendanaan riset dosen di Amerika Serikat.', 'en' => 'Research funding for lecturers in the USA.'],
                'img' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800', 'days' => 120
            ],

            // --- INBOUND (Experience at UNPAB) ---
            [
                'cat' => 'experience_at_unpab', 'target' => 'student',
                'title' => ['id' => 'BIPA UNPAB: Kursus Bahasa Indonesia', 'en' => 'BIPA UNPAB: Indonesian Language Course'],
                'overview' => ['id' => 'Program belajar bahasa untuk mahasiswa asing.', 'en' => 'Language learning program for international students.'],
                'img' => 'https://images.unsplash.com/photo-1544650030-3c698e8f33a2?q=80&w=800', 'days' => 150
            ],
            [
                'cat' => 'experience_at_unpab', 'target' => 'student',
                'title' => ['id' => 'Magang di Industri Perkebunan Sumatera Utara', 'en' => 'Internship in North Sumatra Plantation Industry'],
                'overview' => ['id' => 'Pengalaman kerja lapangan bagi mahasiswa asing.', 'en' => 'Field work experience for international students.'],
                'img' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800', 'days' => 75
            ],
            [
                'cat' => 'experience_at_unpab', 'target' => 'lecturer',
                'title' => ['id' => 'Simposium Internasional Ekonomi Hijau', 'en' => 'International Symposium on Green Economy'],
                'overview' => ['id' => 'Pertemuan peneliti global di UNPAB Medan.', 'en' => 'Meeting of global researchers at UNPAB Medan.'],
                'img' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=800', 'days' => 15
            ],

            // --- CLOSED PROGRAMS (Untuk Tes Filter Status) ---
            [
                'cat' => 'global_opportunities', 'target' => 'student',
                'title' => ['id' => 'Winter Camp di Jepang (Selesai)', 'en' => 'Winter Camp in Japan (Expired)'],
                'overview' => ['id' => 'Program musim dingin tahun lalu.', 'en' => 'Last year winter program.'],
                'img' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=800', 'days' => -10
            ],
            [
                'cat' => 'global_opportunities', 'target' => 'staff',
                'title' => ['id' => 'Pertukaran Staf ke Taiwan (Tutup)', 'en' => 'Staff Exchange to Taiwan (Closed)'],
                'overview' => ['id' => 'Pendaftaran administrasi tahun 2025.', 'en' => 'Administrative registration for 2025.'],
                'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800', 'days' => -30
            ],
        ];

        // Duplikasi data agar mencapai 20 item untuk tes Pagination (9 per halaman)
        $finalPrograms = array_merge($programs, $programs);

        foreach ($finalPrograms as $index => $item) {
            $program = Program::create([
                'category' => $item['cat'],
                'target_audience' => $item['target'],
                'title' => $item['title'],
                'slug' => Str::slug($item['title']['en']) . '-' . $index,
                'overview' => $item['overview'],
                'description' => [
                    'id' => '<p>Deskripsi detail untuk program ' . $item['title']['id'] . '. Segera daftarkan diri Anda.</p>',
                    'en' => '<p>Detailed description for ' . $item['title']['en'] . '. Register yourself now.</p>'
                ],
                'registration_deadline' => now()->addDays($item['days']),
                'is_active' => true,
            ]);

            try {
                $program->addMediaFromUrl($item['img'])->toMediaCollection('program_gallery');
                echo "✅ Foto Berhasil: " . $item['title']['en'] . "\n";
            } catch (\Exception $e) {
                echo "⚠️ Gagal download foto. Lewati.\n";
            }
        }
    }
}