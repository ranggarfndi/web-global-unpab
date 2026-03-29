@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')

    {{-- 1. HERO HEADER --}}
    <section class="relative bg-green-900 pt-24 pb-16 md:pt-32 md:pb-20 overflow-hidden">
        {{-- Pattern Cubes --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        
        {{-- Glow Top Right (Kuning) --}}
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-yellow-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
        
        {{-- Glow Bottom Left (Hijau) --}}
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-96 md:h-96 bg-green-500 rounded-full blur-[80px] md:blur-[120px] opacity-20 -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            {{-- Breadcrumbs Navigation --}}
            <nav class="flex justify-center items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-green-400/60 mb-6 md:mb-8">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors">Home</a>
                <span class="text-white/20">/</span>
                <span class="text-white/40">About</span>
                <span class="text-white/20">/</span>
                <span class="text-yellow-500">Contact</span>
            </nav>

            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 leading-tight">
                Connect <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">With Us</span>
            </h1>
            
            <p class="text-sm md:text-lg text-green-100/70 max-w-2xl mx-auto font-medium leading-relaxed px-2">
                {{ app()->getLocale() == 'id' 
                    ? 'Punya pertanyaan tentang program internasional atau kerjasama? Tim International Office UNPAB siap menyambut Anda di kampus kami di Medan.' 
                    : 'Have questions about international programs or partnerships? The UNPAB International Office team is ready to welcome you to our campus in Medan.' }}
            </p>
        </div>
    </section>

    {{-- 2. CONTACT CONTENT --}}
    <section class="bg-white py-12 md:py-24 relative overflow-hidden">
        {{-- Dekorasi Latar --}}
        <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-stretch">
                
                {{-- LEFT: CONTACT INFORMATION --}}
                <div class="lg:col-span-5 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-black text-green-900 mb-10 flex items-center gap-4">
                            <span class="w-10 h-1 bg-yellow-500 rounded-full"></span>
                            Information Hub
                        </h3>

                        <div class="space-y-8">
                            {{-- Address --}}
                            <div class="flex gap-6 group">
                                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 shadow-sm flex-shrink-0 group-hover:bg-green-900 group-hover:text-yellow-500 transition-all duration-300">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-1">Our Office</span>
                                    <p class="text-sm md:text-base font-bold text-green-900 leading-relaxed">Jl. Jenderal Gatot Subroto Km. 4,5 Sei Sikambing, Medan, Indonesia</p>
                                </div>
                            </div>

                            {{-- Instagram (NEW) --}}
                            <a href="https://instagram.com/unpabofficial" target="_blank" class="flex gap-6 group cursor-pointer">
                                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 shadow-sm flex-shrink-0 group-hover:bg-gradient-to-tr group-hover:from-purple-600 group-hover:via-pink-500 group-hover:to-yellow-500 group-hover:text-white transition-all duration-300">
                                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-1">Follow Us</span>
                                    <p class="text-sm md:text-base font-bold text-green-900 leading-none">@unpabofficial</p>
                                </div>
                            </a>

                            {{-- Email --}}
                            <div class="flex gap-6 group">
                                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 shadow-sm flex-shrink-0 group-hover:bg-green-900 group-hover:text-yellow-500 transition-all duration-300">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-1">Email Us</span>
                                    <p class="text-sm md:text-base font-bold text-green-900 leading-none">io@pancabudi.ac.id</p>
                                </div>
                            </div>

                            {{-- WhatsApp --}}
                            <div class="flex gap-6 group">
                                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 shadow-sm flex-shrink-0 group-hover:bg-green-900 group-hover:text-yellow-500 transition-all duration-300">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span class="block text-[10px] font-black text-green-400 uppercase tracking-widest mb-1">WhatsApp Hotline</span>
                                    <p class="text-sm md:text-base font-bold text-green-900 leading-none">+62 8XX XXXX XXXX</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Info Footer --}}
                    <div class="mt-12 p-8 bg-slate-50 border border-slate-100 rounded-[2.5rem]">
                        <p class="text-xs text-slate-500 font-bold leading-relaxed italic">
                            International Office UNPAB terbuka untuk kunjungan pada hari kerja Senin-Jumat pukul 08.30 - 16.30 WIB.
                        </p>
                    </div>
                </div>

                {{-- RIGHT: LARGE GOOGLE MAPS --}}
                <div class="lg:col-span-7 flex flex-col h-full">
                    <div class="relative flex-grow min-h-[500px] md:min-h-full rounded-[3rem] overflow-hidden shadow-2xl shadow-green-900/10 border-4 border-white group">
                        
                        {{-- Iframe dengan penanganan posisi yang lebih stabil --}}
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9889119355294!2d98.64282807473239!3d3.5900176963841233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312e3aa81119d9%3A0xb77bf04f1d46a342!2sUniversitas%20Pembangunan%20Panca%20Budi!5e0!3m2!1sen!2sid!4v1774800274702!5m2!1sen!2sid" 
                            class="absolute inset-0 w-full h-full border-0 transition-all duration-1000" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                        {{-- Floating Action Button (Ditempatkan lebih rapi di pojok bawah) --}}
                        <div class="absolute bottom-8 left-8 z-20">
                            <a href="https://maps.app.goo.gl/RXGfwDLZvn9f8jj27" target="_blank" 
                            class="inline-flex items-center gap-2 px-6 py-4 bg-white/90 backdrop-blur-md text-green-950 font-black text-[10px] uppercase tracking-widest rounded-2xl shadow-xl hover:bg-yellow-500 hover:text-green-900 transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Open in Google Maps
                            </a>
                        </div>

                        {{-- Overlay gradient agar tombol lebih terbaca --}}
                        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection