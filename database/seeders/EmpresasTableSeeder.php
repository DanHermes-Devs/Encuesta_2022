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
                'id' => 2,
                'token' => '1uplqyb2-wvhw-3sth-m8ik-k8m3n6qrahj',
                'nombre' => 'Velit maiores perfer',
                'logo' => 'logos/VHja4MV7ksH47MjUYhEuaQMjjC1LO91GMVq56krA.png',
                'imagen_fondo' => 'imagenes_fondo/9H1FwhNJ5ZoiEN1HS8pgGGok01Nbr19wS1f4ef2W.png',
                'colores_principales' => '#c9c460',
                'descripcion' => 'Cum omnis magnam rer',
                'activo' => '1',
                'aviso' => '<div>Tempora molestiae do.</div>',
                'tipo_puesto' => '["Incidunt fuga Volu"]',
                'area' => '["Accusamus cumque nos"]',
                'tipo_contratacion' => '["Laboris at anim sit"]',
                'jornada_trabajo' => '["Dignissimos fugiat "]',
                'rotacion_turnos' => NULL,
                'created_at' => '2022-07-19 16:36:44',
                'updated_at' => '2022-07-19 16:36:58',
            ),
            1 => 
            array (
                'id' => 4,
                'token' => 'mx9jk9sa-jevw-5orf-o1qj-k8j2it29lh',
                'nombre' => 'Adipisicing ut adipi',
                'logo' => 'logos/Xh77Hr05GsCyQ8I1ydiDOUnyneERHIxAsdsuFowo.png',
                'imagen_fondo' => 'imagenes_fondo/CgaMf0VpIBgMP8fBmtZN08pom78b5LLOf6CPjYRx.jpg',
                'colores_principales' => '#b0b884',
                'descripcion' => 'Esse ut et eveniet',
                'activo' => '1',
                'aviso' => '<div>Labore sed excepturi.</div>',
                'tipo_puesto' => '["Quisquam suscipit in","Do possimus ullamco","Ratione in sit mole","Veniam do amet sit","Recusandae Cillum u","Non quia ratione fac","Optio ex eveniet o","Voluptatem Exercita","Eius molestiae ipsa","Maxime labore deseru","Pariatur Et ea even"]',
                'area' => '["Unde et magni nisi s","Ullamco et dicta sin","Ad placeat ipsa ex","Duis sint eos quia ","Quos expedita dicta ","Sint dolore iure ra","Magna tempore est p","Rerum nulla quae par","In ipsam eaque disti","Necessitatibus ipsum","Rem nisi sit ipsum ","Ullam aut beatae acc","Excepturi tenetur do","Quis consectetur in"]',
                'tipo_contratacion' => '["Consectetur dolorum","Iste in sint archite","Quia maiores obcaeca","Est nihil enim et r","Necessitatibus omnis","Amet sed voluptates","Omnis ut adipisci su","Anim consectetur mi","Mollitia tempor rati","Eaque sed rem itaque","Aliquam dicta aut mo","Vitae fuga Minima q"]',
                'jornada_trabajo' => '["Ut laboris quis veni","Sunt fugit ab ut no","Obcaecati occaecat e","Dolore in officia il","Veritatis quod ut in","Esse lorem nisi pari","Non quasi est obcae","Delectus rerum ipsa","Temporibus hic eum p","Fugiat doloribus cum","Et possimus reprehe","Magnam nesciunt ame","Et sed in odit et nu","Ullam similique reru"]',
                'rotacion_turnos' => '["Cum eaque ut exceptu","Occaecat proident n","Ratione sit nulla vo","Deserunt error non n","Laboris officia cupi","Earum perferendis co","Omnis impedit rem s","Tempor in incididunt","Ea nisi esse possimu","Aut consectetur mol","Vitae et culpa volu","Nemo omnis maiores c","Id officia adipisci ","Tenetur sit error re","Recusandae Est ven","Ut dolores enim sequ","Qui temporibus cum a","Id nulla ut occaeca"]',
                'created_at' => '2022-07-20 15:58:09',
                'updated_at' => '2022-07-20 15:58:09',
            ),
        ));
        
        
    }
}