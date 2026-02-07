<nav x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false 
     }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'bg-white/90 backdrop-blur-md shadow-lg border-b border-green-50': scrolled, 'bg-white border-b border-transparent': !scrolled }"
     class="fixed top-0 w-full z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            {{-- LOGO & BRAND NAME --}}
            <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer group" onclick="window.location.href='{{ route('home') }}'">
                {{-- Logo Image --}}
                <img src="{{ asset('logo-unpab.png') }}" 
                     alt="Logo UNPAB" 
                     class="w-10 h-10 md:w-12 md:h-12 object-contain transition-transform duration-300 group-hover:scale-105">
                
                {{-- Text --}}
                <div class="flex flex-col justify-center">
                    <span class="text-[10px] sm:text-xs md:text-sm font-black tracking-tight leading-tight text-green-900 uppercase">
                        Universitas Pembangunan <br class="sm:hidden"> Panca Budi
                    </span>
                    <span class="text-[8px] md:text-[10px] font-bold text-yellow-600 uppercase tracking-widest mt-0.5">
                        International Office
                    </span>
                </div>
            </div>
            
            {{-- DESKTOP MENU --}}
            <div class="hidden md:flex items-center space-x-1">
                
                @php
                    $navLinkClass = "relative px-4 py-2 text-sm font-bold text-green-700 hover:text-green-900 transition-colors group";
                    $activeClass = "text-green-900";
                    $underline = '<span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>';
                @endphp

                <a href="{{ route('home') }}" class="{{ $navLinkClass }} {{ request()->routeIs('home') ? $activeClass : '' }}">
                    Home
                    {!! $underline !!}
                </a>

                {{-- ABOUT DROPDOWN --}}
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="{{ $navLinkClass }} flex items-center gap-1 focus:outline-none {{ request()->routeIs('about.*') ? $activeClass : '' }}">
                        About
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        {!! $underline !!}
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-0 mt-0 w-56 bg-white rounded-2xl shadow-xl border border-green-50 overflow-hidden py-2 z-50">
                         
                        <div class="px-2 py-2 space-y-1">
                            <a href="{{ route('about.organization') }}" class="block px-4 py-3 rounded-xl hover:bg-green-50 transition-colors group/item">
                                <span class="block text-xs font-black text-green-900 group-hover/item:text-green-700">Organization Structure</span>
                                <span class="block text-[10px] text-slate-500 font-medium">Meet the Team</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- PROGRAMS DROPDOWN --}}
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="{{ $navLinkClass }} flex items-center gap-1 focus:outline-none {{ request()->routeIs('programs.*') ? $activeClass : '' }}">
                        Programs
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        {!! $underline !!}
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-0 mt-0 w-72 bg-white rounded-2xl shadow-xl border border-green-50 overflow-hidden py-4 z-50">
                         
                        <div class="px-3 pb-2 space-y-1">
                            <a href="{{ route('programs.index') }}" class="block px-4 py-3 bg-green-50 rounded-xl text-xs font-black text-green-800 hover:bg-green-100 transition-colors text-center">
                                See All Programs
                            </a>
                        </div>

                        <div class="h-px bg-slate-100 mx-4 my-2"></div>

                        <div class="px-3 pb-2 space-y-1">
                            <span class="px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Categories</span>
                            
                            <a href="{{ route('programs.index', ['category' => 'global_opportunities']) }}" class="block px-4 py-3 rounded-xl hover:bg-green-50 transition-colors group/item">
                                <span class="block text-xs font-black text-green-900 group-hover/item:text-green-700">Global Opportunities</span>
                                <span class="block text-[10px] text-slate-500 font-medium">International programs</span>
                            </a>

                            <a href="{{ route('programs.index', ['category' => 'experience_at_unpab']) }}" class="block px-4 py-3 rounded-xl hover:bg-green-50 transition-colors group/item">
                                <span class="block text-xs font-black text-green-900 group-hover/item:text-green-700">Experience at UNPAB</span>
                                <span class="block text-[10px] text-slate-500 font-medium">Visitor programs</span>
                            </a>
                        </div>

                        <div class="h-px bg-slate-100 mx-4 my-2"></div>

                        <div class="px-3">
                            <span class="px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 block">Quick Filters</span>
                            <div class="grid grid-cols-1">                             
                                <a href="{{ route('programs.target', 'student') }}" class="block px-4 py-2 text-xs font-bold text-green-600 hover:text-green-900 hover:bg-slate-50 rounded-lg transition-colors">For Students</a>
                                <a href="{{ route('programs.target', 'lecturer') }}" class="block px-4 py-2 text-xs font-bold text-green-600 hover:text-green-900 hover:bg-slate-50 rounded-lg transition-colors">For Lecturers</a>
                                <a href="{{ route('programs.target', 'staff') }}" class="block px-4 py-2 text-xs font-bold text-green-600 hover:text-green-900 hover:bg-slate-50 rounded-lg transition-colors">For Staff</a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('partners.index') }}" class="{{ $navLinkClass }} {{ request()->routeIs('partners.index') ? $activeClass : '' }}">
                    Partners
                    {!! $underline !!}
                </a>

                <div class="h-6 w-px bg-green-100 mx-4"></div>

                <div class="flex bg-slate-100 p-1 rounded-full relative">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1 text-[10px] font-black rounded-full transition-all duration-300 {{ app()->getLocale() == 'id' ? 'bg-white text-green-900 shadow-sm' : 'text-slate-400 hover:text-green-700' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 text-[10px] font-black rounded-full transition-all duration-300 {{ app()->getLocale() == 'en' ? 'bg-white text-green-900 shadow-sm' : 'text-slate-400 hover:text-green-700' }}">EN</a>
                </div>
            </div>

            {{-- MOBILE MENU BUTTON --}}
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-green-900 p-2 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU CONTENT --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-5"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-5"
         class="md:hidden absolute top-20 left-0 w-full bg-white border-b border-green-50 shadow-2xl py-6 px-4 flex flex-col space-y-4 h-screen overflow-y-auto pb-32">
        
        <a href="{{ route('home') }}" class="text-base font-bold text-green-900 hover:text-yellow-600 py-2 border-b border-slate-50">Home</a>
        
        {{-- MOBILE ABOUT --}}
        <div x-data="{ subOpenAbout: false }">
            <button @click="subOpenAbout = !subOpenAbout" class="flex justify-between items-center w-full text-base font-bold text-green-900 hover:text-yellow-600 py-2 border-b border-slate-50">
                About
                <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': subOpenAbout}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="subOpenAbout" class="pl-2 mt-2 space-y-2 flex flex-col bg-slate-50/50 rounded-xl p-3">
                <a href="{{ route('about.organization') }}" class="block px-2 py-2 text-sm font-bold text-green-800 hover:text-green-600">
                    Organization Structure
                </a>
            </div>
        </div>

        {{-- MOBILE PROGRAMS --}}
        <div x-data="{ subOpen: false }">
            <button @click="subOpen = !subOpen" class="flex justify-between items-center w-full text-base font-bold text-green-900 hover:text-yellow-600 py-2 border-b border-slate-50">
                Programs
                <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': subOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            
            <div x-show="subOpen" class="pl-2 mt-4 space-y-5 flex flex-col">
                <a href="{{ route('programs.index') }}" class="block px-4 py-3 bg-green-50 rounded-xl text-center text-xs font-black text-green-800">
                    See All Programs
                </a>
                <div class="space-y-2">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Categories</span>
                    <a href="{{ route('programs.index', ['category' => 'global_opportunities']) }}" class="flex flex-col p-4 border border-slate-100 rounded-xl">
                        <span class="text-xs font-black text-green-900">Global Opportunities</span>
                    </a>
                    <a href="{{ route('programs.index', ['category' => 'experience_at_unpab']) }}" class="flex flex-col p-4 border border-slate-100 rounded-xl">
                        <span class="text-xs font-black text-green-900">Experience at UNPAB</span>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('partners.index') }}" class="text-base font-bold text-green-900 hover:text-yellow-600 py-2 border-b border-slate-50">Partners</a>
        
        <div class="flex flex-col gap-3 pt-6">
            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Language</span>
            <div class="flex bg-slate-100 p-1 rounded-lg w-fit">
                <a href="{{ route('lang.switch', 'id') }}" class="px-6 py-2 text-xs font-bold rounded-md {{ app()->getLocale() == 'id' ? 'bg-white text-green-900 shadow-sm' : 'text-slate-400' }}">Bahasa</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-6 py-2 text-xs font-bold rounded-md {{ app()->getLocale() == 'en' ? 'bg-white text-green-900 shadow-sm' : 'text-slate-400' }}">English</a>
            </div>
        </div>
    </div>
</nav>