@extends('layouts.main')

@section('title', $archive->title)

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/css/glightbox.min.css" />
    <style>
        /* Fix untuk memastikan bullet points muncul jika plugin typography tidak aktif */
        .prose ul { list-style-type: disc !important; padding-left: 1.5rem !important; margin-bottom: 1.5rem !important; }
        .prose ol { list-style-type: decimal !important; padding-left: 1.5rem !important; margin-bottom: 1.5rem !important; }
        .prose li { margin-bottom: 0.5rem !important; }
    </style>
@endpush

@section('content')

    {{-- 1. HERO HEADER --}}
    <section class="relative bg-green-950 pt-32 pb-20 md:pt-40 md:pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-500 rounded-full blur-[120px] opacity-10 translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl">
                <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-green-400/60 mb-8">
                    <a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors">Home</a>
                    <span class="text-white/20">/</span>
                    <a href="{{ route('archives.index') }}" class="hover:text-yellow-500 transition-colors">Archives</a>
                </nav>

                <h1 class="text-3xl md:text-5xl lg:text-7xl font-black text-white leading-tight mb-8">
                    {{ $archive->title }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-4">
                    <span class="px-4 py-1.5 bg-yellow-500 text-green-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-yellow-500/20">
                        {{ str_replace('_', ' ', $archive->category) }}
                    </span>
                    <span class="text-green-400 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Successfully Executed: {{ $archive->execution_date->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. MAIN CONTENT SECTION --}}
    <section class="bg-white py-12 md:py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
                
                {{-- KONTEN KIRI --}}
                <div class="lg:col-span-8">
                    
                    {{-- Quick Facts Card (Menonjolkan Informasi Penting) --}}
                    <div class="bg-green-50 rounded-[2.5rem] p-8 md:p-10 border border-green-100 mb-12 flex flex-wrap gap-8 md:gap-16">
                        <div>
                            <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-2">Execution Date</span>
                            <span class="block text-lg font-black text-green-900">{{ $archive->execution_date->format('F d, Y') }}</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-2">Program Type</span>
                            <span class="block text-lg font-black text-green-900">{{ ucfirst(str_replace('_', ' ', $archive->category)) }}</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-2">Status</span>
                            <span class="block text-lg font-black text-yellow-600">Completed & Verified</span>
                        </div>
                    </div>

                    {{-- Summary (Hanya tampil jika ada isinya) --}}
                    @if($archive->summary)
                    <div class="relative mb-16 pl-8">
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-yellow-500 rounded-full"></div>
                        <p class="text-xl md:text-2xl font-bold text-green-900 leading-relaxed italic">
                            "{{ $archive->summary }}"
                        </p>
                    </div>
                    @endif

                    {{-- Main Content (Fix Bullet Points) --}}
                    <div class="mb-20">
                        <h3 class="text-2xl font-black text-green-900 mb-8 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            Program Report
                        </h3>
                        <article class="prose prose-lg prose-green max-w-none text-green-800/80 font-medium leading-relaxed">
                            {!! $archive->content !!}
                        </article>
                    </div>

                    {{-- --- TESTIMONIALS SECTION --- --}}
                    @if($archive->testimonials && count($archive->testimonials) > 0)
                    <div class="mt-24">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-12 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            Voices of Participants
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($archive->testimonials as $testimony)
                            <div class="bg-slate-50 rounded-[2.5rem] p-8 border border-slate-100 relative group hover:bg-white hover:shadow-2xl hover:border-green-100 transition-all duration-500">
                                
                                {{-- Ikon Quotes Dekoratif --}}
                                <div class="absolute top-8 right-8 text-green-100 group-hover:text-yellow-500/20 transition-colors pointer-events-none">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 7.55228 14.017 7V4H21.017V15C21.017 17.7614 18.7784 20 16.017 20L14.017 21ZM3 21L3 18C3 16.8954 3.89543 16 5 16H8C8.55228 16 9 15.5523 9 15V9C9 8.44772 8.55228 8 8 8H4C3.44772 8 3 7.55228 3 7V4H10V15C10 17.7614 7.76142 20 5 20L3 21Z"/>
                                    </svg>
                                </div>

                                {{-- Rating Stars --}}
                                <div class="flex gap-1 mb-6">
                                    @for($i = 0; $i < ($testimony['rating'] ?? 5); $i++)
                                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>

                                {{-- Isi Testimoni --}}
                                <div class="relative z-10">
                                    <p class="text-green-800/80 font-medium leading-relaxed mb-8 italic">
                                        "{{ $testimony['content'] }}"
                                    </p>
                                </div>

                                {{-- Info Peserta (Mahasiswa/Dosen/Staf) --}}
                                <div class="flex items-center gap-4">
                                    {{-- Foto Profil --}}
                                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-white shadow-md flex-shrink-0">
                                        <img src="{{ asset('storage/' . ($testimony['photo'] ?? '')) }}" 
                                            onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($testimony['name']) }}&background=064e3b&color=fff'"
                                            class="w-full h-full object-cover" 
                                            alt="{{ $testimony['name'] }}">
                                    </div>
                                    
                                    <div class="flex flex-col">
                                        <span class="text-sm font-black text-green-900 leading-none mb-1">
                                            {{ $testimony['name'] }}
                                        </span>
                                        {{-- Identitas dinamis: mendukung 'identifier' baru atau 'npm' lama --}}
                                        <span class="text-[10px] font-bold text-yellow-600 uppercase tracking-widest">
                                            ID: {{ $testimony['identifier'] ?? $testimony['npm'] ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Documentation Gallery --}}
                    @if($documentations->count() > 0)
                    <div class="mt-20">
                        <h3 class="text-2xl font-black text-green-900 mb-8 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            Event Documentation
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            @foreach($documentations as $media)
                                <a href="{{ $media->getUrl() }}" class="glightbox group relative aspect-square rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm" data-gallery="archive-gallery">
                                    <img src="{{ $media->getUrl() }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Documentation">
                                    <div class="absolute inset-0 bg-green-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- SIDEBAR KANAN (Statistik) --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-32 space-y-8">
                        @if($archive->stats)
                        <div class="bg-green-900 rounded-[2.5rem] p-10 text-white shadow-2xl shadow-green-900/20 relative overflow-hidden">
                            {{-- Dekorasi --}}
                            <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 rounded-full blur-[80px] opacity-20"></div>
                            
                            <h4 class="text-[10px] font-black text-yellow-500 uppercase tracking-[0.2em] mb-10 relative z-10">Program Impact</h4>
                            
                            <div class="space-y-8 relative z-10">
                                @foreach($archive->stats as $stat)
                                <div class="group">
                                    <span class="block text-4xl font-black text-white mb-1 group-hover:text-yellow-400 transition-colors">{{ $stat['value'] }}</span>
                                    <span class="block text-[10px] font-bold text-green-400 uppercase tracking-widest">{{ $stat['label'] }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-12 pt-8 border-t border-white/10 relative z-10">
                                <p class="text-xs text-green-200/60 font-medium leading-relaxed italic">
                                    The data above reflects the verified success metrics for the UNPAB International Office program.
                                </p>
                            </div>
                        </div>
                        @endif

                        {{-- Tombol Kembali --}}
                        <a href="{{ route('archives.index') }}" class="flex items-center justify-center gap-3 w-full py-4 bg-slate-50 text-green-900 font-black rounded-2xl hover:bg-yellow-500 transition-all group">
                            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Archives
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true
        });
    </script>
@endpush