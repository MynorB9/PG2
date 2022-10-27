<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMedicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_mediciones', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->unsignedBigInteger('id_medicion');
            $table->foreign('id_medicion')->references('id')->on('mediciones');
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
        Schema::dropIfExists('detalle_mediciones');
    }
}
