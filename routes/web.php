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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPengelolaController;



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


Route::middleware(['ceklogin','cekrole:pengelola_data'])->group(function () {

    Route::get('/dashboard-pengelola', [DashboardPengelolaController::class, 'index']);
    Route::get('/dashboard-opt', function () { return view('dashboard.dashboard-opt'); });
    Route::get('/dashboard-dpi', function () { return view('dashboard.dashboard-dpi'); });
    Route::get('/master-data', function () { return view('dashboard.master-data'); });
    Route::get('/data-opt', function () { return view('dashboard.data-opt'); });
    Route::get('/data-dpi', function () { return view('dashboard.data-dpi'); });
    Route::get('/verifikasi', function () { return view('dashboard.verifikasi'); });
    Route::get('/laporan', function () { return view('dashboard.laporan'); });
    Route::get('/manajemen-sistem', function () { return view('dashboard.manajemen-sistem'); });

    // ================= MASTER DATA =================
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

}); 


Route::middleware(['ceklogin','cekrole:pengelola_data,popt,lphp'])->group(function () {

    //DATA PENGAMATAN
    Route::resource('data', DataController::class);
    Route::get('/sp/{id_data}',[SpController::class, 'create'])->name('sp.create');
    
    
    Route::prefix('pengamatan-persemaian-padi')->group(function () {

        Route::get('/',[PengamatanPersemaianPadiController::class, 'index'])->name('pengamatan-persemaian-padi.index');
        Route::get('/create/{id_data}',[PengamatanPersemaianPadiController::class, 'create'])->name('pengamatan-persemaian-padi.create');
        Route::post('/store',[PengamatanPersemaianPadiController::class, 'store'])->name('pengamatan-persemaian-padi.store');
        Route::get('/show/{id}',[PengamatanPersemaianPadiController::class, 'show'])->name('pengamatan-persemaian-padi.show');
        Route::get('/edit/{id}',[PengamatanPersemaianPadiController::class, 'edit'])->name('pengamatan-persemaian-padi.edit');
        Route::post('/update/{id}',[PengamatanPersemaianPadiController::class, 'update'])->name('pengamatan-persemaian-padi.update');
        Route::delete('/destroy/{id}',[PengamatanPersemaianPadiController::class, 'destroy'])->name('pengamatan-persemaian-padi.destroy');
        Route::get('/verifikasi/{id}',[PengamatanPersemaianPadiController::class, 'verifikasi'])->name('pengamatan-persemaian-padi.verifikasi');
        Route::post('/verifikasi/{id}',[PengamatanPersemaianPadiController::class, 'prosesVerifikasi'])->name('pengamatan-persemaian-padi.proses-verifikasi');  
        Route::get('/kelompok-tani/{id_desa}',[PengamatanPersemaianPadiController::class, 'getKelompokTani'])->name('pengamatan-persemaian-padi.kelompok-tani');
    });  
    
    
    Route::prefix('keadaan-serangan-opt')->group(function () {

        Route::get('/', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'index'])->name('keadaan-serangan-opt.index');
        Route::get('/create/{id_data}', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'create'])->name('keadaan-serangan-opt.create');
        Route::post('/store', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'store'])->name('keadaan-serangan-opt.store');
        Route::get('/show/{id}', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'show'])->name('keadaan-serangan-opt.show');
        Route::get('/edit/{id}', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'edit'])->name('keadaan-serangan-opt.edit');
        Route::post('/update/{id}', [KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'update'])->name('keadaan-serangan-opt.update');
        Route::post('/proses-verifikasi/{id}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'prosesVerifikasi'])->name('keadaan-serangan-opt.proses-verifikasi');
        Route::get('/verifikasi/{id}/{status}',[KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController::class, 'verifikasi'])->name('keadaan-serangan-opt.verifikasi');
    });
    

    Route::prefix('keadaan-opt-pada-petak-pengamatan-tetap')->group(function () {

        Route::get('/', [KeadaanOptPadaPetakPengamatanTetapController::class, 'index'])->name('keadaan-opt-pada-petak-pengamatan-tetap.index');
        Route::get('/create/{id_data}', [KeadaanOptPadaPetakPengamatanTetapController::class, 'create'])->name('keadaan-opt-pada-petak-pengamatan-tetap.create');
        Route::post('/store', [KeadaanOptPadaPetakPengamatanTetapController::class, 'store'])->name('keadaan-opt-pada-petak-pengamatan-tetap.store');
        Route::get('/detail/{id}', [KeadaanOptPadaPetakPengamatanTetapController::class, 'detail'])->name('keadaan-opt-pada-petak-pengamatan-tetap.detail');
        Route::get('/edit/{id}', [KeadaanOptPadaPetakPengamatanTetapController::class, 'edit'])->name('keadaan-opt-pada-petak-pengamatan-tetap.edit');
        Route::put('/update/{id}', [KeadaanOptPadaPetakPengamatanTetapController::class, 'update'])->name('keadaan-opt-pada-petak-pengamatan-tetap.update');
        Route::post('/proses-verifikasi/{id}',[KeadaanOptPadaPetakPengamatanTetapController::class, 'prosesVerifikasi'])->name('keadaan-opt-pada-petak-pengamatan-tetap.proses-verifikasi');
    });
    

    Route::prefix('laporan-kerusakan-tanaman-akibat-banjir')->name('laporan-kerusakan-tanaman-akibat-banjir.')->group(function () {

        Route::get('/',[LaporanKerusakanTanamanAkibatBanjirController::class, 'index'])->name('index');
        Route::get('/create/{id_data}',[LaporanKerusakanTanamanAkibatBanjirController::class, 'create'])->name('create');
        Route::post('/store',[LaporanKerusakanTanamanAkibatBanjirController::class, 'store'])->name('store');
        Route::get('/detail/{id}',[LaporanKerusakanTanamanAkibatBanjirController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}',[LaporanKerusakanTanamanAkibatBanjirController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',[LaporanKerusakanTanamanAkibatBanjirController::class,'update'])->name('update');
        Route::get('/verifikasi/{id}/{status}',[LaporanKerusakanTanamanAkibatBanjirController::class, 'verifikasi'])->name('verifikasi');
    });


   Route::prefix('laporan-kerusakan-tanaman-akibat-kekeringan')->name('laporan-kerusakan-tanaman-akibat-kekeringan.')->group(function () {

        Route::get('/',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'index'])->name('index');
        Route::get('/create/{id_data}',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'create'])->name('create');
        Route::post('/store',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'store'])->name('store');
        Route::get('/detail/{id}',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'update'])->name('update');
        Route::get('/verifikasi/{id}/{status}',[LaporanKerusakanTanamanAkibatKekeringanController::class, 'verifikasi'])->name('verifikasi');
    });


    Route::prefix('informasi-perubahan-kategori-kekeringan')->name('informasi-perubahan-kategori-kekeringan.')->group(function () {

        Route::get('/', [InformasiPerubahanKategoriKekeringanController::class, 'index'])->name('index');
        Route::get('/create/{id_data}', [InformasiPerubahanKategoriKekeringanController::class, 'create'])->name('create');
        Route::post('/store', [InformasiPerubahanKategoriKekeringanController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [InformasiPerubahanKategoriKekeringanController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [InformasiPerubahanKategoriKekeringanController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [InformasiPerubahanKategoriKekeringanController::class, 'update'])->name('update');
    });
   

    Route::prefix('laporan-kerusakan-tanaman-akibat-fisiologis')->name('laporan-kerusakan-tanaman-akibat-fisiologis.')->group(function () {

        Route::get('/',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'index'])->name('index');
        Route::get('/create/{id_data}',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'create'])->name('create');
        Route::post('/store',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'store'])->name('store');
        Route::get('/detail/{id}',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'show'])->name('detail');
        Route::get('/edit/{id}',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'update'])->name('update');
        Route::get('/verifikasi/{id}/{status}',[LaporanKerusakanTanamanAkibatFisiologisController::class, 'verifikasi'])->name('verifikasi');
    });


    Route::prefix('laporan-kerusakan-tanaman-akibat-bencana-alam')->name('laporan-kerusakan-tanaman-akibat-bencana-alam.')->group(function () {

        Route::get('/',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'index'])->name('index');
        Route::get('/create/{id_data}',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'create'])->name('create');
        Route::post('/store',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'store'])->name('store');
        Route::get('/detail/{id}',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'show'])->name('detail');
        Route::get('/edit/{id}',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'update'])->name('update');
        Route::delete('/delete/{id}',[LaporanKerusakanTanamanAkibatBencanaAlamController::class, 'destroy'])->name('destroy');
    });

    
    Route::prefix('tangkapan-lampu-perangkap')->name('tangkapan-lampu-perangkap.')->group(function () {

        Route::get('/',[TangkapanLampuPerangkapController::class, 'index'])->name('index');
        Route::get('/create/{id_data}',[TangkapanLampuPerangkapController::class, 'create'])->name('create');
        Route::post('/store',[TangkapanLampuPerangkapController::class, 'store'])->name('store');
        Route::get('/detail/{id}',[TangkapanLampuPerangkapController::class, 'show'])->name('detail');
        Route::get('/edit/{id}',[TangkapanLampuPerangkapController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',[TangkapanLampuPerangkapController::class, 'update'])->name('update');
        Route::delete('/delete/{id}',[TangkapanLampuPerangkapController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('kumulatif-luas-tambah-tanam-padi')->group(function () {

        Route::get('/',[KumulatifLuasTambahTanamPadiController::class, 'index'])->name('kumulatif-luas-tambah-tanam-padi.index');
        Route::get('/create/{id_data}',[KumulatifLuasTambahTanamPadiController::class, 'create'])->name('kumulatif-luas-tambah-tanam-padi.create');
        Route::post('/store',[KumulatifLuasTambahTanamPadiController::class,'store'])->name('store');
        Route::get('/detail/{id}',[KumulatifLuasTambahTanamPadiController::class, 'show'])->name('kumulatif-luas-tambah-tanam-padi.show');
        Route::get('/{id}/edit',[KumulatifLuasTambahTanamPadiController::class, 'edit'])->name('kumulatif-luas-tambah-tanam-padi.edit');
        Route::put('/{id}',[KumulatifLuasTambahTanamPadiController::class, 'update'])->name('kumulatif-luas-tambah-tanam-padi.update');
        Route::delete('/{id}',[KumulatifLuasTambahTanamPadiController::class, 'destroy'])->name('kumulatif-luas-tambah-tanam-padi.destroy');
    });


        Route::get('/penggunaan-pestisida',[PenggunaanPestisidaController::class,'index'])->name('penggunaan-pestisida.index');
        Route::get('/penggunaan-pestisida/create/{id_data}',[PenggunaanPestisidaController::class,'create'])->name('penggunaan-pestisida.create');
        Route::post('/penggunaan-pestisida',[PenggunaanPestisidaController::class,'store'])->name('penggunaan-pestisida.store');
        Route::get('/penggunaan-pestisida/{id}',[PenggunaanPestisidaController::class,'show'])->name('penggunaan-pestisida.show');
        Route::get('/penggunaan-pestisida/{id}/edit',[PenggunaanPestisidaController::class,'edit'])->name('penggunaan-pestisida.edit');
        Route::put('/penggunaan-pestisida/{id}',[PenggunaanPestisidaController::class,'update'])->name('penggunaan-pestisida.update');
        Route::delete('/penggunaan-pestisida/{id}',[PenggunaanPestisidaController::class,'destroy'])->name('penggunaan-pestisida.destroy');


    Route::prefix('keadaan-curah-hujan')->group(function () {

        Route::get('/',[KeadaanCurahHujanController::class, 'index'])->name('keadaan-curah-hujan.index');
        Route::get('/create/{id_data}',[KeadaanCurahHujanController::class, 'create'])->name('keadaan-curah-hujan.create');
        Route::post('/store',[KeadaanCurahHujanController::class, 'store'])->name('keadaan-curah-hujan.store');
        Route::get('/{id}',[KeadaanCurahHujanController::class, 'show'])->name('keadaan-curah-hujan.show');
        Route::get('/{id}/edit',[KeadaanCurahHujanController::class, 'edit'])->name('keadaan-curah-hujan.edit');
        Route::put('/{id}',[KeadaanCurahHujanController::class, 'update'])->name('keadaan-curah-hujan.update');
        Route::delete('/{id}',[KeadaanCurahHujanController::class, 'destroy'])->name('keadaan-curah-hujan.destroy');
    });

    Route::prefix('pengamatan-penyebaran-dan-perkembangan-siput-murbey')->group(function () {

        Route::get('/',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'index'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index');
        Route::get('/create/{id_data}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'create'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.create');
        Route::post('/store',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'store'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.store');
        Route::get('/detail/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'detail'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.detail');
        Route::get('/edit/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'edit'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.edit');
        Route::put('/update/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'update'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.update');
        Route::delete('/destroy/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'destroy'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.destroy');
        Route::get('/verifikasi/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'verifikasi'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.verifikasi');
        Route::post('/verifikasi/{id}',[PengamatanPenyebaranDanPerkembanganSiputMurbeyController::class, 'prosesVerifikasi'])->name('pengamatan-penyebaran-dan-perkembangan-siput-murbey.proses-verifikasi');
    });


    Route::prefix('laporan-peringatan-dini')->group(function () {

        Route::get('/',[LaporanPeringatanDiniController::class, 'index'])->name('laporan-peringatan-dini.index');
        Route::get('/create/{id_data}',[LaporanPeringatanDiniController::class, 'create'])->name('laporan-peringatan-dini.create');
        Route::post('/',[LaporanPeringatanDiniController::class, 'store'])->name('laporan-peringatan-dini.store');
        Route::get('/detail/{id}',[LaporanPeringatanDiniController::class, 'detail'])->name('laporan-peringatan-dini.detail');
        Route::get('/edit/{id}',[LaporanPeringatanDiniController::class, 'edit'])->name('laporan-peringatan-dini.edit');
        Route::put('/{id}',[LaporanPeringatanDiniController::class, 'update'])->name('laporan-peringatan-dini.update');
        Route::delete('/{id}',[LaporanPeringatanDiniController::class, 'destroy'])->name('laporan-peringatan-dini.destroy');
        Route::get('/verifikasi/{id}',[LaporanPeringatanDiniController::class, 'verifikasi'])->name('laporan-peringatan-dini.verifikasi');
        Route::post('/verifikasi/{id}',[LaporanPeringatanDiniController::class, 'prosesVerifikasi'])->name('laporan-peringatan-dini.proses-verifikasi');
        Route::get('/get-opt/{idKomoditas}', [LaporanPeringatanDiniController::class, 'getOpt'])->name('laporan-peringatan-dini.get-opt');
    });
});

Route::get('/dashboard', [DashboardController::class,'index'])
    ->name('dashboard');



    //MANAJEMEN PENGGUNA
    Route::middleware(['ceklogin','cekrole:pengelola_data'])->group(function () {
        Route::resource('user-aplikasi', UserAplikasiController::class);
        Route::get('/get-kecamatan/{idKabupaten}', [UserAplikasiController::class, 'getKecamatan'])->name('user-aplikasi.get-kecamatan');

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
