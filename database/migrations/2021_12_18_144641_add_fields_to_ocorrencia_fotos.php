<?php

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOcorrenciaFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocorrencia_fotos', function (Blueprint $table) {
            $table->enum('pata', [
                'POSTERIOR DIREITA',
                'POSTERIOR ESQUERDA',
                'ANTERIOR ESQUERDA',
                'ANTERIOR DIREITA',
            ]);
            DB::statement("ALTER TABLE `ocorrencia_fotos` CHANGE `type` `type` ENUM('VISTA LATERAL', 'VISTA PALMAR', 'VISTA FRONTAL') ");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocorrencia_fotos', function (Blueprint $table) {
            //
        });
    }
}
