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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained("books");
            $table->integer('page_number')->nullable(); // halaman terakhir dibaca
            $table->integer('duration')->nullable(); // durasi baca (detik/menit)
            $table->timestamp('read_at')->nullable(); // waktu baca terakhir
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
