<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Productos::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'ingredientes' => $this->faker->word.", ".$this->faker->word,
            'precio' => $this->faker->numberBetween($min = 100, $max = 200),
            'existencias' => $this->faker->numberBetween($min = 1, $max = 100),
            'url' => 'images/pizza.jpg'
        ];
    }
}
