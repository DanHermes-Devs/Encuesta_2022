<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CalificacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('calificaciones')->delete();
        
        \DB::table('calificaciones')->insert(array (
            0 => 
            array (
                'id' => 9,
                'id_empresa' => 2,
                'id_registro' => 9,
                'c_final' => '123',
                'c_cat_1' => '8',
                'c_cat_2' => '52',
                'c_cat_3' => '14',
                'c_cat_4' => '45',
                'c_cat_5' => '19',
                'c_cat_6' => '8',
                'c_cat_7' => '10',
                'c_dominio_1' => '8',
                'c_dominio_2' => '16',
                'c_dominio_3' => '28',
                'c_dominio_4' => '6',
                'c_dominio_5' => '8',
                'c_dominio_6' => '16',
                'c_dominio_7' => '10',
                'c_dominio_8' => '12',
                'c_dominio_9' => '11',
                'c_dominio_10' => '8',
                'c_dimension_1' => '2',
                'c_dimension_2' => '4',
                'c_dimension_3' => '2',
                'c_dimension_4' => '4',
                'c_dimension_5' => '2',
                'c_dimension_6' => '5',
                'c_dimension_7' => '0',
                'c_dimension_8' => '3',
                'c_dimension_9' => '2',
                'c_dimension_10' => '14',
                'c_dimension_11' => '2',
                'c_dimension_12' => '5',
                'c_dimension_13' => '7',
                'c_dimension_14' => '6',
                'c_dimension_15' => '0',
                'c_dimension_16' => '8',
                'c_dimension_17' => '8',
                'c_dimension_18' => '0',
                'c_dimension_19' => '12',
                'c_dimension_20' => '2',
                'c_dimension_21' => '9',
                'c_dimension_22' => '3',
                'c_dimension_23' => '5',
                'created_at' => '2022-07-19 23:44:44',
                'updated_at' => '2022-07-19 23:44:44',
            ),
        ));
        
        
    }
}