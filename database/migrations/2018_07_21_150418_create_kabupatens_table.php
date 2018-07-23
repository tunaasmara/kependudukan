<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_provinsi',36);
            $table->string('nama_kabupaten');
            $table->softDeletes();
        });

        Schema::table('kabupatens', function(Blueprint $table)
        {
            $table->foreign('id_provinsi')->references('id')->on('provinsis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kabupatens', function(Blueprint $table)
        {
            $table->dropForeign('kabupatens_id_provinsi_foreign');
        });

        Schema::dropIfExists('kabupatens');
    }
}
