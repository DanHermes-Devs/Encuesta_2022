<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->text('token')->nullable();
            $table->text('nombre')->nullable();
            $table->text('logo')->nullable();
            $table->text('imagen_fondo')->nullable();
            $table->text('colores_principales')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('activo')->nullable();

            // Campos para dorwpdowns
            $table->text('tipo_puesto')->nullable();
            $table->text('area')->nullable();
            $table->text('tipo_contratacion')->nullable();
            $table->text('jornada_trabajo')->nullable();
            $table->text('rotacion_turnos')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
