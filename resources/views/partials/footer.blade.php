<footer class="relative bg-green-950 text-white pt-20 pb-10 overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-yellow-500 via-green-500 to-yellow-500"></div>
    
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="relative w-12 h-12 flex items-center justify-center bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl shadow-lg shadow-yellow-500/20 text-white font-black text-2xl tracking-tighter">
                        UP
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 border-2 border-green-900 rounded-full"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black tracking-tight leading-none text-white">
                            UNPAB <span class="text-yellow-500">GLOBAL</span>
                        </span>
                        <span class="text-[10px] font-bold text-green-400 uppercase tracking-[0.2em]">International Office</span>
                    </div>
                </div>

                <p class="text-green-100/70 leading-relaxed font-medium text-sm pr-4">
                    Membangun jembatan antara potensi lokal dan keunggulan global. Menciptakan peluang kelas dunia bagi seluruh civitas akademika UNPAB.
                </p>

                <div class="flex gap-3 pt-2">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-900 border border-green-800 text-green-400 hover:bg-yellow-500 hover:text-green-900 hover:border-yellow-500 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.996 11.996h-.009v.009h.009v-.009zm.009 5.334c2.937 0 5.333-2.396 5.333-5.333S14.943 6.664 12.005 6.664 6.672 9.06 6.672 12.005s2.396 5.333 5.333 5.333zM12 2.664c5.155 0 9.336 4.18 9.336 9.336 0 5.155-4.181 9.336-9.336 9.336-5.156 0-9.336-4.181-9.336-9.336C2.664 6.845 6.844 2.664 12 2.664z"></path></svg>
                    </a>
                    <a href="https://unpab.ac.id" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-900 border border-green-800 text-green-400 hover:bg-yellow-500 hover:text-green-900 hover:border-yellow-500 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-3">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Navigation</h4>
                <ul class="space-y-4 text-sm font-medium text-green-200/80">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Home</a></li>
                    <li><a href="{{ route('programs.index') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> All Programs</a></li>
                    <li><a href="{{ route('partners.index') }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Our Partners</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Opportunities</h4>
                <ul class="space-y-4 text-sm font-medium text-green-200/80">
                    <li>
                        <a href="{{ route('programs.index', ['category' => 'global_opportunities']) }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Global Opportunities
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programs.index', ['category' => 'experience_at_unpab']) }}" class="hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Experience at UNPAB
                        </a>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h4 class="font-bold mb-6 text-xs uppercase tracking-widest text-yellow-500">Contact Us</h4>
                <ul class="space-y-4 text-sm font-medium text-green-200/80">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Jl. Jend. Gatot Subroto No.KM. 4,5, Medan, Sumatera Utara</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:io@unpab.ac.id" class="hover:text-yellow-400 transition-colors">io@unpab.ac.id</a>
                    </li>
                </ul>
            </div>

        </div>

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