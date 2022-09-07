<?php



namespace Database\Seeders;

use App\AvisoPrivacidad;
use App\Configuracion;
use App\User;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder

{

    /**

     * Seed the application's database.

     *

     * @return void

     */

    public function run()

    {

        User::factory(1)->create();
        Configuracion::factory(1)->create();
        AvisoPrivacidad::factory(1)->create();
    }

}

