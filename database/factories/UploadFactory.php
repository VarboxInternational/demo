<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Varbox\Contracts\UploadServiceContract;
use Varbox\Models\Upload;

class UploadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upload::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file' => $this->faker->imageUrl(800, 800),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Upload $upload) {
            if (count($upload->getAttributes()) > 1 && !$upload->getAttribute('file')) {
                return;
            }

            $file = app(UploadServiceContract::class, [
                'file' => $upload->file
            ])->upload();

            Upload::whereName($file->getName())->first()->update([
                'original_name' => $this->faker->words(3, true)
            ]);
        });
    }
}
