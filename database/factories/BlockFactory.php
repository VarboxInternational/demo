<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Varbox\Contracts\UploadServiceContract;
use Varbox\Models\Block;
use Varbox\Models\Upload;

class BlockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Block::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords($this->faker->words(3, true)),
            'type' => 'Example',
            'drafted_at' => $this->faker->boolean(70) ? null : now(),
            'data' => [
                'title' => ucwords($this->faker->words(3, true)),
                'file' => Upload::inRandomOrder()->first()->full_path,
                'active' => $this->faker->boolean(50),
                'content' => $this->faker->sentences(5, true) . '<br><br>' . $this->faker->sentences(5, true),
                'items' => [
                    [
                        'title' => ucwords($this->faker->words(3, true)),
                        'image' => Upload::inRandomOrder()->first()->full_path,
                        'content' => $this->faker->sentences(5, true) . '<br><br>' . $this->faker->sentences(5, true),
                    ]
                ],
            ]
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Block $block) {
            app(UploadServiceContract::class, [
                'file' => $block['data']['items'][0]['image'],
                'model' => $block,
                'field' => 'data[items][0][image]'
            ])->upload();
        });
    }
}
