@extends('layouts.main')

@section('title', 'Our Partners')

@section('content')

    <section class="relative bg-green-900 pt-24 pb-16 md:pt-32 md:pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-yellow-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-96 md:h-96 bg-green-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-3 py-1 md:px-4 md:py-1.5 bg-yellow-500/10 border border-yellow-500/30 backdrop-blur-md text-yellow-400 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-4 md:mb-6">
                Global Collaboration
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 leading-tight">
                Our Strategic <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Partners</span>
            </h1>
            <p class="text-sm md:text-lg text-green-100/70 max-w-2xl mx-auto font-medium leading-relaxed px-2">
                {{ app()->getLocale() == 'id' 
                    ? 'Membangun jembatan akademik internasional dengan universitas dan institusi terkemuka di seluruh dunia.' 
                    : 'Building international academic bridges with leading universities and institutions worldwide.' }}
            </p>
        </div>
    </section>

    <section class="bg-slate-50 border-b border-slate-200 sticky top-20 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
            <div class="max-w-2xl mx-auto">
                <form action="{{ url()->current() }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search partner university or institution..." 
                           class="w-full bg-white border border-slate-200 text-green-900 text-sm font-bold rounded-full py-4 pl-12 pr-14 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 placeholder-slate-400 transition-all shadow-sm hover:shadow-md">
                    
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    @if(request('q'))
                        <a href="{{ route('partners.index') }}" class="absolute inset-y-0 right-2 flex items-center">
                            <span class="p-2 bg-slate-100 hover:bg-red-100 text-slate-400 hover:text-red-500 rounded-full transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </span>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 md:py-24 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($partners->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                    @foreach($partners as $partner)
                    <div class="group relative bg-white border border-green-50 rounded-[2rem] p-6 md:p-8 flex flex-col items-center text-center hover:border-yellow-400 hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-500 overflow-hidden">
                        
                        <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-yellow-500/10 to-transparent rounded-bl-[2rem] transform translate-x-full -translate-y-full group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>

                        <div class="h-24 w-full flex items-center justify-center mb-6 relative z-10">
                            <img src="{{ $partner->getFirstMediaUrl('partner_logo') }}" 
                                 alt="{{ $partner->name }}" 
                                 class="max-h-full max-w-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 group-hover:scale-110">
                        </div>

                        <h3 class="text-sm md:text-base font-bold text-green-900 mb-4 line-clamp-2 min-h-[2.5rem]">{{ $partner->name }}</h3>
                        
                        @if($partner->website_url)
                        <a href="{{ $partner->website_url }}" target="_blank" 
                           class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 text-green-600 text-[10px] font-black uppercase tracking-widest rounded-full group-hover:bg-green-900 group-hover:text-yellow-500 transition-all duration-300">
                            Visit Website
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            @else
                <div class="py-24 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-50 rounded-full mb-6 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-green-900 mb-2">Partner Not Found</h3>
                    <p class="text-green-600 mb-8">We couldn't find any partner matching "{{ request('q') }}".</p>
                    <a href="{{ route('partners.index') }}" class="px-6 py-3 bg-yellow-500 text-green-900 font-bold rounded-full hover:bg-yellow-400 transition-all">View All Partners</a>
                </div>
            @endif

        </div>
    </section>

@endsection