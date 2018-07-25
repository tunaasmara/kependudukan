<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiPermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function(Blueprint $table)
        {
            $table->foreign('id_tipe_surat')->references('id')->on('tipe_surats')->onDelete('cascade');
            $table->foreign('id_penduduk')->references('id')->on('penduduks')->onDelete('cascade');
        });

        Schema::table('syarat_permohonans', function(Blueprint $table)
        {
            $table->foreign('id_permohonan')->references('id')->on('permohonans')->onDelete('cascade');
            $table->foreign('id_syarat_surat')->references('id')->on('syarat_surats')->onDelete('cascade');
        });

        Schema::table('syarat_surats', function(Blueprint $table)
        {
            $table->foreign('id_tipe_surat')->references('id')->on('tipe_surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonans', function(Blueprint $table)
        {
            $table->dropForeign('permohonans_id_tipe_surat_foreign');
            $table->dropForeign('permohonans_id_penduduk_foreign');
        });

        Schema::table('syarat_permohonans', function(Blueprint $table)
        {
            $table->dropForeign('syarat_permohonans_id_permohonan_foreign');
            $table->dropForeign('syarat_permohonans_id_syarat_surat_foreign');
        });

        Schema::table('syarat_surats', function(Blueprint $table)
        {
            $table->dropForeign('syarat_surats_id_tipe_surat_foreign');
        });
    }
}
