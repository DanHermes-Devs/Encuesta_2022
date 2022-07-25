<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('empresas')->delete();
        
        \DB::table('empresas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'token' => 'g56kp7ph-5nbc-wlzq-xo1t-8u4d1rsmcsp',
                'nombre' => 'Aliqua Autem et adi',
                'logo' => 'logos/3omnUXk7rx4N35rSRwWNUrMnyMjXchYqH75MSLZ8.jpg',
                'imagen_fondo' => 'imagenes_fondo/viOMKqkJuAqeb6lAQFFfsgKvbeazexNmpvqMB57j.jpg',
                'colores_principales' => '#c6ab0f',
                'descripcion' => 'Eum fugit esse cor',
                'activo' => '1',
                'aviso' => '<div>Tenetur asperiores a.</div>',
                'tipo_puesto' => '["Sit vitae facilis q"]',
                'area' => '["Tempor impedit cill"]',
                'tipo_contratacion' => '["Quidem quidem ut eve"]',
                'jornada_trabajo' => '["Soluta dicta aut vol"]',
                'rotacion_turnos' => NULL,
                'created_at' => '2022-07-10 20:50:30',
                'updated_at' => '2022-07-10 20:50:30',
            ),
            1 => 
            array (
                'id' => 2,
                'token' => '7s3nl7qb-xh68-mww0-ifkk-2qh0s2wuqz',
                'nombre' => 'Et iure est consequa',
                'logo' => 'logos/sY2V5x6df5UJdMAfnz0yIbR4uyG6XOqOl6659ox4.png',
                'imagen_fondo' => 'imagenes_fondo/S3EJNP8RCxs6Hjj1LoAnpDMqSpfYESbskaRS7zgI.png',
                'colores_principales' => '#acd238',
                'descripcion' => 'Cupiditate ut pariat',
                'activo' => '0',
                'aviso' => '<div>Dolor amet, eum ad i.</div>',
                'tipo_puesto' => '["Do officiis dignissi"]',
                'area' => '["Ipsum et aliquid qui"]',
                'tipo_contratacion' => '["Qui adipisci et aliq"]',
                'jornada_trabajo' => '["Quia laboriosam sed"]',
                'rotacion_turnos' => '["Tempor velit conseq"]',
                'created_at' => '2022-07-22 03:13:11',
                'updated_at' => '2022-07-22 03:13:11',
            ),
        ));
        
        
    }
}