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
            $table->unsignedBigInteger('boleta_id');
            $table->foreign('boleta_id')->references('id')->on("boletas");
            $table->unsignedBigInteger('domicilio_id');
            $table->foreign('domicilio_id')->references('id')->on("domicilios");
            $table->String("mes", 10);
            $table->String("anno", 4);
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
        Schema::dropIfExists('gastos');
    }
}
