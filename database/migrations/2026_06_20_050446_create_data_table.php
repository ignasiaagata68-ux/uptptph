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
        Schema::create('data', function (Blueprint $table) {
             $table->increments('id_data');

            $table->integer('id_petugas')->unsigned();
            $table->integer('id_tahun')->unsigned();
            $table->integer('id_bulan')->unsigned();
            $table->integer('id_periode')->unsigned();
            $table->integer('id_musim_tanam')->unsigned();

            $table->date('tanggal_laporan');

            $table->timestamps();

            $table->foreign('id_petugas')
                ->references('id_petugas')
                ->on('petugas');

            $table->foreign('id_tahun')
                ->references('id_tahun')
                ->on('tahun');

            $table->foreign('id_bulan')
                ->references('id_bulan')
                ->on('bulan');

            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode');

            $table->foreign('id_musim_tanam')
                ->references('id_musim_tanam')
                ->on('musim_tanam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
