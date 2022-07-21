<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegistrosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registros')->delete();
        
        \DB::table('registros')->insert(array (
            0 => 
            array (
                'id' => 9,
                'id_empresa' => 2,
                'email' => 'admin@a.com',
                'fecha_inicio' => '2022-07-19 23:44:38',
                'token' => 'qba13329-vvoy-g9a8-cpox-633po64jwr5',
                'sexo' => 'Masculino',
                'estado_civil' => 'Divorciado',
                'edad' => '26-30 años',
                'antiguedad' => '21-25 años',
                'estudios' => 'Doctorado',
                'tipo_puesto' => 'Incidunt fuga Volu',
                'area' => 'Accusamus cumque nos',
                'tipo_contratacion' => 'Laboris at anim sit',
                'jornada_trabajo' => 'Dignissimos fugiat',
                'rotacion_turnos' => NULL,
                'experiencia_laboral' => 'Menos de 1 año',
                'item_1' => 1,
                'item_2' => 3,
                'item_3' => 1,
                'item_4' => 1,
                'item_5' => 2,
                'item_6' => 4,
                'item_7' => 2,
                'item_8' => 0,
                'item_9' => 0,
                'item_10' => 3,
                'item_11' => 2,
                'item_12' => 0,
                'item_13' => 2,
                'item_14' => 1,
                'item_15' => 1,
                'item_16' => 1,
                'item_17' => 4,
                'item_18' => 2,
                'item_19' => 0,
                'item_20' => 0,
                'item_21' => 4,
                'item_22' => 4,
                'item_23' => 0,
                'item_24' => 2,
                'item_25' => 4,
                'item_26' => 4,
                'item_27' => 2,
                'item_28' => 4,
                'item_29' => 4,
                'item_30' => 1,
                'item_31' => 4,
                'item_32' => 4,
                'item_33' => 0,
                'item_34' => 0,
                'item_35' => 3,
                'item_36' => 4,
                'item_37' => 2,
                'item_38' => 1,
                'item_39' => 0,
                'item_40' => 3,
                'item_41' => 2,
                'item_42' => 1,
                'item_43' => 4,
                'item_44' => 3,
                'item_45' => 0,
                'item_46' => 2,
                'item_47' => 2,
                'item_48' => 0,
                'item_49' => 3,
                'item_50' => 0,
                'item_51' => 3,
                'item_52' => 3,
                'item_53' => 2,
                'item_54' => 3,
                'item_55' => 2,
                'item_56' => 1,
                'item_57' => 1,
                'item_58' => 0,
                'item_59' => 1,
                'item_60' => 1,
                'item_61' => 4,
                'item_62' => 4,
                'item_63' => 1,
                'item_64' => 0,
                'item_65' => 0,
                'item_66' => 0,
                'item_67' => 0,
                'item_68' => 0,
                'item_69' => 0,
                'item_70' => 0,
                'item_71' => 0,
                'item_72' => 0,
                'item_sc' => 'No',
                'item_jefe' => 'No',
                'ets_1' => NULL,
                'ets_2' => NULL,
                'ets_3' => NULL,
                'ets_4' => NULL,
                'ets_5' => NULL,
                'ets_6' => NULL,
                'ets_7' => NULL,
                'ets_8' => NULL,
                'ets_9' => NULL,
                'ets_10' => NULL,
                'ets_11' => NULL,
                'ets_12' => NULL,
                'ets_13' => NULL,
                'ets_14' => NULL,
                'ets_15' => NULL,
                'ets_16' => NULL,
                'ets_17' => NULL,
                'ets_18' => NULL,
                'ets_19' => NULL,
                'ets_20' => NULL,
                'created_at' => '2022-07-19 23:44:44',
                'updated_at' => '2022-07-19 23:44:44',
            ),
        ));
        
        
    }
}