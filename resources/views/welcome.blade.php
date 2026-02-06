<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Global Engagement | UNPAB</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-amber-600 p-2 rounded-lg text-white font-bold text-xl">UP</div>
                    <div>
                        <span class="block text-sm font-bold tracking-tight leading-none text-slate-800">UNPAB GLOBAL</span>
                        <span class="text-[10px] text-slate-500 font-medium uppercase tracking-widest">International Office</span>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-10">
                    <a href="#home" class="text-sm font-semibold hover:text-amber-600 transition-colors">Home</a>
                    <a href="#partners" class="text-sm font-semibold hover:text-amber-600 transition-colors">Partners</a>
                    <a href="#programs" class="text-sm font-semibold hover:text-amber-600 transition-colors">Programs</a>
                    
                    <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200">
                        <a href="{{ route('lang.switch', 'id') }}" 
                           class="px-4 py-1.5 text-[11px] font-bold rounded-lg transition-all {{ app()->getLocale() == 'id' ? 'bg-white shadow-sm text-amber-600' : 'text-slate-500 hover:text-slate-800' }}">ID</a>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="px-4 py-1.5 text-[11px] font-bold rounded-lg transition-all {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm text-amber-600' : 'text-slate-500 hover:text-slate-800' }}">EN</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header id="home" class="relative bg-white pt-24 pb-32 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-amber-50/50 rounded-l-[100px]"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 text-xs font-bold rounded-full mb-6 tracking-widest uppercase">
                    {{ app()->getLocale() == 'id' ? 'Selamat Datang di UNPAB' : 'Welcome to UNPAB' }}
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 leading-[1.1] mb-8">
                    Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-amber-500">World-Class</span> <br>Opportunities.
                </h1>
                <p class="text-lg md:text-xl text-slate-500 mb-12 leading-relaxed">
                    {{ app()->getLocale() == 'id' 
                        ? 'Memfasilitasi pertukaran akademik global, kemitraan strategis, dan pengalaman internasional yang tak terlupakan bagi civitas UNPAB.' 
                        : 'Facilitating global academic exchange, strategic partnerships, and unforgettable international experiences for UNPAB community.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#programs" class="inline-flex items-center justify-center px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-slate-800 transition-all shadow-lg shadow-slate-200">
                        Explore Programs
                    </a>
                    <a href="#partners" class="inline-flex items-center justify-center px-8 py-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-2xl hover:bg-slate-50 transition-all">
                        Our Partners
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section id="partners" class="py-20 bg-slate-50 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-[10px] font-black uppercase text-slate-400 tracking-[0.2em] mb-12">
                {{ app()->getLocale() == 'id' ? 'Mitra Strategis Global' : 'Global Strategic Partners' }}
            </h2>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 grayscale hover:grayscale-0 transition-all duration-700 opacity-60 hover:opacity-100">
                @foreach($partners as $partner)
                    <a href="{{ $partner->website_url }}" target="_blank">
                        <img class="h-10 md:h-14 w-auto object-contain transition-transform hover:scale-110" 
                             src="{{ $partner->getFirstMediaUrl('partner_logo') }}" 
                             alt="{{ $partner->name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="programs" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Featured Programs</h2>
                    <p class="text-slate-500">
                        {{ app()->getLocale() == 'id' 
                            ? 'Pilih program internasional yang sesuai dengan jalur akademik dan tujuan karier Anda.' 
                            : 'Choose an international program that suits your academic path and career goals.' }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($programs as $program)
                    <div class="group flex flex-col bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $program->getFirstMediaUrl('program_gallery') }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                 alt="{{ $program->title }}">
                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 bg-white/95 backdrop-blur text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                    {{ str_replace('_', ' ', $program->category) }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-snug group-hover:text-amber-600 transition-colors">
                                {{ $program->title }}
                            </h3>
                            <div class="text-slate-500 text-sm mb-8 leading-relaxed line-clamp-3">
                                {!! $program->description !!}
                            </div>
                            
                            <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                                <div class="flex items-center text-[11px] font-bold text-slate-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $program->registration_deadline ? $program->registration_deadline->format('d M Y') : 'Open' }}
                                </div>
                                <a href="#" class="inline-flex items-center text-xs font-black uppercase tracking-widest text-amber-600 hover:gap-2 transition-all">
                                    Details <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="bg-amber-600 p-2 rounded-lg font-bold text-xl">UP</div>
                        <span class="text-2xl font-black tracking-tighter italic">UNPAB GLOBAL</span>
                    </div>
                    <p class="text-slate-400 max-w-sm leading-relaxed">
                        International Office of Universitas Pembangunan Panca Budi. Building bridges between local potential and global excellence.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-sm uppercase tracking-widest text-slate-500">Navigation</h4>
                    <ul class="space-y-4 text-slate-400 text-sm font-medium">
                        <li><a href="#home" class="hover:text-amber-500">Home</a></li>
                        <li><a href="#partners" class="hover:text-amber-500">Partners</a></li>
                        <li><a href="#programs" class="hover:text-amber-500">Programs</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-sm uppercase tracking-widest text-slate-500">Contact</h4>
                    <ul class="space-y-4 text-slate-400 text-sm font-medium">
                        <li>Medan, North Sumatra</li>
                        <li>io@unpab.ac.id</li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-slate-800 text-center text-slate-500 text-[10px] font-bold uppercase tracking-widest">
                &copy; {{ date('Y') }} UNPAB International Office. Built with Laravel 10 & Filament V3.
            </div>
        </div>
    </footer>

</body>
</html>