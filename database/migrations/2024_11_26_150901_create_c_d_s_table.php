<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable(); // Optional, jika CD memiliki pengarang.
            $table->enum('type', ['audio', 'video']); // Jenis CD.
            $table->integer('quantity')->default(1); // Jumlah stok.
            $table->boolean('is_available')->default(true); // Status ketersediaan.
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_d_s');
    }
};
