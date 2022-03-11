<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_relatorios', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->timestamps();
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencia_relatorios');
    }
}
