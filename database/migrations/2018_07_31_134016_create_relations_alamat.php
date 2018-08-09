<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsAlamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('kecamatan', function(Blueprint $table)
        // {
        //     $table->foreign('id_kab')->references('id_kab')->on('kabupaten')->onDelete('cascade');
        // });

        // Schema::table('kabupaten', function(Blueprint $table)
        // {
        //     $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('cascade');
        //     $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
        // });

        // Schema::table('kelurahan', function(Blueprint $table)
        // {
        //     $table->foreign('id_kec')->references('id_kec')->on('kecamatan')->onDelete('cascade');
        //     $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('kecamatan', function(Blueprint $table)
        // {
        //     $table->dropForeign('kecamatan_id_kab_foreign');
        // });

        // Schema::table('kabupaten', function(Blueprint $table)
        // {
        //     $table->dropForeign('kabupaten_id_prov_foreign');
        //     $table->dropForeign('kabupaten_id_jenis_foreign');
        // });

        // Schema::table('kelurahan', function(Blueprint $table)
        // {
        //     $table->dropForeign('kelurahan_id_kec_foreign');
        //     $table->dropForeign('kelurahan_id_jenis_foreign');
        // });
    }
}
