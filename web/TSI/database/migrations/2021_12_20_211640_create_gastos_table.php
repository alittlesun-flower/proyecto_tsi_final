<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on("servicios");
            $table->unsignedBigInteger('reparacion_id');
            $table->foreign('reparacion_id')->references('id')->on("reparaciones");
            $table->smallInteger('numero_domicilio');
            $table->foreign('numero_domicilio')->references('numero')->on("domicilios");
            $table->String("mes", 10);
            $table->String("anno", 4);
            $table->timestamps();
        });
    }
    //register y login, operaciones (pueda generar boleta), y al final las validaciones/integridad referencial
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
