<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\Helper;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;

        return [
            'title' => $title,
            'description' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(1280,
                720,
                'produto',
                true,
                'exemplo',
                true),
            'slug' => Str::slug($title),
            'price' => $this->faker->randomNumber(3, true)

        ];
    }
}
