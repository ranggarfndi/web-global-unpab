<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            // Kategori Program
            $table->enum('category', ['experience_at_unpab', 'global_opportunities']);
        
            // Target Audiens (Lecturer / Staff / Student)
            $table->enum('target_audience', ['lecturer', 'staff', 'student']);
            
            // Data Translatable (Disimpan sebagai JSON agar bisa ID & EN)
            $table->json('title'); 
            $table->string('slug')->unique();
            
            // Data Kompleks (Disimpan JSON untuk struktur Repeater Filament)
            $table->json('overview')->nullable(); // Untuk data ringkas (Durasi, SKS, Biaya)
            $table->json('activities')->nullable(); // Untuk Timeline kegiatan
            $table->json('description')->nullable(); // Deskripsi panjang
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->date('registration_deadline')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
