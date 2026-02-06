@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <header id="home" class="relative min-h-screen md:min-h-[110vh] flex items-center justify-center overflow-hidden pt-36 md:pt-32"
            x-data="{ 
                activeSlide: 0,
                slides: [
                    '{{ asset('img/hero/hero-1.jpg') }}', 
                    '{{ asset('img/hero/hero-2.jpg') }}',
                    '{{ asset('img/hero/hero-3.jpg') }}',
                    '{{ asset('img/hero/hero-4.jpg') }}',
                    '{{ asset('img/hero/hero-5.jpg') }}'
                ],
                init() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
                    }, 5000);
                }
            }">

        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                 x-show="activeSlide === index"
                 x-transition:enter="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="opacity-100"
                 x-transition:leave-end="opacity-0">
                <img :src="slide" class="w-full h-full object-cover transform scale-105 animate-slow-zoom" alt="Hero Background">
            </div>
        </template>

        <div class="absolute inset-0 bg-gradient-to-b from-green-900/90 via-green-900/60 to-green-900/90 mix-blend-multiply z-10 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center pb-12 flex flex-col justify-center h-full">
            
            <div class="flex-grow flex flex-col justify-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 border border-white/20 backdrop-blur-md rounded-full mb-6 md:mb-8 shadow-2xl">
                        <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                        <span class="text-yellow-300 text-[10px] md:text-xs font-black uppercase tracking-[0.25em]">
                            {{ app()->getLocale() == 'id' ? 'Selamat Datang di UNPAB Global' : 'Welcome to UNPAB Global' }}
                        </span>
                    </div>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[1.1] mb-6 md:mb-8 drop-shadow-xl tracking-tight">
                    Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200 relative">
                        Global
                        <svg class="absolute w-full h-2 md:h-3 -bottom-1 left-0 text-yellow-500 opacity-50" viewBox="0 0 100 10" preserveAspectRatio="none">
                            <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                        </svg>
                    </span> <br>Horizons.
                </h1>

                <p class="text-base md:text-2xl text-green-50 mb-10 md:mb-12 leading-relaxed max-w-3xl mx-auto font-medium drop-shadow-md px-4">
                    {{ app()->getLocale() == 'id' 
                        ? 'Membuka gerbang kolaborasi internasional, riset kelas dunia, dan pertukaran budaya bagi civitas akademika UNPAB.' 
                        : 'Unlocking gateways to international collaboration, world-class research, and cultural exchange for the UNPAB community.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 md:gap-5 justify-center items-center px-4">
                    <a href="{{ route('programs.index') }}" class="group relative px-8 py-4 bg-yellow-500 text-green-900 font-black rounded-2xl overflow-hidden hover:shadow-lg hover:shadow-yellow-500/40 transition-all hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Explore Programs
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                        <div class="absolute inset-0 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
                    </a>
                    
                    <a href="{{ route('partners.index') }}" class="group px-8 py-4 bg-white/5 border border-white/30 text-white font-bold rounded-2xl hover:bg-white/10 transition-all backdrop-blur-sm w-full sm:w-auto flex items-center justify-center">
                        Our Partners
                    </a>
                </div>
            </div>

            <div class="flex justify-center space-x-3 mt-8 md:mt-12 z-30">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index" 
                            :class="{'w-8 bg-yellow-500': activeSlide === index, 'w-2 bg-white/40 hover:bg-white': activeSlide !== index}"
                            class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>

        </div>
    </header>

    <section id="partners" class="py-16 md:py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-xs md:text-sm font-black text-yellow-600 uppercase tracking-[0.3em] mb-3 md:mb-4">Trusted Collaboration</h2>
                <h3 class="text-3xl md:text-5xl font-black text-green-900">Strategic Global Partners</h3>
            </div>
            
            <div class="flex flex-wrap justify-center border-l border-t border-green-50 rounded-[2rem] overflow-hidden shadow-xl shadow-green-900/5 bg-green-50/10">
                @foreach($partners as $partner)
                    <div class="group relative w-1/2 md:w-1/5 p-6 md:p-10 flex items-center justify-center border-r border-b border-green-50 bg-white hover:z-10 transition-all duration-300 min-h-[120px] md:min-h-[160px]">
                        <div class="absolute inset-0 bg-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <a href="{{ $partner->website_url }}" target="_blank" class="relative block transform group-hover:scale-110 transition-transform duration-500">
                            <img class="h-10 md:h-14 w-auto max-w-[80%] mx-auto object-contain grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 mix-blend-multiply" 
                                 src="{{ $partner->getFirstMediaUrl('partner_logo') }}" 
                                 alt="{{ $partner->name }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('partners.index') }}" class="group inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-green-500 hover:text-green-900 transition-colors">
                    View All Strategic Partners 
                    <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <section id="programs" class="py-20 md:py-32 bg-green-950 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        <div class="absolute top-0 right-0 w-[500px] md:w-[800px] h-[500px] md:h-[800px] bg-green-900/50 rounded-full blur-[120px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 md:mb-20 gap-8 border-b border-green-800/50 pb-8 md:pb-12">
                <div class="max-w-2xl">
                    <span class="text-yellow-500 text-xs font-black uppercase tracking-widest block mb-4">International Path</span>
                    <h2 class="text-3xl md:text-5xl font-black text-white mb-4 md:mb-6 leading-tight">Elevate Your Career with <br><span class="text-yellow-400">Global Experience</span></h2>
                    <p class="text-green-200/60 font-medium text-base md:text-lg">
                        {{ app()->getLocale() == 'id' 
                            ? 'Akses ke peluang internasional terbaik untuk mahasiswa, dosen, dan staf UNPAB.' 
                            : 'Access to the best international opportunities for UNPAB students, lecturers, and staff.' }}
                    </p>
                </div>
                <div>
                    <a href="{{ route('programs.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border border-green-700 text-green-300 font-bold rounded-2xl hover:bg-green-800 hover:text-white hover:border-green-600 transition-all w-full md:w-auto">
                        See All Programs
                    </a>
                </div>
            </div>

            @php
                if(!isset($programs)){
                    $programs = \App\Models\Program::where('is_active', true)->latest()->take(3)->get();
                }
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($programs as $program)
                    <div class="group relative flex flex-col h-full bg-white/5 backdrop-blur-md rounded-[2.5rem] border border-white/10 hover:border-yellow-500/50 hover:bg-white/10 transition-all duration-500 overflow-hidden shadow-2xl">
                        
                        <div class="relative h-56 md:h-64 overflow-hidden p-3">
                            <div class="w-full h-full rounded-[2rem] overflow-hidden relative">
                                <div class="absolute inset-0 bg-green-950/20 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="{{ $program->getFirstMediaUrl('program_gallery') }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                     alt="{{ $program->title }}">
                            </div>
                            
                            <div class="absolute bottom-6 right-6 z-20">
                                <span class="px-3 py-1.5 md:px-4 md:py-2 bg-yellow-500 text-green-950 text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                    {{ $program->target_audience }}
                                </span>
                            </div>
                        </div>

                        <div class="px-6 md:px-8 pb-8 pt-4 flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-green-400/80 text-[10px] font-black uppercase tracking-widest">
                                    {{ $program->category == 'global_opportunities' ? 'Outbound' : 'Inbound' }}
                                </span>
                            </div>

                            <h3 class="text-lg md:text-xl font-black text-white mb-4 leading-snug group-hover:text-yellow-400 transition-colors line-clamp-2">
                                {{ $program->title }}
                            </h3>
                            
                            <div class="text-green-100/50 font-medium text-xs md:text-sm mb-8 leading-relaxed line-clamp-3">
                                {!! strip_tags($program->description) !!}
                            </div>
                            
                            <div class="mt-auto pt-6 border-t border-white/10 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-[9px] font-black text-green-500 uppercase tracking-widest mb-1">Deadline</span>
                                    <span class="text-white font-bold text-xs md:text-sm">
                                        {{ $program->registration_deadline ? $program->registration_deadline->format('d M Y') : 'Open' }}
                                    </span>
                                </div>
                                <a href="{{ route('programs.show', $program->slug) }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-yellow-500 hover:text-green-900 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection