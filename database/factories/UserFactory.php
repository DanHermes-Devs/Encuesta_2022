<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory

{

    /**

     * Define the model's default state.

     *

     * @return array

     */

    public function definition()

    {

        $password = Hash::make('12345678');
        return [

            'name' => 'Alfonso Millán',

            'email' => 'alfonso@wearetrafika.com',

            'email_verified_at' => now(),

            'password' => $password, // password

            'remember_token' => Str::random(10),

        ];

    }



    /**

     * Indicate that the model's email address should be unverified.

     *

     * @return \Illuminate\Database\Eloquent\Factories\Factory

     */

    public function unverified()

    {

        return $this->state(function (array $attributes) {

            return [

                'email_verified_at' => null,

            ];

        });

    }

}

