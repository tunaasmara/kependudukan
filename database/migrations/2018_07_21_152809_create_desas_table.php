<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_kecamatan',36);
            $table->string('nama_desa');
            $table->string('kepala_desa');
            $table->softDeletes();
        });

        Schema::table('desas', function(Blueprint $table)
        {
            $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desas', function(Blueprint $table)
        {
            $table->dropForeign('desas_id_kecamatan_foreign');
        });

        Schema::dropIfExists('desas');
    }
}
