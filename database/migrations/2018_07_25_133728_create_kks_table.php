<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kks', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('nomor_kk',20);
            $table->string('alamat');
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('kode_pos',5);
            $table->string('provinsi');
            $table->string('tanggal_dikeluarkan');
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
        Schema::dropIfExists('kks');
    }
}
