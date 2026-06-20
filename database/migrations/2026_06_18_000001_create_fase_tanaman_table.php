<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fase_tanaman', function (Blueprint $table) {
            $table->integer('id_fase', true); // AUTO_INCREMENT Primary Key
            $table->string('nama_fase', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fase_tanaman');
    }
};
