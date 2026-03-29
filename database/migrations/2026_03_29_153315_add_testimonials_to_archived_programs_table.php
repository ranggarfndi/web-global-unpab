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
        Schema::table('archived_programs', function (Blueprint $table) {
            // Kolom JSON untuk menampung data testimoni (nama, foto, npm, isi, rating)
            $table->json('testimonials')->nullable()->after('stats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('archived_programs', function (Blueprint $table) {
            //
        });
    }
};
