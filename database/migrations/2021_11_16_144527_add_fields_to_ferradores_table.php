<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToFerradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ferradores', function (Blueprint $table) {
            $table->string('associacao')->nullable()->default(null);
            $table->string('qualificacao')->nullable();
            $table->boolean('is_membro_afb')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ferradores', function (Blueprint $table) {
            $table->dropColumn('associacao');
            $table->dropColumn('qualificacao');
            $table->dropColumn('is_membro_afb');

        });
    }
}
