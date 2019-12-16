<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('type_id');
            $table->string('merek')->nullable();
            $table->string('jenis')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('harga_kendaraan')->nullable();
            $table->string('harga_total_perlengkapan_non_standar')->nullable();
            $table->string('rincian')->nullable();
            $table->string('paket')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('created_place')->nullable();
            $table->string('nama_agen')->nullable();
            $table->string('institusi')->nullable();
            $table->string('total_peserta')->nullable();
            $table->string('premi')->nullable();
            $table->string('biaya_polis')->nullable();
            $table->string('biaya_materai')->nullable();
            $table->string('berkas')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
