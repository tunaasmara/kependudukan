<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_dusun',36);
            $table->string('nama_rw');
            $table->string('kepala_rw');
            $table->softDeletes();
        });

        Schema::table('rws', function(Blueprint $table)
        {
            $table->foreign('id_dusun')->references('id')->on('dusuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rws', function(Blueprint $table)
        {
            $table->dropForeign('rws_id_dusun_foreign');
        });

        Schema::dropIfExists('rws');
    }
}
