<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\MusimTanamController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\MaController;
use App\Http\Controllers\OptController;
use App\Http\Controllers\UserAplikasiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\PengamatanPersemaianPadiController;
use App\Http\Controllers\KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController;
use App\Http\Controllers\KeadaanOptPadaPetakPengamatanTetapController;
use App\Http\Controllers\LaporanKerusakanTanamanAkibatBanjirController;
use App\Http\Controllers\LaporanKerusakanTanamanAkibatKekeringanController;
use App\Http\Controllers\InformasiPerubahanKategoriKekeringanController;
use App\Http\Controllers\LaporanKerusakanTanamanAkibatFisiologisController;
use App\Http\Controllers\LaporanKerusakanTanamanAkibatBencanaAlamController;
use App\Http\Controllers\TangkapanLampuPerangkapController;
use App\Http\Controllers\KumulatifLuasTambahTanamPadiController;
use App\Http\Controllers\PenggunaanPestisidaController;
use App\Http\Controllers\KeadaanCurahHujanController;
use App\Http\Controllers\PengamatanPenyebaranDanPerkembanganSiputMurbeyController;
use App\Http\Controllers\LaporanPeringatanDiniController;




Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('ceklogin')->group(function () {

    Route::get('/dashboard', function () {

        if (session('role') == 'pengelola_data') {
            return redirect('/dashboard-pengelola');
        }

        if (session('role') == 'popt') {
            return redirect('/dashboard-popt');
        }

        if (session('role') == 'lphp') {
            return redirect('/dashboard-lphp');
        }

        if (session('role') == 'pimpinan') {
            return redirect('/dashboard-pimpinan');
        }

        return redirect('/login');

    });

});
Route::middleware([
    'ceklogin',
    'cekrole:pengelola_data'
])->group(function () {

    //DASHBOARD
    Route::get('/dashboard-pengelola', function () {

        return '
            <h1>Dashboard Pengelola Data</h1>
            <hr>

            Login sebagai : '.session('username').'<br>
            Role : '.session('role').'<br><br>

            <h3>Dashboard</h3>
            <a href="/dashboard-opt">Dashboard OPT</a><br>
            <a href="/dashboard-dpi">Dashboard DPI</a><br><br>

            <h3>Master Data</h3>

            <a href="/kabupaten">Kabupaten/Kota</a><br>
            <a href="/kecamatan">Kecamatan</a><br>
            <a href="/desa">Desa</a><br>
            <a href="/komoditas">Komoditas</a><br>
            <a href="/musim_tanam">Musim Tanam</a><br>
            <a href="/tahun">Tahun</a><br>
            <a href="/bulan">Bulan</a><br>
            <a href="/kelompok-tani">Kelompok Tani</a><br>
            <a href="/ma">MA</a><br>
            <a href="/opt">OPT</a><br>
            <a href="/periode">Periode</a><br>
            <a href="/petugas">Petugas</a><br>


            <h3>Data Pengamatan</h3>
            <a href="/data">Data</a><br>
            <a href="/sp">SP</a><br>
            <a href="/pengamatan-persemaian-padi">Pengamatan Persemaian Padi</a><br><br>
            <a href="/keadaan-serangan-opt">Keadaan serangan OPT dan pengendalian di wilayah pengamatan</a>



            <h3>Manajemen Pengguna</h3>
            <a href="/user-aplikasi">User Aplikasi</a><br>
            <a href="/role">Role & Permission</a><br><br>

            <h3>Laporan</h3>
            <a href="/laporan-opt">Laporan OPT</a><br>
            <a href="/laporan-dpi">Laporan DPI</a><br><br>

            <a href="/logout">Logout</a>

        ';
    });

    // MASTER DATA
    Route::resource('kabupaten', KabupatenKotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('desa', DesaController::class);
    Route::resource('komoditas', KomoditasController::class);
    Route::resource('musim_tanam', MusimTanamController::class);
    Route::resource('tahun', TahunController::class);
    Route::resource('bulan', BulanController::class);
    Route::resource('kelompok-tani', KelompokTaniController::class);
    Route::resource('ma', MaController::class);
    Route::resource('opt', OptController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('petugas', PetugasController::class);

    //DATA PENGAMATAN
    Route::resource('data', DataController::class);
    Route::get('/sp/{id_data}',[SpController::class, 'create'])->name('sp.create');
    Route::get('/pengamatan-persemaian-padi/{id_data}',[PengamatanPersemaianPadiController::class,'create'])->name('pengamatan-persemaian-padi.create');
    Route::post('/pengamatan-persemaian-padi/store',[PengamatanPersemaianPadiController::class, 'store'])->name('pengamatan-persemaian-padi.store');
    Route::get('/pengamatan-persemaian-padi',[PengamatanPersemaianPadiController::class, 'index'])->name('pengamatan-persemaian-padi.index');
    Route::get('/pengamatan-persemaian-padi/show/{id}',[PengamatanPersemaianPadiController::class, 'show'])->name('pengamatan-persemaian-padi.show');
    Route::get('/pengamatan-persemaian-padi/edit/{id}',[PengamatanPersemaianPadiController::class, 'edit'])->name('pengamatan-persemaian-padi.edit');
    Route::post('/pengamatan-persemaian-padi/update/{id}',[PengamatanPersemaianPadiController::class, 'update'])->name('pengamatan-persemaian-padi.update');
    Route::get('/keadaan-serangan-opt/{id_data}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'create'])->name('keadaan-serangan-opt.create');
    Route::post('/keadaan-serangan-opt/store',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'store'])->name('keadaan-serangan-opt.store');
    Route::get('/keadaan-serangan-opt',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'index'])->name('keadaan-serangan-opt.index');
    Route::get('/keadaan-serangan-opt/show/{id}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'show'])->name('keadaan-serangan-opt.show');
    Route::get('/keadaan-serangan-opt/edit/{id}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'edit'])->name('keadaan-serangan-opt.edit');
    Route::post('/keadaan-serangan-opt/update/{id}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'update'])->name('keadaan-serangan-opt.update');
    Route::get('/keadaan-serangan-opt/verifikasi/{id}/{status}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class,'verifikasi'])->name('keadaan-serangan-opt.verifikasi');
    Route::get('/keadaan-opt-pada-petak-pengamatan-tetap',[KeadaanOptPadaPetakPengamatanTetapController::class, 'index'])->name('keadaan-opt-pada-petak-pengamatan-tetap.index');
    Route::get('/keadaan-opt-pada-petak-pengamatan-tetap/create/{id_data}',[KeadaanOptPadaPetakPengamatanTetapController::class, 'create'])->name('keadaan-opt-pada-petak-pengamatan-tetap.create');
    Route::post('/keadaan-opt-pada-petak-pengamatan-tetap/store',[KeadaanOptPadaPetakPengamatanTetapController::class, 'store'])->name('keadaan-opt-pada-petak-pengamatan-tetap.store');
    Route::get('/keadaan-opt-pada-petak-pengamatan-tetap/detail/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class, 'detail'])->name('keadaan-opt-pada-petak-pengamatan-tetap.detail');
    Route::get('/keadaan-opt-pada-petak-pengamatan-tetap/edit/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class, 'edit'])->name('keadaan-opt-pada-petak-pengamatan-tetap.edit');
    Route::put('/keadaan-opt-pada-petak-pengamatan-tetap/update/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class, 'update'])->name('keadaan-opt-pada-petak-pengamatan-tetap.update');
    Route::get('/keadaan-opt-pada-petak-pengamatan-tetap/verifikasi/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class,'verifikasi'])->name('keadaan-opt-pada-petak-pengamatan-tetap.verifikasi');
    Route::post('/keadaan-opt-pada-petak-pengamatan-tetap/simpan-verifikasi/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class,'simpanVerifikasi'])->name('keadaan-opt-pada-petak-pengamatan-tetap.simpan-verifikasi');
    Route::get('/laporan-kerusakan-tanaman-akibat-banjir',[LaporanKerusakanTanamanAkibatBanjirController::class,'index'])->name('laporan-kerusakan-tanaman-akibat-banjir.index');
    Route::get('/laporan-kerusakan-tanaman-akibat-banjir/create/{id_data}',[LaporanKerusakanTanamanAkibatBanjirController::class,'create'])->name('laporan-kerusakan-tanaman-akibat-banjir.create');
    Route::post('/laporan-kerusakan-tanaman-akibat-banjir/store',[LaporanKerusakanTanamanAkibatBanjirController::class,'store'])->name('laporan-kerusakan-tanaman-akibat-banjir.store');
    Route::get('/laporan-kerusakan-tanaman-akibat-banjir/detail/{id}',[LaporanKerusakanTanamanAkibatBanjirController::class,'detail'])->name('laporan-kerusakan-tanaman-akibat-banjir.detail');
    Route::get('/laporan-kerusakan-tanaman-akibat-kekeringan',[LaporanKerusakanTanamanAkibatKekeringanController::class,'index'])->name('laporan-kerusakan-tanaman-akibat-kekeringan.index');
    Route::get('/laporan-kerusakan-tanaman-akibat-kekeringan/create/{id_data}',[LaporanKerusakanTanamanAkibatKekeringanController::class,'create'])->name('laporan-kerusakan-tanaman-akibat-kekeringan.create');
    Route::post('/laporan-kerusakan-tanaman-akibat-kekeringan/store',[LaporanKerusakanTanamanAkibatKekeringanController::class,'store'])->name('laporan-kerusakan-tanaman-akibat-kekeringan.store');


    Route::get(
        '/informasi-perubahan-kategori-kekeringan',
        [InformasiPerubahanKategoriKekeringanController::class, 'index']
    )->name('informasi-perubahan-kategori-kekeringan.index');

    Route::get(
        '/informasi-perubahan-kategori-kekeringan/create/{id_data}',
        [InformasiPerubahanKategoriKekeringanController::class, 'create']
    )->name('informasi-perubahan-kategori-kekeringan.create');

    Route::post(
    '/informasi-perubahan-kategori-kekeringan/store',
    [InformasiPerubahanKategoriKekeringanController::class, 'store']
    )->name('informasi-perubahan-kategori-kekeringan.store');

    Route::get(
        '/informasi-perubahan-kategori-kekeringan/detail/{id}',
        [InformasiPerubahanKategoriKekeringanController::class, 'show']
    )->name('informasi-perubahan-kategori-kekeringan.detail');

    Route::get(
        '/informasi-perubahan-kategori-kekeringan/edit/{id}',
        [InformasiPerubahanKategoriKekeringanController::class, 'edit']
    )->name('informasi-perubahan-kategori-kekeringan.edit');

    Route::put(
        '/informasi-perubahan-kategori-kekeringan/update/{id}',
        [InformasiPerubahanKategoriKekeringanController::class, 'update']
    )->name('informasi-perubahan-kategori-kekeringan.update');


    Route::get(
    '/laporan-kerusakan-tanaman-akibat-fisiologis',
    [LaporanKerusakanTanamanAkibatFisiologisController::class, 'index']
    )->name('laporan-kerusakan-tanaman-akibat-fisiologis.index');

    Route::get(
        '/laporan-kerusakan-tanaman-akibat-fisiologis/create/{id_data}',
        [LaporanKerusakanTanamanAkibatFisiologisController::class, 'create']
    )->name('laporan-kerusakan-tanaman-akibat-fisiologis.create');

    Route::post(
        '/laporan-kerusakan-tanaman-akibat-fisiologis/store',
        [LaporanKerusakanTanamanAkibatFisiologisController::class, 'store']
    )->name('laporan-kerusakan-tanaman-akibat-fisiologis.store');
    Route::get(
    '/laporan-kerusakan-tanaman-akibat-fisiologis/detail/{id}',
    [LaporanKerusakanTanamanAkibatFisiologisController::class, 'show']
    )->name('laporan-kerusakan-tanaman-akibat-fisiologis.detail');

    Route::get(
        '/laporan-kerusakan-tanaman-akibat-fisiologis/edit/{id}',
        [LaporanKerusakanTanamanAkibatFisiologisController::class, 'edit']
    )->name('laporan-kerusakan-tanaman-akibat-fisiologis.edit');


    Route::get(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'index']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.index');

    Route::get(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/create/{id_data}',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'create']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.create');

    Route::post(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/store',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'store']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.store');

    Route::get(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/detail/{id}',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'show']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.detail');

    Route::get(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/edit/{id}',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'edit']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.edit');

    Route::put(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/update/{id}',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'update']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.update');

    Route::delete(
        '/laporan-kerusakan-tanaman-akibat-bencana-alam/delete/{id}',
        [LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'destroy']
    )->name('laporan-kerusakan-tanaman-akibat-bencana-alam.destroy');



    Route::get(
        '/tangkapan-lampu-perangkap',
        [TangkapanLampuPerangkapController::class, 'index']
    )->name('tangkapan-lampu-perangkap.index');

    Route::get(
        '/tangkapan-lampu-perangkap/create/{id_data}',
        [TangkapanLampuPerangkapController::class, 'create']
    )->name('tangkapan-lampu-perangkap.create');

    Route::post(
        '/tangkapan-lampu-perangkap',
        [TangkapanLampuPerangkapController::class, 'store']
    )->name('tangkapan-lampu-perangkap.store');

    Route::get(
        '/tangkapan-lampu-perangkap/{id}',
        [TangkapanLampuPerangkapController::class, 'show']
    )->name('tangkapan-lampu-perangkap.detail');

    Route::get(
        '/tangkapan-lampu-perangkap/{id}/edit',
        [TangkapanLampuPerangkapController::class, 'edit']
    )->name('tangkapan-lampu-perangkap.edit');

    Route::put(
        '/tangkapan-lampu-perangkap/{id}',
        [TangkapanLampuPerangkapController::class, 'update']
    )->name('tangkapan-lampu-perangkap.update');

    Route::delete(
        '/tangkapan-lampu-perangkap/{id}',
        [TangkapanLampuPerangkapController::class, 'destroy']
    )->name('tangkapan-lampu-perangkap.destroy');


    Route::get(
    '/kumulatif-luas-tambah-tanam-padi',
    [KumulatifLuasTambahTanamPadiController::class,'index']
    )->name('kumulatif-luas-tambah-tanam-padi.index');

    Route::get(
        '/kumulatif-luas-tambah-tanam-padi/create/{id_data}',
        [KumulatifLuasTambahTanamPadiController::class,'create']
    )->name('kumulatif-luas-tambah-tanam-padi.create');

    Route::post(
        '/kumulatif-luas-tambah-tanam-padi',
        [KumulatifLuasTambahTanamPadiController::class,'store']
    )->name('kumulatif-luas-tambah-tanam-padi.store');

    Route::get(
        '/kumulatif-luas-tambah-tanam-padi/{id}/edit',
        [KumulatifLuasTambahTanamPadiController::class,'edit']
    )->name('kumulatif-luas-tambah-tanam-padi.edit');

    Route::put(
        '/kumulatif-luas-tambah-tanam-padi/{id}',
        [KumulatifLuasTambahTanamPadiController::class,'update']
    )->name('kumulatif-luas-tambah-tanam-padi.update');

    Route::delete(
        '/kumulatif-luas-tambah-tanam-padi/{id}',
        [KumulatifLuasTambahTanamPadiController::class,'destroy']
    )->name('kumulatif-luas-tambah-tanam-padi.destroy');




    Route::get(
    '/penggunaan-pestisida',
    [PenggunaanPestisidaController::class,'index']
    )->name('penggunaan-pestisida.index');

    Route::get(
        '/penggunaan-pestisida/create/{id_data}',
        [PenggunaanPestisidaController::class,'create']
    )->name('penggunaan-pestisida.create');

    Route::post(
        '/penggunaan-pestisida',
        [PenggunaanPestisidaController::class,'store']
    )->name('penggunaan-pestisida.store');

    Route::get(
        '/penggunaan-pestisida/{id}',
        [PenggunaanPestisidaController::class,'show']
    )->name('penggunaan-pestisida.show');

    Route::get(
        '/penggunaan-pestisida/{id}/edit',
        [PenggunaanPestisidaController::class,'edit']
    )->name('penggunaan-pestisida.edit');

    Route::put(
        '/penggunaan-pestisida/{id}',
        [PenggunaanPestisidaController::class,'update']
    )->name('penggunaan-pestisida.update');

    Route::delete(
        '/penggunaan-pestisida/{id}',
        [PenggunaanPestisidaController::class,'destroy']
    )->name('penggunaan-pestisida.destroy');



    Route::get(
    '/keadaan-curah-hujan',
    [KeadaanCurahHujanController::class, 'index']
    )->name('keadaan-curah-hujan.index');

    Route::get(
        '/keadaan-curah-hujan/create/{id_data}',
        [KeadaanCurahHujanController::class, 'create']
    )->name('keadaan-curah-hujan.create');

    Route::post(
        '/keadaan-curah-hujan/store',
        [KeadaanCurahHujanController::class, 'store']
    )->name('keadaan-curah-hujan.store');

    Route::get(
        '/keadaan-curah-hujan/{id}',
        [KeadaanCurahHujanController::class, 'show']
    )->name('keadaan-curah-hujan.show');

    Route::get(
        '/keadaan-curah-hujan/{id}/edit',
        [KeadaanCurahHujanController::class, 'edit']
    )->name('keadaan-curah-hujan.edit');

    Route::put(
        '/keadaan-curah-hujan/{id}',
        [KeadaanCurahHujanController::class, 'update']
    )->name('keadaan-curah-hujan.update');

    Route::delete(
        '/keadaan-curah-hujan/{id}',
        [KeadaanCurahHujanController::class, 'destroy']
    )->name('keadaan-curah-hujan.destroy');


    Route::prefix('pengamatan-penyebaran-dan-perkembangan-siput-murbey')->group(function () {

        Route::get(
            '/',
            [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'index']
        )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index');

        // CREATE
        Route::get(
            '/create/{id_data}',
            [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'create']
        )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.create');

        // STORE
        Route::post(
            '/store',
            [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'store']
        )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.store');

        // DETAIL
        Route::get(
            '/detail/{id}',
            [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'detail']
        )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.detail');

        // EDIT
        Route::get(
                '/edit/{id}',
                [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'edit']
            )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.edit');

            // UPDATE
            Route::put(
                '/update/{id}',
                [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'update']
            )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.update');

            // HAPUS
            Route::delete(
                '/destroy/{id}',
                [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'destroy']
            )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.destroy');

            // VERIFIKASI
            Route::get(
                '/verifikasi/{id}',
                [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'verifikasi']
            )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.verifikasi');

            Route::post(
                '/verifikasi/{id}',
                [PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'prosesVerifikasi']
            )->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.proses-verifikasi');
    });



Route::prefix('laporan-peringatan-dini')->group(function () {

    // INDEX
    Route::get(
        '/',
        [LaporanPeringatanDiniController::class, 'index']
    )->name('laporan-peringatan-dini.index');

    // CREATE
    Route::get(
        '/create/{id_data}',
        [LaporanPeringatanDiniController::class, 'create']
    )->name('laporan-peringatan-dini.create');

    // STORE
    Route::post(
        '/store',
        [LaporanPeringatanDiniController::class, 'store']
    )->name('laporan-peringatan-dini.store');

    // DETAIL
    Route::get(
        '/detail/{id}',
        [LaporanPeringatanDiniController::class, 'detail']
    )->name('laporan-peringatan-dini.detail');

    // EDIT
    Route::get(
        '/edit/{id}',
        [LaporanPeringatanDiniController::class, 'edit']
    )->name('laporan-peringatan-dini.edit');

    // UPDATE
    Route::put(
        '/update/{id}',
        [LaporanPeringatanDiniController::class, 'update']
    )->name('laporan-peringatan-dini.update');

    // HAPUS
    Route::delete(
        '/destroy/{id}',
        [LaporanPeringatanDiniController::class, 'destroy']
    )->name('laporan-peringatan-dini.destroy');

    // VERIFIKASI
    Route::get(
        '/verifikasi/{id}',
        [LaporanPeringatanDiniController::class, 'verifikasi']
    )->name('laporan-peringatan-dini.verifikasi');

    // PROSES VERIFIKASI
    Route::post(
        '/verifikasi/{id}',
        [LaporanPeringatanDiniController::class, 'prosesVerifikasi']
    )->name('laporan-peringatan-dini.proses-verifikasi');

});




    //MANAJEMEN PENGGUNA
    Route::middleware('permission:kelola_user')->group(function () {
        Route::resource('user-aplikasi',UserAplikasiController::class);
        Route::get('/role', [RoleController::class, 'index']);
        Route::get('/role/{id}', [RoleController::class, 'show']);
        Route::post('/role/{id}', [RoleController::class, 'update']);
        
    });
});

 

Route::middleware(['ceklogin','cekrole:popt'])->group(function () {

    Route::get('/dashboard-popt', function () {

        return '
        <h1>Dashboard POPT</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Input Data POPT

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });

});


Route::middleware(['ceklogin','cekrole:lphp'])->group(function () {

    Route::get('/dashboard-lphp', function () {

        return '
        <h1>Dashboard LPHP</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Input Data LPHP

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });

    

});

Route::middleware(['ceklogin','cekrole:pimpinan'])->group(function () {

    Route::get('/dashboard-pimpinan', function () {

        return '
        <h1>Dashboard Pimpinan</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Laporan

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/proses-login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
