<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Varbox\Models\Redirect;

class RedirectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Redirect::class;

    /**
     * @var array
     */
    protected $statuses = [
        '301',
        '302',
        '307',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'old_url' => Str::slug($this->faker->words(3, true)),
            'new_url' => Str::slug($this->faker->words(2, true)),
            'status' => $this->statuses[rand(0, 2)],
        ];
    }
}
