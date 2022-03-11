<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCavalosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cavalos', function (Blueprint $table) {
            $table->id();
            $table->string('apelido');
            $table->enum('sexo',['M','F']);
            $table->integer('idade');
            $table->unsignedBigInteger('cavalo_raca_id');
            $table->timestamps();

            $table->foreign('cavalo_raca_id')->references('id')->on('cavalo_racas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cavalos');
    }
}
