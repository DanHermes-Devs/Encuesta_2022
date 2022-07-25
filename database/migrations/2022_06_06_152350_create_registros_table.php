<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('email')->unique()->nullable();
            $table->text('fecha_inicio')->nullable();
            $table->text('token');
            $table->text('sexo')->nullable();
            $table->text('estado_civil')->nullable();
            $table->text('edad')->nullable();
            $table->text('antiguedad')->nullable();
            $table->text('estudios')->nullable();
            $table->text('tipo_puesto')->nullable();
            $table->text('area')->nullable();
            $table->text('tipo_contratacion')->nullable();
            $table->text('jornada_trabajo')->nullable();
            $table->text('rotacion_turnos')->nullable();
            $table->text('rotacion_personal')->nullable();
            $table->text('experiencia_laboral')->nullable();
            $table->integer('item_1')->nullable();
            $table->integer('item_2')->nullable();
            $table->integer('item_3')->nullable();
            $table->integer('item_4')->nullable();
            $table->integer('item_5')->nullable();
            $table->integer('item_6')->nullable();
            $table->integer('item_7')->nullable();
            $table->integer('item_8')->nullable();
            $table->integer('item_9')->nullable();
            $table->integer('item_10')->nullable();
            $table->integer('item_11')->nullable();
            $table->integer('item_12')->nullable();
            $table->integer('item_13')->nullable();
            $table->integer('item_14')->nullable();
            $table->integer('item_15')->nullable();
            $table->integer('item_16')->nullable();
            $table->integer('item_17')->nullable();
            $table->integer('item_18')->nullable();
            $table->integer('item_19')->nullable();
            $table->integer('item_20')->nullable();
            $table->integer('item_21')->nullable();
            $table->integer('item_22')->nullable();
            $table->integer('item_23')->nullable();
            $table->integer('item_24')->nullable();
            $table->integer('item_25')->nullable();
            $table->integer('item_26')->nullable();
            $table->integer('item_27')->nullable();
            $table->integer('item_28')->nullable();
            $table->integer('item_29')->nullable();
            $table->integer('item_30')->nullable();
            $table->integer('item_31')->nullable();
            $table->integer('item_32')->nullable();
            $table->integer('item_33')->nullable();
            $table->integer('item_34')->nullable();
            $table->integer('item_35')->nullable();
            $table->integer('item_36')->nullable();
            $table->integer('item_37')->nullable();
            $table->integer('item_38')->nullable();
            $table->integer('item_39')->nullable();
            $table->integer('item_40')->nullable();
            $table->integer('item_41')->nullable();
            $table->integer('item_42')->nullable();
            $table->integer('item_43')->nullable();
            $table->integer('item_44')->nullable();
            $table->integer('item_45')->nullable();
            $table->integer('item_46')->nullable();
            $table->integer('item_47')->nullable();
            $table->integer('item_48')->nullable();
            $table->integer('item_49')->nullable();
            $table->integer('item_50')->nullable();
            $table->integer('item_51')->nullable();
            $table->integer('item_52')->nullable();
            $table->integer('item_53')->nullable();
            $table->integer('item_54')->nullable();
            $table->integer('item_55')->nullable();
            $table->integer('item_56')->nullable();
            $table->integer('item_57')->nullable();
            $table->integer('item_58')->nullable();
            $table->integer('item_59')->nullable();
            $table->integer('item_60')->nullable();
            $table->integer('item_61')->nullable();
            $table->integer('item_62')->nullable();
            $table->integer('item_63')->nullable();
            $table->integer('item_64')->nullable();
            $table->integer('item_65')->default(0);
            $table->integer('item_66')->default(0);
            $table->integer('item_67')->default(0);
            $table->integer('item_68')->default(0);
            $table->integer('item_69')->default(0);
            $table->integer('item_70')->default(0);
            $table->integer('item_71')->default(0);
            $table->integer('item_72')->default(0);
            $table->text('item_sc')->nullable();
            $table->text('item_jefe')->nullable();
            $table->text('ets_1')->nullable();
            $table->text('ets_2')->nullable();
            $table->text('ets_3')->nullable();
            $table->text('ets_4')->nullable();
            $table->text('ets_5')->nullable();
            $table->text('ets_6')->nullable();
            $table->text('ets_7')->nullable();
            $table->text('ets_8')->nullable();
            $table->text('ets_9')->nullable();
            $table->text('ets_10')->nullable();
            $table->text('ets_11')->nullable();
            $table->text('ets_12')->nullable();
            $table->text('ets_13')->nullable();
            $table->text('ets_14')->nullable();
            $table->text('ets_15')->nullable();
            $table->text('ets_16')->nullable();
            $table->text('ets_17')->nullable();
            $table->text('ets_18')->nullable();
            $table->text('ets_19')->nullable();
            $table->text('ets_20')->nullable();
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
        Schema::dropIfExists('registros');
    }
}
