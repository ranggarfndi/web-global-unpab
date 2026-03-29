@extends('layouts.main')

@section('title', $program->title)

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/css/glightbox.min.css" />
    <style>
        /* Fix agar bullet points muncul dari Text Editor Filament */
        .prose ul { list-style-type: disc !important; padding-left: 1.5rem !important; margin-bottom: 1.5rem !important; }
        .prose ol { list-style-type: decimal !important; padding-left: 1.5rem !important; margin-bottom: 1.5rem !important; }
        .prose li { margin-bottom: 0.5rem !important; }
        .prose h3 { font-weight: 800 !important; color: #064e3b !important; margin-top: 2rem !important; }
    </style>
@endpush

@section('content')

    {{-- --- HERO SECTION --- --}}
    <section class="relative bg-green-900 pt-24 pb-24 md:pt-32 md:pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-[500px] md:h-[500px] bg-gradient-to-br from-yellow-500/30 to-transparent rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="hidden sm:flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-green-400 mb-8">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors">Home</a>
                <span class="text-green-600">/</span>
                <a href="{{ route('programs.index') }}" class="hover:text-yellow-500 transition-colors">Programs</a>
                <span class="text-green-600">/</span>
                <span class="text-green-200">{{ str_replace('_', ' ', $program->category) }}</span>
            </nav>

            <div class="max-w-4xl">
                <div class="flex flex-wrap gap-3 mb-6">
                    <span class="px-4 py-1.5 bg-yellow-500 text-green-900 text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-yellow-500/20">
                        {{ ucfirst($program->target_audience) }}
                    </span>
                    @if($program->registration_deadline && $program->registration_deadline->isFuture())
                        <span class="px-4 py-1.5 bg-green-800 border border-green-700 text-green-300 text-[10px] font-black uppercase tracking-widest rounded-full">
                            Open Registration
                        </span>
                    @else
                        <span class="px-4 py-1.5 bg-red-900/50 border border-red-800 text-red-400 text-[10px] font-black uppercase tracking-widest rounded-full">
                            Closed
                        </span>
                    @endif
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-7xl font-black text-white leading-tight mb-6">
                    {{ $program->title }}
                </h1>
            </div>
        </div>
    </section>

    <section class="relative bg-white pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 md:-mt-20 relative z-20">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                
                <div class="lg:col-span-8 order-2 lg:order-1">
                    
                    {{-- --- FEATURED IMAGE --- --}}
                    @php
                        $medias = $program->getMedia('program_gallery');
                        $featuredImage = $medias->first(); 
                        $galleryImages = $medias->skip(1); 
                    @endphp

                    @if($featuredImage)
                    <div class="mt-8 md:mt-12 mb-12">
                        <a href="{{ $featuredImage->getUrl() }}" class="glightbox group relative block rounded-[2.5rem] overflow-hidden shadow-2xl shadow-green-900/10 h-64 md:h-[480px]" data-gallery="program-gallery">
                            <img src="{{ $featuredImage->getUrl() }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Featured Image">
                            <div class="absolute inset-0 bg-green-900/10 group-hover:bg-green-900/30 transition-colors flex items-center justify-center">
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 text-white opacity-0 group-hover:opacity-100 transition-all transform scale-75 group-hover:scale-100">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    <div class="mb-16">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-8 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            About Program
                        </h3>
                        <article class="prose prose-lg prose-green max-w-none text-green-800/80 font-medium leading-relaxed">
                            {!! $program->description !!}
                        </article>
                    </div>

                    {{-- --- ACTIVITIES SCHEDULE (FIXED: MENGGUNAKAN KARTU PUTIH) --- --}}
                    @php
                        $activitiesData = $program->activities;
                        if (is_string($activitiesData)) { $activitiesData = json_decode($activitiesData, true); }
                        $activitiesData = is_array($activitiesData) ? $activitiesData : [];
                    @endphp

                    @if(!empty($activitiesData))
                    <div class="mb-20">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-8 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            Activities Schedule
                        </h3>
                        <div class="bg-green-50 rounded-[2.5rem] md:rounded-[3rem] p-6 md:p-10 border border-green-100">
                            <div class="relative pl-4 md:pl-10 space-y-8 md:space-y-10">
                                {{-- Garis Timeline --}}
                                <div class="absolute top-2 bottom-2 left-[19px] md:left-[35px] w-0.5 bg-green-200"></div>

                                @foreach($activitiesData as $index => $act)
                                <div class="relative flex gap-4 md:gap-8 group">
                                    {{-- Titik Indikator --}}
                                    <div class="absolute left-0 top-1.5 w-3 h-3 md:w-4 md:h-4 rounded-full border-2 md:border-4 border-white shadow-sm z-10 
                                        {{ $loop->first ? 'bg-yellow-500 ring-4 ring-yellow-500/20' : 'bg-green-400 group-hover:bg-yellow-500 transition-colors' }}">
                                    </div>

                                    {{-- Konten dalam Kartu Putih (Mencegah teks nabrak) --}}
                                    <div class="flex-grow bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl shadow-sm border border-green-100 group-hover:shadow-md transition-all duration-300 ml-6 md:ml-10">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                            <h4 class="text-base md:text-lg font-bold text-green-900">{{ $act['activity'] ?? 'Activity' }}</h4>
                                            <span class="self-start sm:self-auto inline-block px-2 py-1 bg-green-100 text-green-700 text-[9px] font-black uppercase tracking-widest rounded-md whitespace-nowrap">
                                                {{ $act['time'] ?? '-' }}
                                            </span>
                                        </div>
                                        <p class="text-xs md:text-sm text-green-600 leading-relaxed">{{ $act['detail'] ?? '' }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($galleryImages->count() > 0)
                    <div class="mb-12">
                        <h3 class="text-2xl font-black text-green-900 mb-8">Documentation Gallery</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            @foreach($galleryImages as $media)
                                <a href="{{ $media->getUrl() }}" class="glightbox group relative rounded-[1.5rem] md:rounded-[2rem] overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 h-40 md:h-56" data-gallery="program-gallery">
                                    <img src="{{ $media->getUrl() }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Gallery Image">
                                    <div class="absolute inset-0 bg-green-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- --- SIDEBAR SECTION (FIXED SPACING) --- --}}
                <div class="lg:col-span-4 order-1 lg:order-2">
                    <div class="sticky top-28 pt-8 md:pt-12">
                        <div class="relative bg-green-950 rounded-[2.5rem] p-8 md:p-10 text-white shadow-2xl shadow-green-900/30 overflow-hidden border border-white/5">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 rounded-full blur-[80px] opacity-20 -mr-10 -mt-10"></div>
                            
                            <div class="relative z-10">
                                <h4 class="text-[10px] font-black text-yellow-500 uppercase tracking-[0.2em] mb-10">Registration Hub</h4>
                                
                                <div class="space-y-10 mb-12">
                                    <div class="group">
                                        <span class="block text-[10px] font-bold text-green-400 uppercase tracking-widest mb-2">Deadline</span>
                                        <span class="block text-2xl font-black text-white leading-none">
                                            {{ $program->registration_deadline ? $program->registration_deadline->format('d M Y') : 'TBA' }}
                                        </span>
                                    </div>
                                    <div class="group">
                                        <span class="block text-[10px] font-bold text-green-400 uppercase tracking-widest mb-2">Target Participant</span>
                                        <span class="block text-2xl font-black text-white leading-none">{{ ucfirst($program->target_audience) }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('about.contact') }}" class="group relative flex flex-col items-center justify-center w-full py-7 bg-yellow-500 text-green-950 rounded-[1.5rem] shadow-xl shadow-yellow-500/20 hover:shadow-yellow-500/40 transition-all duration-500 transform hover:-translate-y-2 active:scale-95 overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    
                                    <div class="relative z-10 flex flex-col items-center text-center px-4">
                                        <span class="text-xs font-black uppercase tracking-[0.2em] mb-1">Apply this Program</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[10px] font-bold opacity-70">Contact International Office</span>
                                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                                </a>

                                <p class="mt-8 text-center text-[10px] text-green-300/60 font-bold uppercase tracking-widest leading-relaxed">
                                    Take the first step toward <br> your global future today.
                                </p>
                            </div>
                        </div>
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