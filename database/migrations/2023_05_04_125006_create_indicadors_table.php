<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->integer('variable_id');
            $table->integer('numero_indicador');
            $table->string('descripcion');
            $table->enum('tipo',['RMA','RC']);
            $table->integer('peso');
            $table->enum('tipo_evaluacion',['SIMPLE','COMPUESTO']);
            $table->integer('valor');
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('indicadors');
    }
}
