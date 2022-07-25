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
                'id' => 1,
                'id_empresa' => 1,
                'id_registro' => 1,
                'c_final' => '122',
                'c_cat_1' => '11',
                'c_cat_2' => '51',
                'c_cat_3' => '10',
                'c_cat_4' => '51',
                'c_cat_5' => '13',
                'c_cat_6' => '12',
                'c_cat_7' => '13',
                'c_dominio_1' => '11',
                'c_dominio_2' => '19',
                'c_dominio_3' => '21',
                'c_dominio_4' => '4',
                'c_dominio_5' => '6',
                'c_dominio_6' => '20',
                'c_dominio_7' => '13',
                'c_dominio_8' => '15',
                'c_dominio_9' => '11',
                'c_dominio_10' => '2',
                'c_dimension_1' => '7',
                'c_dimension_2' => '4',
                'c_dimension_3' => '0',
                'c_dimension_4' => '0',
                'c_dimension_5' => '6',
                'c_dimension_6' => '6',
                'c_dimension_7' => '0',
                'c_dimension_8' => '4',
                'c_dimension_9' => '3',
                'c_dimension_10' => '9',
                'c_dimension_11' => '3',
                'c_dimension_12' => '6',
                'c_dimension_13' => '3',
                'c_dimension_14' => '4',
                'c_dimension_15' => '4',
                'c_dimension_16' => '2',
                'c_dimension_17' => '8',
                'c_dimension_18' => '0',
                'c_dimension_19' => '15',
                'c_dimension_20' => '5',
                'c_dimension_21' => '6',
                'c_dimension_22' => '0',
                'c_dimension_23' => '2',
                'created_at' => '2022-07-10 21:47:14',
                'updated_at' => '2022-07-10 21:47:14',
            ),
        ));
        
        
    }
}