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
        Schema::create('archived_programs', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Translatable
            $table->string('category');
            $table->date('execution_date'); // Tanggal pelaksanaan program
            $table->json('summary')->nullable(); // Translatable
            $table->json('content')->nullable(); // Translatable (Laporan/Cerita)
            $table->json('stats')->nullable(); // Untuk data seperti "10 Peserta", dst.
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_programs');
    }
};
