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
        Schema::create('laporan_pengamatan', function (Blueprint $table) {

            $table->increments('id_laporan');

            // Petugas yang membuat laporan
            $table->unsignedInteger('id_petugas');

            // Periode 1 / Periode 2
            $table->unsignedInteger('id_periode');

            // Tanggal laporan dibuat
            $table->date('tanggal_laporan');

            // Status workflow
            $table->enum('status', [
                'draft',
                'menunggu_verifikasi',
                'revisi',
                'disetujui'
            ])->default('draft');

            // Catatan dari LPHP
            $table->text('catatan_lphp')->nullable();

            // Waktu kirim ke LPHP
            $table->timestamp('tanggal_kirim')->nullable();

            // Waktu diverifikasi LPHP
            $table->timestamp('tanggal_verifikasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengamatan');
    }
    
};
