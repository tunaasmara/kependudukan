<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDusunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dusuns', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->char('id_kel',10);
            $table->string('nama_dusun');
            $table->string('kepala_dusun');
            $table->softDeletes();
        });

        Schema::table('dusuns', function(Blueprint $table)
        {
            $table->foreign('id_kel')->references('id_kel')->on('kelurahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dusuns', function(Blueprint $table)
        {
            $table->dropForeign('dusuns_id_kel_foreign');
        });

        Schema::dropIfExists('dusuns');
    }
}
