<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid',36);
            $table->unsignedInteger('id_rw');
            $table->string('nama_rt');
            $table->string('kepala_rt');
            $table->softDeletes();
        });

        Schema::table('rts', function(Blueprint $table)
        {
            $table->foreign('id_rw')->references('id')->on('rws')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rts', function(Blueprint $table)
        {
            $table->dropForeign('rts_id_rw_foreign');
        });

        Schema::dropIfExists('rts');
    }
}
