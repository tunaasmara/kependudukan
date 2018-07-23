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
            $table->string('id_desa',36);
            $table->string('nama_dusun');
            $table->string('kepala_dusun');
            $table->softDeletes();
        });

        Schema::table('dusuns', function(Blueprint $table)
        {
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
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
            $table->dropForeign('dusuns_id_desa_foreign');
        });

        Schema::dropIfExists('dusuns');
    }
}
