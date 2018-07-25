<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyaratPermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarat_permohonans', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('id_permohonan',36);
            $table->string('id_syarat_surat',36);
            $table->string('terpenuhi');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syarat_permohonans');
    }
}
