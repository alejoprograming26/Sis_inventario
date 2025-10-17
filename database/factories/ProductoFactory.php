<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => $this->faker->numberBetween(1, 50),
            'codigo' => $this->faker->unique()->numerify('#####'),
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'imagen' => $this->faker->imageUrl(600, 480, 'products'),
            'precio_compra' => $this->faker->randomFloat(2, 10, 100),
            'precio_venta' => $this->faker->randomFloat(2, 15, 150),
            'stock_minimo' => $this->faker->numberBetween(1, 5),
            'stock_maximo' => $this->faker->numberBetween(10, 20),
            'unidad_medida' => $this->faker->randomElement(['kilogramo', 'litro', 'Paquete', 'unidad']),
            'estado' => $this->faker->randomElement(['1', '0']),
        ];
    }
}
