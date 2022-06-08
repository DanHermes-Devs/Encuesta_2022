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
            // Registrar correo electronico
            $table->string('email')->unique()->nullable();
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
            $table->text('experiencia_laboral')->nullable();
            $table->text('item_1')->nullable();
            $table->text('item_2')->nullable();
            $table->text('item_3')->nullable();
            $table->text('item_4')->nullable();
            $table->text('item_5')->nullable();
            $table->text('item_6')->nullable();
            $table->text('item_7')->nullable();
            $table->text('item_8')->nullable();
            $table->text('item_9')->nullable();
            $table->text('item_10')->nullable();
            $table->text('item_11')->nullable();
            $table->text('item_12')->nullable();
            $table->text('item_13')->nullable();
            $table->text('item_14')->nullable();
            $table->text('item_15')->nullable();
            $table->text('item_16')->nullable();
            $table->text('item_17')->nullable();
            $table->text('item_18')->nullable();
            $table->text('item_19')->nullable();
            $table->text('item_20')->nullable();
            $table->text('item_21')->nullable();
            $table->text('item_22')->nullable();
            $table->text('item_23')->nullable();
            $table->text('item_24')->nullable();
            $table->text('item_25')->nullable();
            $table->text('item_26')->nullable();
            $table->text('item_27')->nullable();
            $table->text('item_28')->nullable();
            $table->text('item_29')->nullable();
            $table->text('item_30')->nullable();
            $table->text('item_31')->nullable();
            $table->text('item_32')->nullable();
            $table->text('item_33')->nullable();
            $table->text('item_34')->nullable();
            $table->text('item_35')->nullable();
            $table->text('item_36')->nullable();
            $table->text('item_37')->nullable();
            $table->text('item_38')->nullable();
            $table->text('item_39')->nullable();
            $table->text('item_40')->nullable();
            $table->text('item_41')->nullable();
            $table->text('item_42')->nullable();
            $table->text('item_43')->nullable();
            $table->text('item_44')->nullable();
            $table->text('item_45')->nullable();
            $table->text('item_46')->nullable();
            $table->text('item_47')->nullable();
            $table->text('item_48')->nullable();
            $table->text('item_49')->nullable();
            $table->text('item_50')->nullable();
            $table->text('item_51')->nullable();
            $table->text('item_52')->nullable();
            $table->text('item_53')->nullable();
            $table->text('item_54')->nullable();
            $table->text('item_55')->nullable();
            $table->text('item_56')->nullable();
            $table->text('item_57')->nullable();
            $table->text('item_58')->nullable();
            $table->text('item_59')->nullable();
            $table->text('item_60')->nullable();
            $table->text('item_61')->nullable();
            $table->text('item_62')->nullable();
            $table->text('item_63')->nullable();
            $table->text('item_64')->nullable();
            $table->text('item_65')->nullable();
            $table->text('item_66')->nullable();
            $table->text('item_67')->nullable();
            $table->text('item_68')->nullable();
            $table->text('item_69')->nullable();
            $table->text('item_70')->nullable();
            $table->text('item_71')->nullable();
            $table->text('item_72')->nullable();
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
