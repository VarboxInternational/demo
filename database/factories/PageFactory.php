<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Varbox\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ucwords($this->faker->unique()->words(2, true));
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'type' => 'default',
            'drafted_at' => $this->faker->boolean(50) ? null : now(),
            'data' => [
                'title' => ucwords($this->faker->words(3, true)),
                'subtitle' => ucwords($this->faker->words(5, true)),
                'content' => $this->faker->sentences(5, true) . '<br><br>' . $this->faker->sentences(5, true),
            ]
        ];
    }
}
