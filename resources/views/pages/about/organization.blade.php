@extends('layouts.main')

@section('title', 'Organization Structure')

@section('content')

    {{-- 1. HERO HEADER --}}
    <section class="relative bg-green-900 pt-24 pb-16 md:pt-32 md:pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-yellow-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-96 md:h-96 bg-green-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-3 py-1 md:px-4 md:py-1.5 bg-yellow-500/10 border border-yellow-500/30 backdrop-blur-md text-yellow-400 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-4 md:mb-6">
                About The Team
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 leading-tight">
                Meet Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Leadership</span>
            </h1>
            <p class="text-sm md:text-lg text-green-100/70 max-w-2xl mx-auto font-medium leading-relaxed px-2">
                {{ app()->getLocale() == 'id' 
                    ? 'Tim berdedikasi di balik International Office UNPAB yang berkomitmen menjembatani pendidikan lokal menuju panggung global.' 
                    : 'The dedicated team behind UNPAB International Office committed to bridging local education to the global stage.' }}
            </p>
        </div>
    </section>

    {{-- 2. SEARCH BAR SECTION --}}
    <section class="bg-slate-50 border-b border-slate-200 sticky top-20 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8">
            <div class="max-w-2xl mx-auto">
                <form action="{{ url()->current() }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search team member name or position..." 
                           class="w-full bg-white border border-slate-200 text-green-900 text-sm font-bold rounded-full py-3 md:py-4 pl-10 md:pl-12 pr-14 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 placeholder-slate-400 transition-all shadow-sm hover:shadow-md">
                    
                    <div class="absolute inset-y-0 left-0 pl-4 md:pl-5 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 md:h-5 md:w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    @if(request('q'))
                        <a href="{{ route('about.organization') }}" class="absolute inset-y-0 right-2 flex items-center">
                            <span class="p-2 bg-slate-100 hover:bg-red-100 text-slate-400 hover:text-red-500 rounded-full transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </span>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    {{-- 3. TEAM GRID SECTION --}}
    <section class="bg-white py-12 md:py-24 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($members->count() > 0)
                {{-- Grid: Mobile 2 kolom (gap kecil), Desktop 4 kolom (gap besar) --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-8">
                    
                    @foreach($members as $member)
                    <div class="group relative flex flex-col items-center">
                        
                        {{-- Card Background Decoration --}}
                        <div class="absolute inset-0 bg-slate-50 rounded-[1.5rem] md:rounded-[2.5rem] transform rotate-2 group-hover:rotate-6 transition-transform duration-500 -z-10"></div>
                        <div class="absolute inset-0 bg-white border border-slate-100 rounded-[1.5rem] md:rounded-[2.5rem] shadow-sm group-hover:shadow-xl group-hover:border-green-100 transition-all duration-500 -z-10"></div>

                        {{-- Image Container --}}
                        <div class="relative w-full aspect-[4/5] rounded-[1.2rem] md:rounded-[2rem] overflow-hidden mb-3 md:mb-6 mx-auto mt-2 w-[92%] md:w-[90%]">
                            <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                            
                            {{-- Foto Anggota --}}
                            <img src="{{ $member->getFirstMediaUrl('member_photo') ?: 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&background=random&color=fff' }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0" 
                                 alt="{{ $member->name }}">
                            
                            {{-- Overlay Social Media --}}
                            <div class="absolute bottom-2 md:bottom-4 left-0 right-0 flex justify-center gap-2 md:gap-3 translate-y-full group-hover:translate-y-0 transition-transform duration-500 z-20">
                                @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" class="w-8 h-8 md:w-10 md:h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center text-green-900 hover:bg-yellow-500 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                @endif
                                
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="w-8 h-8 md:w-10 md:h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center text-green-900 hover:bg-yellow-500 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Info Anggota --}}
                        <div class="text-center pb-4 md:pb-8 px-2 md:px-6 w-full">
                            {{-- Nama: FULL TEXT --}}
                            <h3 class="text-sm md:text-xl font-black text-green-900 mb-1 md:mb-2 group-hover:text-green-700 transition-colors leading-tight">
                                {{ $member->name }}
                            </h3>
                            
                            {{-- Jabatan: FULL TEXT --}}
                            <div class="inline-block px-2 py-1 bg-yellow-500/10 rounded-lg max-w-full">
                                <p class="text-[9px] md:text-xs font-black text-yellow-600 uppercase tracking-wider leading-tight">
                                    {{ $member->position }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            @else
                {{-- Empty State --}}
                <div class="py-24 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-50 rounded-full mb-6 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-green-900 mb-2">Team Not Found</h3>
                    <p class="text-green-600 mb-8">We couldn't find any team member matching "{{ request('q') }}".</p>
                    <a href="{{ route('about.organization') }}" class="px-6 py-3 bg-yellow-500 text-green-900 font-bold rounded-full hover:bg-yellow-400 transition-all">View All Team</a>
                </div>
            @endif

        </div>
    </section>

@endsection