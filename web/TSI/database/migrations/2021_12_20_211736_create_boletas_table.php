<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("monto");
            $table->unsignedInteger("monto_domicilio");
            $table->unsignedInteger("monto_iluminacion");
            $table->unsignedInteger("monto_regadio");
            $table->String("correo", 100);
            $table->String("mes", 10);
            $table->String("anno", 4);
            // $table->unsignedBigInteger('gasto_id');
            // $table->foreign('gasto_id')->references('id')->on("gastos");
            $table->smallInteger('numero');
            $table->foreign('numero')->references('numero')->on("domicilios");
            //$table->unsignedBigInteger('servicio_id');
            //$table->foreign('servicio_id')->references('id')->on("servicios");
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
        Schema::dropIfExists('boletas');
    }
}
