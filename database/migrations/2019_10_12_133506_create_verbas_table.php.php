<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('_id');
            $table->integer('idDeputado');
            $table->string('dataReferencia');
            $table->string('valorReembolsado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verbas');
    }
}
