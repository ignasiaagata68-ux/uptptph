<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetInformasiPerubahanKategoriKekeringan extends Model
{
    protected $table =
        'det_informasi_perubahan_kategori_kekeringan';

    protected $primaryKey =
        'id_det_informasi_perubahan_kategori_kekeringan';

    public $timestamps = false;

    protected $fillable = [

        'id_informasi_perubahan_kategori_kekeringan',

        'id_desa',
        'id_komoditas',

        'ltb_ringan',
        'ltb_sedang',
        'ltb_berat',
        'ltb_puso',
        'ltb_jumlah',

        'pkt_ringan',
        'pkt_sedang',
        'pkt_berat',
        'pkt_puso',
        'pkt_jumlah',
        'pkt_pulih',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'
    ];
}