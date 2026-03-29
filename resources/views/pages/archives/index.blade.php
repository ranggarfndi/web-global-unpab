@extends('layouts.main')

@section('title', 'Program Archives')

@section('content')

    {{-- 1. HERO HEADER (Selaras dengan Partner/Org) --}}
    <section class="relative bg-green-950 pt-24 pb-16 md:pt-32 md:pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-yellow-500 rounded-full blur-[80px] md:blur-[120px] opacity-10 translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-3 py-1 md:px-4 md:py-1.5 bg-yellow-500/10 border border-yellow-500/30 backdrop-blur-md text-yellow-400 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-4 md:mb-6">
                Success Stories
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 leading-tight">
                Program <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Archives</span>
            </h1>
            <p class="text-sm md:text-lg text-green-100/70 max-w-2xl mx-auto font-medium leading-relaxed px-2">
                {{ app()->getLocale() == 'id' 
                    ? 'Menjelajahi jejak langkah International Office UNPAB dalam menciptakan dampak global melalui berbagai program yang telah sukses terlaksana.' 
                    : 'Exploring the footsteps of UNPAB International Office in creating global impact through various successfully implemented programs.' }}
            </p>
        </div>
    </section>

    {{-- 2. SEARCH & FILTER SECTION --}}
    <section class="bg-slate-50 border-b border-slate-200 sticky top-20 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-6">
            <div class="max-w-2xl mx-auto">
                <form action="{{ url()->current() }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search archived programs..." 
                           class="w-full bg-white border border-slate-200 text-green-900 text-sm font-bold rounded-full py-3 md:py-4 pl-10 md:pl-12 pr-14 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 placeholder-slate-400 transition-all shadow-sm hover:shadow-md">
                    
                    <div class="absolute inset-y-0 left-0 pl-4 md:pl-5 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 md:h-5 md:w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    @if(request('q'))
                        <a href="{{ route('archives.index') }}" class="absolute inset-y-0 right-2 flex items-center">
                            <span class="p-2 bg-slate-100 hover:bg-red-100 text-slate-400 hover:text-red-500 rounded-full transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </span>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    {{-- 3. ARCHIVE GRID SECTION --}}
    <section class="bg-white py-12 md:py-20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($archives->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @foreach($archives as $archive)
                    <div class="group relative">
                        {{-- Dekorasi Belakang Kartu --}}
                        <div class="absolute inset-0 bg-slate-50 rounded-[2.5rem] transform rotate-2 group-hover:rotate-3 transition-transform duration-500 -z-10"></div>
                        
                        <div class="bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-sm group-hover:shadow-xl group-hover:border-green-100 transition-all duration-500 flex flex-col h-full">
                            
                            {{-- Image Dokumentasi --}}
                            <div class="relative h-56 overflow-hidden">
                                <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="{{ $archive->getFirstMediaUrl('archive_documentation') ?: asset('images/placeholder-archive.jpg') }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                     alt="{{ $archive->title }}">
                                
                                {{-- Badge Tanggal --}}
                                <div class="absolute top-4 left-4 z-20">
                                    <div class="px-3 py-1.5 bg-white/90 backdrop-blur shadow-sm rounded-xl text-center">
                                        <span class="block text-xs font-black text-green-900 leading-none">{{ $archive->execution_date->format('M') }}</span>
                                        <span class="block text-[10px] font-bold text-yellow-600 uppercase">{{ $archive->execution_date->format('Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Konten Kartu --}}
                            <div class="p-8 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="px-2 py-0.5 bg-green-50 text-green-600 text-[10px] font-black uppercase tracking-wider rounded-md border border-green-100">
                                        {{ str_replace('_', ' ', $archive->category) }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-black text-green-900 mb-3 group-hover:text-green-700 transition-colors leading-tight">
                                    {{ $archive->title }}
                                </h3>

                                <p class="text-sm text-slate-500 font-medium leading-relaxed mb-6 line-clamp-3">
                                    {{ $archive->summary }}
                                </p>

                                <div class="mt-auto pt-6 border-t border-slate-50 flex justify-between items-center">
                                    <a href="{{ route('archives.show', $archive->id) }}" class="inline-flex items-center gap-2 text-xs font-black text-green-900 hover:text-yellow-600 transition-colors uppercase tracking-widest">
                                        View Report
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            @else
                {{-- Empty State --}}
                <div class="py-24 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-50 rounded-full mb-6 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-green-900 mb-2">No Archives Found</h3>
                    <p class="text-green-600 mb-8">We haven't archived any programs matching your search yet.</p>
                    <a href="{{ route('archives.index') }}" class="px-6 py-3 bg-yellow-500 text-green-900 font-bold rounded-full hover:bg-yellow-400 transition-all">View All Archives</a>
                </div>
            @endif

        </div>
    </section>

@endsection