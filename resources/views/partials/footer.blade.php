<footer class="relative bg-green-950 text-white pt-20 pb-10 overflow-hidden">
    
    {{-- Garis Gradien Atas --}}
    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-yellow-500 via-green-500 to-yellow-500"></div>
    
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">
            
            {{-- KOLOM 1: IDENTITAS --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-4">
                    {{-- Logo UNPAB --}}
                    <div class="relative w-14 h-14 bg-white/5 rounded-xl flex items-center justify-center p-1 border border-white/10 shadow-lg">
                        <img src="{{ asset('logo-unpab.png') }}" alt="Logo UNPAB" class="w-full h-full object-contain">
                    </div>
                    
                    {{-- Nama Kampus --}}
                    <div class="flex flex-col justify-center">
                        <span class="text-sm md:text-base font-black tracking-tight leading-tight text-white uppercase">
                            Universitas Pembangunan <br> Panca Budi
                        </span>
                        <span class="text-[10px] font-bold text-yellow-500 uppercase tracking-[0.2em] mt-1">
                            International Office
                        </span>
                    </div>
                </div>

                <p class="text-green-100/70 leading-relaxed font-medium text-sm pr-4 text-justify">
                    Membangun jembatan antara potensi lokal dan keunggulan global. Menciptakan peluang kelas dunia bagi seluruh civitas akademika UNPAB untuk tumbuh dan bersaing di kancah internasional.
                </p>

                {{-- Social Media Icons --}}
                <div class="flex gap-3 pt-2">
                    {{-- Instagram Updated to @unpabofficial --}}
                    <a href="https://instagram.com/unpabofficial" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-900 border border-green-800 text-green-400 hover:bg-gradient-to-tr hover:from-purple-600 hover:to-yellow-500 hover:text-white hover:border-transparent transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://unpab.ac.id" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-900 border border-green-800 text-green-400 hover:bg-yellow-500 hover:text-green-900 hover:border-yellow-500 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: NAVIGATION (UPDATED) --}}
            <div class="lg:col-span-3 lg:pl-8">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Main Menu</h4>
                <ul class="space-y-3 text-sm font-medium text-green-200/80">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-yellow-600"></span> Home</a></li>
                    <li><a href="{{ route('about.organization') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Organization Structure</a></li>
                    <li><a href="{{ route('about.contact') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Contact Us</a></li>
                    <li><a href="{{ route('archives.index') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Program Archives</a></li>
                    <li><a href="{{ route('partners.index') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Global Partners</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: PROGRAMS --}}
            <div class="lg:col-span-2">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Categories</h4>
                <ul class="space-y-3 text-sm font-medium text-green-200/80">
                    <li>
                        <a href="{{ route('programs.index', ['category' => 'global_opportunities']) }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Global Opps
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programs.index', ['category' => 'experience_at_unpab']) }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Exp. at UNPAB
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 4: CONTACT (UPDATED) --}}
            <div class="lg:col-span-3">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Office</h4>
                <ul class="space-y-4 text-sm font-medium text-green-200/80">
                    <li class="flex items-start gap-3 group">
                        <div class="mt-1 w-8 h-8 rounded-full bg-green-900 flex items-center justify-center flex-shrink-0 group-hover:bg-yellow-500 group-hover:text-green-900 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="leading-relaxed">Jl. Jend. Gatot Subroto No.KM. 4,5, Sei Sikambing, Medan, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="w-8 h-8 rounded-full bg-green-900 flex items-center justify-center flex-shrink-0 group-hover:bg-yellow-500 group-hover:text-green-900 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <a href="mailto:io@pancabudi.ac.id" class="hover:text-yellow-400 transition-colors">io@pancabudi.ac.id</a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="pt-8 border-t border-green-800/30 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-green-400/60 text-[10px] font-bold uppercase tracking-widest text-center md:text-left">
                &copy; {{ date('Y') }} UNPAB International Office. All Rights Reserved.
            </div>
            <div class="flex gap-6 text-[10px] font-bold uppercase tracking-widest text-green-400/60">
                <a href="#" class="hover:text-yellow-500 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-yellow-500 transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>