<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToVeterinariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('veterinarios', function (Blueprint $table) {
            $table->string('tempo_no_mercado')->nullable();
            $table->string('especializacao')->nullable();
            $table->integer('is_estudante')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('veterinarios', function (Blueprint $table) {
            $table->dropColumn('tempo_no_mercado');
            $table->dropColumn('especializacao');
            $table->dropColumn('is_estudante');
        });
    }
}
