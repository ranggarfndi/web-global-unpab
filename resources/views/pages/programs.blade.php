@extends('layouts.main')

@section('title', 'International Programs')

@section('content')

    <section class="relative bg-green-900 pt-24 pb-16 md:pt-32 md:pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-yellow-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-96 md:h-96 bg-green-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-3 py-1 md:px-4 md:py-1.5 bg-yellow-500/10 border border-yellow-500/30 backdrop-blur-md text-yellow-400 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-4 md:mb-6">
                UNPAB Global Opportunities
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 leading-tight">
                Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Global Path</span>
            </h1>
            <p class="text-sm md:text-lg text-green-100/70 max-w-2xl mx-auto font-medium leading-relaxed px-2">
                {{ app()->getLocale() == 'id' 
                    ? 'Jelajahi berbagai program pertukaran, beasiswa, dan kolaborasi riset untuk wawasan internasional Anda.' 
                    : 'Explore various exchange programs, scholarships, and research collaborations to expand your horizons.' }}
            </p>
        </div>
    </section>

    <section class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-20 z-30 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex flex-nowrap overflow-x-auto justify-start md:justify-center items-center gap-2 md:gap-3 w-full scrollbar-hide">
                @php
                    function getBtnClass($target, $activeTarget) {
                        $base = "flex-none whitespace-nowrap px-5 py-2.5 rounded-full text-[10px] md:text-xs font-black uppercase tracking-widest transition-all duration-300 border ";
                        if ($target == $activeTarget) {
                            return $base . "bg-green-900 border-green-900 text-yellow-500 shadow-md transform scale-105";
                        }
                        return $base . "bg-white border-slate-200 text-green-700 hover:border-green-500 hover:text-green-900";
                    }
                @endphp

                <a href="{{ route('programs.index') }}" class="{{ getBtnClass('all', $activeTarget) }}">All Targets</a>
                <a href="{{ route('programs.target', 'student') }}" class="{{ getBtnClass('student', $activeTarget) }}">Students</a>
                <a href="{{ route('programs.target', 'lecturer') }}" class="{{ getBtnClass('lecturer', $activeTarget) }}">Lecturers</a>
                <a href="{{ route('programs.target', 'staff') }}" class="{{ getBtnClass('staff', $activeTarget) }}">Staff</a>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-3 items-stretch justify-center">
                
                <div class="relative group w-full md:w-48">
                    <select name="category" onchange="this.form.submit()" class="appearance-none w-full bg-white border border-slate-200 text-green-900 text-xs md:text-sm font-bold rounded-xl py-3 px-4 leading-tight focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 cursor-pointer h-full shadow-sm hover:border-green-400 transition-colors">
                        <option value="">All Categories</option>
                        <option value="global_opportunities" {{ request('category') == 'global_opportunities' ? 'selected' : '' }}>Global Opportunities</option>
                        <option value="experience_at_unpab" {{ request('category') == 'experience_at_unpab' ? 'selected' : '' }}>Experience at UNPAB</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-green-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                <div class="relative group w-full md:w-40">
                    <select name="status" onchange="this.form.submit()" class="appearance-none w-full bg-white border border-slate-200 text-green-900 text-xs md:text-sm font-bold rounded-xl py-3 px-4 leading-tight focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 cursor-pointer h-full shadow-sm hover:border-green-400 transition-colors">
                        <option value="">All Status</option>
                        <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open Registration</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-green-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    </div>
                </div>

                <div class="relative w-full md:w-64">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search program..." 
                           class="w-full h-full bg-white border border-slate-200 text-green-900 text-xs md:text-sm font-bold rounded-xl py-3 pl-10 pr-4 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 placeholder-slate-400 transition-colors shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>

                @if(request('q') || request('status') || request('category'))
                    <a href="{{ url()->current() }}" 
                       title="Reset Filter"
                       class="flex-none flex items-center justify-center w-full md:w-12 py-3 md:py-0 bg-red-50 border border-red-200 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 shadow-sm"
                    >
                        <span class="md:hidden text-xs font-bold uppercase mr-2">Reset Filters</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>
                @endif

            </form>
        </div>
    </section>

    <section class="bg-white py-12 md:py-20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($programs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                    @foreach($programs as $program)
                        <div class="group flex flex-col bg-white rounded-[2rem] hover:shadow-2xl hover:shadow-green-900/10 transition-all duration-500 border border-green-100 hover:border-green-200 overflow-hidden h-full">
                            
                            <div class="relative h-48 md:h-56 lg:h-72 overflow-hidden m-2 md:m-3 rounded-[1.5rem] md:rounded-[2rem]">
                                <div class="absolute inset-0 bg-green-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="{{ $program->getFirstMediaUrl('program_gallery') }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                     alt="{{ $program->title }}">
                                
                                <div class="absolute top-3 left-3 md:top-4 md:left-4 z-20 flex flex-col gap-2">
                                    <span class="px-2.5 py-1 md:px-3 md:py-1.5 bg-white/90 backdrop-blur text-green-900 text-[8px] md:text-[9px] font-black uppercase tracking-widest rounded-lg shadow-sm">
                                        {{ $program->category == 'global_opportunities' ? 'Global Opportunities UNPAB.' : 'Experience at UNPAB' }}
                                    </span>
                                </div>

                                <div class="absolute bottom-3 right-3 md:bottom-4 md:right-4 z-20">
                                    <span class="px-3 py-1.5 md:px-4 md:py-2 bg-yellow-500 text-green-900 text-[8px] md:text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                        For {{ ucfirst($program->target_audience) }}
                                    </span>
                                </div>
                            </div>

                            <div class="px-5 pb-5 pt-3 md:px-8 md:pb-8 md:pt-4 flex flex-col flex-grow">
                                <h3 class="text-xl md:text-2xl font-black text-green-900 mb-3 md:mb-4 leading-tight group-hover:text-yellow-600 transition-colors line-clamp-2">
                                    {{ $program->title }}
                                </h3>
                                
                                <div class="text-green-700/70 font-medium text-xs md:text-sm mb-6 md:mb-8 leading-relaxed line-clamp-3">
                                    {!! strip_tags($program->description) !!}
                                </div>
                                
                                <div class="mt-auto pt-4 md:pt-6 border-t border-green-50 flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-[8px] md:text-[9px] font-black text-green-400 uppercase tracking-widest mb-0.5">Deadline</span>
                                        <span class="text-green-900 font-bold text-xs md:text-sm">
                                            {{ $program->registration_deadline ? $program->registration_deadline->format('d M Y') : 'Open Globally' }}
                                        </span>
                                    </div>
                                    
                                    <a href="{{ route('programs.show', $program->slug) }}" 
                                       class="group/btn relative inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-green-50 rounded-full text-green-600 transition-all duration-300 hover:w-36 md:hover:w-40 hover:bg-green-900 hover:text-yellow-500 overflow-hidden">
                                        <span class="absolute left-4 opacity-0 group-hover/btn:opacity-100 text-[9px] md:text-[10px] font-black uppercase tracking-widest whitespace-nowrap transition-all duration-300 delay-75">
                                            View Details
                                        </span>
                                        <svg class="w-4 h-4 md:w-5 md:h-5 absolute transition-all duration-300 right-3 group-hover/btn:right-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 md:mt-20 flex justify-center">
                    {{ $programs->links() }} 
                </div>

            @else
                <div class="py-16 md:py-24 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-green-50 rounded-full mb-4 md:mb-6">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-green-900 mb-2">No Programs Found</h3>
                    <p class="text-sm md:text-base text-green-600 px-4 mb-6">We couldn't find any programs matching your filters.</p>
                    
                    <a href="{{ url()->current() }}" class="inline-flex px-6 py-3 bg-yellow-500 text-green-900 text-xs font-black uppercase tracking-widest rounded-full hover:bg-yellow-400 transition-all">
                        Reset Filters
                    </a>
                </div>
            @endif

        </div>
    </section>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

@endsection