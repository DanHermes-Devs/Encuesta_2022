<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreignId('id_registro')->references('id')->on('registros')->onDelete('cascade');
            $table->text('c_final')->nullable();
            $table->text('c_cat_1')->nullable();
            $table->text('c_cat_2')->nullable();
            $table->text('c_cat_3')->nullable();
            $table->text('c_cat_4')->nullable();
            $table->text('c_cat_5')->nullable();
            $table->text('c_cat_6')->nullable();
            $table->text('c_cat_7')->nullable();
            $table->text('c_dominio_1')->nullable();
            $table->text('c_dominio_2')->nullable();
            $table->text('c_dominio_3')->nullable();
            $table->text('c_dominio_4')->nullable();
            $table->text('c_dominio_5')->nullable();
            $table->text('c_dominio_6')->nullable();
            $table->text('c_dominio_7')->nullable();
            $table->text('c_dominio_8')->nullable();
            $table->text('c_dominio_9')->nullable();
            $table->text('c_dominio_10')->nullable();
            $table->text('c_dimension_1')->nullable();
            $table->text('c_dimension_2')->nullable();
            $table->text('c_dimension_3')->nullable();
            $table->text('c_dimension_4')->nullable();
            $table->text('c_dimension_5')->nullable();
            $table->text('c_dimension_6')->nullable();
            $table->text('c_dimension_7')->nullable();
            $table->text('c_dimension_8')->nullable();
            $table->text('c_dimension_9')->nullable();
            $table->text('c_dimension_10')->nullable();
            $table->text('c_dimension_11')->nullable();
            $table->text('c_dimension_12')->nullable();
            $table->text('c_dimension_13')->nullable();
            $table->text('c_dimension_14')->nullable();
            $table->text('c_dimension_15')->nullable();
            $table->text('c_dimension_16')->nullable();
            $table->text('c_dimension_17')->nullable();
            $table->text('c_dimension_18')->nullable();
            $table->text('c_dimension_19')->nullable();
            $table->text('c_dimension_20')->nullable();
            $table->text('c_dimension_21')->nullable();
            $table->text('c_dimension_22')->nullable();
            $table->text('c_dimension_23')->nullable();
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
        Schema::dropIfExists('calificaciones');
    }
}
