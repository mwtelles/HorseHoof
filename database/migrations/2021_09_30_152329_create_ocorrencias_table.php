<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('anotacao')->nullable();
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('cavalo_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('cavalo_id')->references('id')->on('cavalos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias');
    }
}
