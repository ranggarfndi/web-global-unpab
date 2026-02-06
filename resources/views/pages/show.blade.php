@extends('layouts.main')

@section('title', $program->title)

@section('content')

    <section class="relative bg-green-900 pt-24 pb-24 md:pt-32 md:pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-[500px] md:h-[500px] bg-gradient-to-br from-yellow-500/30 to-transparent rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-[500px] md:h-[500px] bg-gradient-to-tr from-green-500/30 to-transparent rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="hidden sm:flex items-center gap-2 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] text-green-400 mb-6 md:mb-8">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors">Home</a>
                <span class="text-green-600">/</span>
                <a href="{{ route('programs.index') }}" class="hover:text-yellow-500 transition-colors">Programs</a>
                <span class="text-green-600">/</span>
                <span class="text-green-200 line-clamp-1">{{ str_replace('_', ' ', $program->category) }}</span>
            </nav>

            <div class="max-w-4xl">
                <div class="flex flex-wrap gap-2 md:gap-3 mb-4 md:mb-6">
                    <span class="px-3 py-1 md:px-4 md:py-1.5 bg-yellow-500 text-green-900 text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-yellow-500/20">
                        {{ ucfirst($program->target_audience) }}
                    </span>
                    @if($program->registration_deadline && $program->registration_deadline->isFuture())
                        <span class="px-3 py-1 md:px-4 md:py-1.5 bg-green-800 border border-green-700 text-green-300 text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-full">
                            Open Registration
                        </span>
                    @else
                        <span class="px-3 py-1 md:px-4 md:py-1.5 bg-red-900/50 border border-red-800 text-red-400 text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-full">
                            Closed
                        </span>
                    @endif
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white leading-[1.1] mb-6 drop-shadow-sm">
                    {{ $program->title }}
                </h1>
            </div>
        </div>
    </section>

    <section class="relative bg-white pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 md:-mt-20 relative z-20">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16">
                
                <div class="lg:col-span-8 order-2 lg:order-1">
                    
                    {{-- --- PERSIAPAN DATA GAMBAR --- --}}
                    @php
                        $medias = $program->getMedia('program_gallery');
                        // Ambil gambar pertama untuk featured
                        $featuredImage = $medias->first(); 
                        // Ambil sisa gambar (mulai dari index ke-1) untuk galeri bawah
                        $galleryImages = $medias->skip(1); 
                    @endphp

                    {{-- --- 0. FEATURED IMAGE (GAMBAR UTAMA DI ATAS) --- --}}
                    @if($featuredImage)
                    <div class="rounded-[2rem] overflow-hidden shadow-xl shadow-green-900/5 mb-10 md:mb-12 mt-8 md:mt-12 relative group h-64 md:h-[400px]">
                        <img src="{{ $featuredImage->getUrl() }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Featured Image">
                        <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    @endif

                    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-xl shadow-green-900/5 border border-slate-100 mb-10 md:mb-12">
                        <h3 class="text-xs font-black text-green-900 uppercase tracking-widest mb-6 flex items-center gap-3">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            Program Key Facts
                        </h3>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-4">
                            @foreach($program->overview as $item)
                            <div class="flex flex-col">
                                <span class="text-[9px] md:text-[10px] font-bold text-green-400 uppercase tracking-wider mb-1">{{ $item['label'] }}</span>
                                <span class="text-sm md:text-base font-bold text-green-900 leading-tight">{{ $item['value'] }}</span>
                            </div>
                            @endforeach
                            
                            <div class="flex flex-col">
                                <span class="text-[9px] md:text-[10px] font-bold text-red-400 uppercase tracking-wider mb-1">Deadline</span>
                                <span class="text-sm md:text-base font-bold text-red-600 leading-tight">
                                    {{ $program->registration_deadline ? $program->registration_deadline->format('d M Y') : 'TBA' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 md:mb-16 px-2 md:px-0">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-6">About Program</h3>
                        <div class="prose prose-base md:prose-lg prose-green max-w-none text-green-800/80 leading-relaxed">
                            {!! $program->description !!}
                        </div>
                    </div>

                    @if($program->activities)
                    <div class="mb-12 md:mb-16">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-8">Activities Schedule</h3>
                        
                        <div class="bg-green-50 rounded-[2rem] md:rounded-[3rem] p-6 md:p-10 border border-green-100">
                            <div class="relative pl-4 md:pl-8 space-y-8 md:space-y-10">
                                <div class="absolute top-2 bottom-2 left-[19px] md:left-[35px] w-0.5 bg-green-200"></div>

                                @foreach($program->activities as $index => $act)
                                <div class="relative flex gap-4 md:gap-8 group">
                                    <div class="absolute left-0 top-1.5 w-3 h-3 md:w-4 md:h-4 rounded-full border-2 md:border-4 border-white shadow-sm z-10 
                                        {{ $loop->first ? 'bg-yellow-500 ring-4 ring-yellow-500/20' : 'bg-green-400 group-hover:bg-yellow-500 transition-colors' }}">
                                    </div>

                                    <div class="flex-grow bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl shadow-sm border border-green-100 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                            <h4 class="text-base md:text-lg font-bold text-green-900">{{ $act['activity'] }}</h4>
                                            <span class="self-start sm:self-auto inline-block px-2 py-1 bg-green-100 text-green-700 text-[9px] font-black uppercase tracking-widest rounded-md whitespace-nowrap">
                                                {{ $act['time'] }}
                                            </span>
                                        </div>
                                        <p class="text-xs md:text-sm text-green-600 leading-relaxed">{{ $act['detail'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- --- 4. GALLERY SECTION (SISA GAMBAR DI BAWAH) --- --}}
                    @if($galleryImages->count() > 0)
                    <div class="mb-12">
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-8 flex items-center gap-3">
                            More Documentation
                            <span class="text-sm font-bold text-green-400 bg-green-50 px-3 py-1 rounded-full">+{{ $galleryImages->count() }} Photos</span>
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                            @foreach($galleryImages as $media)
                                <div class="group relative rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 h-48 md:h-64">
                                    <img src="{{ $media->getUrl() }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Gallery Image">
                                    <div class="absolute inset-0 bg-green-900/0 group-hover:bg-green-900/20 transition-colors"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>

                <div class="lg:col-span-4 order-1 lg:order-2">
                    <div class="sticky top-28 space-y-6">
                        
                        <div class="mt-10 pt-6 border-t border-slate-50">
                            <a href="#" class="group relative flex items-center justify-center w-full py-4 bg-yellow-500 text-green-900 font-black rounded-xl overflow-hidden shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 transition-all hover:-translate-y-1 relative z-10">
                                <span class="relative z-10 uppercase tracking-widest text-xs">Apply This Program</span>
                                <div class="absolute inset-0 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
                            </a>
                            
                            <div class="mt-6 space-y-3">
                                <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100 group/link hover:bg-green-900 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-green-600 group-hover/link:bg-yellow-500 group-hover/link:text-green-900 shadow-sm transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-black text-green-900 group-hover/link:text-yellow-500 uppercase tracking-widest">Download Guide</span>
                                        <span class="text-[9px] text-green-400 group-hover/link:text-green-200">PDF</span>
                                    </div>
                                </a>

                                <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100 group/link hover:bg-green-900 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-green-600 group-hover/link:bg-yellow-500 group-hover/link:text-green-900 shadow-sm transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-black text-green-900 group-hover/link:text-yellow-500 uppercase tracking-widest">Requirements</span>
                                        <span class="text-[9px] text-green-400 group-hover/link:text-green-200">Check eligibility</span>
                                    </div>
                                </a>
                            </div>

                            <div class="mt-8 pt-6 border-t border-slate-50 text-center relative z-10">
                                <p class="text-[9px] text-green-400 font-bold uppercase tracking-[0.2em] mb-4">Spread the word</p>
                                <div class="flex justify-center gap-3">
                                    <button class="w-9 h-9 rounded-full bg-slate-50 text-slate-400 hover:bg-green-900 hover:text-yellow-500 flex items-center justify-center transition-all border border-slate-100">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection