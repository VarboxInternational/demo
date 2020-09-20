<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Varbox\Models\Menu;
use Varbox\Models\Page;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array_merge($this->randomType(), [
            'name' => ucwords($this->faker->words(3, true)),
            'location' => $this->faker->boolean(50) ? 'header' : 'footer',
            'active' => $this->faker->boolean(70),
            'data' => [
                'new_window' => $this->faker->boolean(60),
            ]
        ]);
    }

    /**
     * @return array
     */
    protected function randomType()
    {
        $random = $this->faker->boolean(50);

        return [
            'type' => $random ? 'url' : 'page',
            'url' => $random ? '/' . $this->faker->slug(3, true) : null,
            'menuable_id' => $random ? null : Page::inRandomOrder()->first(),
            'menuable_type' => $random ? null : Page::class,
        ];
    }
}
