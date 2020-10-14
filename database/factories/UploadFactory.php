<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Varbox\Contracts\UploadModelContract;
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
        return [];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Upload $upload) {
            app(UploadServiceContract::class, [
                'file' => $this->image()
            ])->upload();
        });
    }

    /**
     * @return UploadedFile
     */
    protected function image()
    {
        foreach (Storage::disk('demo')->allFiles('images') as $file) {
            $image = last(explode('/', $file));

            if (!app(UploadModelContract::class)->whereOriginalName($image)->exists()) {
                break;
            }
        }

        return new UploadedFile(storage_path('demo/images/' . $image), $image);
    }
}
