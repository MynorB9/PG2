<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEstadoToTableMediciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mediciones', function (Blueprint $table) {
            $table->enum('estado',[
                'Pendiente',
                'Medido',
                'Cotizado',
                'Confirmado',
                'Pendiente Instalacion',
                'Instalado Pendiente Pago',
                'Cancelado'
            ])->default('Pendiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mediciones', function (Blueprint $table) {

        });
    }
}
