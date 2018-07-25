<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('nik',20);
            $table->string('nama',50);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',1);
            $table->string('agama',10);
            $table->string('pekerjaan',30);
            $table->string('kewarganegaraan');
            $table->string('status_perkawinan');
            $table->string('pendidikan');
            $table->string('nama_ibu');
            $table->string('gol_darah',2);
            $table->string('alamat');
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('dusun');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('nomer_telepon');
            $table->string('status_ktp');
            $table->string('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
}
