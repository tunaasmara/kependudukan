<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_kabupaten',36);
            $table->string('kode_pos',5);
            $table->string('nama_kecamatan');
            $table->softDeletes();
        });

        Schema::table('kecamatans', function(Blueprint $table)
        {
            $table->foreign('id_kabupaten')->references('id')->on('kabupatens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatans', function(Blueprint $table)
        {
            $table->dropForeign('kecamatans_id_kabupaten_foreign');
        });

        Schema::dropIfExists('kecamatans');
    }
}
