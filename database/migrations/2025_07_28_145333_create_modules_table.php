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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
             $table->foreignId('course_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->text('content')->nullable(); // bisa teks/gambar
        $table->string('video_url')->nullable(); // untuk YouTube
        $table->integer('order')->default(1); // urutan modul
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
