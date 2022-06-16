<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConfiguracionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mensaje_bienvenida' => 'A continuación encontraras una serie de reactivos en la que no existen respuestas buenas ni malas, solo son respuestas que hacen alusión a la experiencia que tienes dentro de trabajo, recuerda contestar lo primero que se te venga a la mente, considerando las condiciones ambientales de su centro de trabajo.',
            'instrucciones1' => 'Marca la respuesta que consideres más apropiada de acuerdo a lo que se te pide.',
            'instrucciones2' => 'Conteste las siguientes preguntas de acuerdo a su experiencia en este centro de trabajo durante los últimos meses. Tome en cuenta que si la primer pregunta contesta que “NO” no es necesario responder las demás secciones. En caso contrario, Sección I es "SÍ", se requiere contestar las secciones: Acontecimiento traumático severo, Recuerdos persistentes sobre el acontecimiento, Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento y Afectación.'
        ];
    }
}
