<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\abonne>
 */
class AbonneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            "nom"=>Str::upper(Str:: random(10)),
            "prenom"=>Str::upper(Str:: random(10)),
            "age" => rand(21,80),
            "sexe"=>$this->faker-> realText($maxNbChars = 10, $indexSize = 1),
            "profession"=>Str::upper(Str:: random(10)),
            'rue' => Str::upper(Str:: random(10))
        ];
    }
}
