<?php

namespace Database\Factories;

use App\Models\Ensenyament;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnsenyamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ensenyament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->name
        ];
    }
}
