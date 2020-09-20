<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Varbox\Models\Email;
use Varbox\Models\Upload;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords($this->faker->words(3, true)),
            'type' => 'test-mail',
            //'drafted_at' => $this->faker->boolean(70) ? null : now(),
            'data' => [
                'subject' => ucwords($this->faker->words(3, true)),
                'attachment' => Upload::inRandomOrder()->first()->full_path,
                'message' => 'Hi [username]<br><br>' . $this->faker->paragraphs(3, true),
            ]
        ];
    }
}
