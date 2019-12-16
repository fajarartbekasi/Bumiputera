<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Default route web
 */
Route::get('/', function () {
    return view('welcome');
});

route::get('tentang-kami','About\AboutController@index')->name('tentang-kami.index');

/**
 * kasie teknik
 * types dan premis
 * data permintaan penutupan
 * update status dari waitting list
 * menjadi "pengajuan polis"
 * report per tanggal
 */
Route::group(['prefix' => 'kasie'], function(){
   Route::group(['prefix' => 'ambil/formulir/baru'], function(){
       /**
        * form tambah type dan premi baru motor koe
        */
        route::get('motor-koe', 'Kasie\Types\MotorkoeController@create')->name('kasie.ambil.formulir.baru.motor-koe');
        /**
        * form tambah type dan premi baru mobil koe
        */
        route::get('mobil-koe', 'Kasie\Types\MobilController@create')->name('kasie.ambil.formulir.baru.mobil-koe');
        /**
        * form tambah type dan premi baru mobil koe
        */
        route::get('siswa-mahasiswa-koe', 'Kasie\Types\SiswakoeController@create')->name('kasie.ambil.formulir.baru.siswa-mahasiswa-koe');
   });
   /**
    * simpan data type dan premi baru ke dalam database
    */

    route::post('simpan/data/type-premi/baru', 'Kasie\Types\ValidasiController@store')->name('kasie.simpan.data.type-premi.baru');
    /**
     * ambil data dalam bentuk json untuk disuplai kedalam type table
     * filter data by motor koe
     */

    route::get('ambil-data/json/types/motor-koe', 'Kasie\Types\MotorkoeController@dataTableMotorKoe')->name('kasie.ambil-data.json.types.motor-koe');

    /**
     * ambil data dalam bentuk json untuk disuplai kedalam type table
     * filter data by motor koe
     */

     route::get('ambil-data/json/types/mobil-koe', 'Kasie\Types\MobilController@dataTableMobilKoe')->name('kasie.ambil-data.json.types.mobil-koe');
    /**
     * ambil data dalam bentuk json untuk disuplai kedalam type table
     * filter data by motor koe
     */
    route::get('ambil-data/json/types/siswa-mahasiswa-koe','Kasie\Types\SiswakoeController@dataTableSiswaMahasiwaKoe')->name('kasie.ambil-data.json.types.siswa-mahasiswa-koe');
     /**
     * tampung semua data json kedalam datatables
     */
    Route::group(['prefix' => 'cek-data'], function(){

        /**
         * filter data by name on table types where Motor KOE
         */
        route::get('kategori/motor-koe', 'Kasie\Types\MotorkoeController@index')->name('kasie.cek-data.kategori.motor-koe');
        /**
         * filter data by name on table types where Mobil KOE
         */
        route::get('kategori/mobil-koe','Kasie\Types\MobilController@index')->name('kasie.cek-data.kategori.mobil-koe');
        /**
         * filter data by name on table types where Mobil KOE
         */
        route::get('kategori/siswa-mahasiwa-koe','Kasie\Types\SiswakoeController@index')->name('kasie.cek-data.kategori.siswa-mahasiswa-koe');
    });

    /**
     * ambil formulir edit data types
     */
    route::get('formulir/edit-data/{type}', 'Kasie\Types\ValidasiController@edit')->name('kasie.formulir.edit-data');

    /**
     * simpan perubahan type dan premi kedalam database
     */
    route::put('update/data/{type}', 'Kasie\Types\ValidasiController@update')->name('kasie.update.data');

    /**
     * hapus data type dan premi
     */
    route::delete('hapus/type/premi/{type}', 'Kasie\Types\ValidasiController@destroy')->name('kasie.hapus.type.premi');

    /**
     * buat json pengajuan dengan status waitting list
     * pengajuan baru dari customer dengan status waitting list
     */
    route::get('ambil-data/json/pengajuan/penutupan/asuransi', 'Kasie\Data\Permintaan\PermintaanController@jsonStatusWaittingList')->name('kasie.ambil-data.json.pengajuan.penutupan.asuransi');
    Route::group(['prefix' => 'cek'], function(){
         /**
          * tampung json pengajuan dengan status waitting list
          */
          route::get('penutupan/asuransi/status/waitting-list', 'Kasie\Data\Permintaan\PermintaanController@index')->name('kasie.cek.penutupan.asuransi.status.waitting-list');
          /**
           * detail informasi pengajuan baru
           */
          route::get('detail/informasi/penutupan/status/waitting-list/{pengajuan}', 'Kasie\Data\Permintaan\PermintaanController@show')->name('kasie.cek.detail.informasi.penutupan.status.waitting-list');
    });
    /**
     * update status pengajuan customer dari waitting list
     * menjadi "pengajuan polis"
     * yang akan masuk ke staff teknik
     */
    route::put('perbaharui/status/pengajuan/penutupan/asuransi/{pengajuan}', 'Kasie\Data\Permintaan\PermintaanController@update')->name('kasie.perbaharui.status.pengajuan.penutupan.asuransi');
    /**
     * report pertanggal
     */
    route::get('cari-data/pertanggal', 'Kasie\Report\ReportController@periode')->name('kasie.cari-data.pertanggal');

    Route::group(['prefix' => 'invitations'], function(){
        /**
         * get json customer
         */
        route::get('ambil-data/json-customers', 'Kasie\Invitation\CustomerController@jsonCustomer')->name('kasie.invitations.ambil-data.json-customers');
        /**
         * tampung json customers
         */
        route::get('customers', 'Kasie\Invitation\CustomerController@index')->name('kasie.invitations.customers');

        /**
         * json data petugas
         */
        route::get('ambil-data/json-petugas', 'Kasie\Invitation\PetugasController@jsonPetugas')->name('kasie.invitations.ambil-data.json-petugas');
        /**
         * cek data petugas
         */
        route::get('petugas', 'Kasie\Invitation\PetugasController@index')->name('kasie.invitations.petugas');
    });
});

/**
 * customers
 * lihat jenis asuransi
 * buat pengajuan asuransi
 * status pengajuan baru (waitting list)
 * upload bukti pembayaran
 */
Route::group(['prefix' => 'customer'], function(){
    /**
     * customer melihat jenis asuransi
     */
    route::get('lihat/jenis-asuransi', 'Customers\JenisasuransiController@index')->name('customer.lihat.jenis-asuransi');
    /**
     * tampilkan details informasi pengajuan
     */
    route::get('details/informasi/jenis-asuransi/{premi}', 'Customers\JenisasuransiController@create')->name('customer.details.informasi.jenis-asuransi');
    /**
     * kirim data pengajuan penutupan asuransi customer
     */
    route::post('ajukan/permintaan/penutupan/asuransi/{type}', 'Customers\JenisasuransiController@store')->name('customer.ajukan.permintaan.penutupan.asuransi');
    /**
     * ambil formulir pembayaran
     */
    route::get('ambil/formulir/bukti-pembayaran/{pengajuan}', 'Customers\PembayaranController@create')->name('customer.ambil.formulir.bukti-pembayaran');

    /**
     * kirim bukti pembayaran
     */
    route::put('kirim/bukti-pembayaran/{pengajuan}', 'Customers\PembayaranController@update')->name('customer.kirim.bukti-pembayaran');

});

/**
 * staff teknik
 * cek data pengajuan polis dari kasie teknik
 * update status pengajuan polis menjadi
 * verifikasi pembayaran
 * cetak polis
 * cetak data pengajuan pertanggal
 */

Route::group(['prefix' => 'staff'], function(){

    /**
     * buat json data pengajuan polis
     */
    route::get('ambil-data/pengajuan-polis', 'Staff\Pengajuan\PengajuanpolisController@jsonPengajuanPolis')->name('staff.ambil-data.pengajuan-polis');
    Route::group(['prefix' => 'cek'], function(){
        /**
         * cek data pengajuan polis
         *
         */
        route::get('data/pengajuan/polis', 'Staff\Pengajuan\PengajuanpolisController@index')->name('staff.cek.data.pengajuan.polis');
        /**
         * cek details pengajuan polis
         */
        route::get('detail/pengajuan/polis/{pengajuan}', 'Staff\Pengajuan\PengajuanpolisController@show')->name('staff.cek.detail.pengajuan.polis');
    });
    /**
     * update status "pengajuan polis" -> to "verifikasi pembayaran"
     */
    route::put('approve/pengajuan-polis/ubah-status/verifikasi-pembayaran/{pengajuan}', 'Staff\Pengajuan\PengajuanpolisController@update')->name('staff.approve.pengajuan-polis.ubah-status.verifikasi-pembayaran');
    /**
     * buat json data polis yang akan dicetak
     * lalu kirim json kedalam dataTable
     */
     route::get('ambil-data/json/cetak-polis', 'Staff\Polis\PolisController@jsonCetakPolis')->name('staff.ambil-data.json.cetak-polis');
    /**
     * lihat data polis yang akan di cetak
     */
    route::get('cek/data/polis/status/verifikasi-pembayaran', 'Staff\Polis\PolisController@index')->name('staff.cek.data.polis.status.verifikasi-pembayaran');
    /**
     * cetak polis
     */
    route::get('cetak/polis/{poli}', 'Staff\Polis\PolisController@cetakPolis')->name('staff.cetak.polis');
    /**
     * report pertanggal
     */
    route::get('cari-data/pertanggal', 'Staff\Report\ReportController@periode')->name('staff.cari-data.pertanggal');

});

/**
 * kasir
 * cek data pembayaran customer
 * dengan status verifikasi pembayaran
 * cetak kwitansi
 * export data to excel
 * cetak data pengajuan pertanggal
 */
Route::group(['prefix' => 'kasir'], function(){

    /**
     * buat data json pembayaran customer
     */
    route::get('ambil-data/json/pembayaran', 'Kasir\PembayaranController@jsonPembayaran')->name('kasir.ambil-data.json.pembayaran');
    /**
     * lihat data pembayaran
     */
    route::get('cek/data/pembayaran', 'Kasir\PembayaranController@index')->name('kasir.cek.data.pembayaran');

    /**
     * cek details pembayaran
     */
    route::get('cek/details/informasi/pembayaran/pengajuan/{payment}', 'Kasir\PembayaranController@show')->name('kasir.cek.details.informasi.pembayaran.pengajuan');

    /**
     * cetak kwitansi
     */
    route::get('cetak/kwitansi/{payment}', 'Kasir\PembayaranController@cetakKwitansi')->name('kasir.cetak.kwitansi');
    /**
     * export data
     */
    route::get('export/data/pembayaran', 'Kasir\PembayaranController@export')->name('kasir.export.data.pembayaran');
    /**
     * report pertanggal
     */
    route::get('cari-data/pertanggal', 'Kasir\Report\ReportController@periode')->name('kasir.cari-data.pertanggal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
