<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaKksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_kks', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_kk',36);
            $table->string('id_penduduk',36);
            $table->string('no_paspor',32)->nullable();
            $table->string('status');
            $table->softDeletes();
        });

        Schema::table('anggota_kks', function(Blueprint $table)
        {
            $table->foreign('id_kk')->references('id')->on('kks')->onDelete('cascade');
            $table->foreign('id_penduduk')->references('id')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota_kks', function(Blueprint $table)
        {
            $table->dropForeign('anggota_kks_id_kk_foreign');
            $table->dropForeign('anggota_kks_id_penduduk_foreign');
        });

        Schema::dropIfExists('anggota_kks');
    }
}
