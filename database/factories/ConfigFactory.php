<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Varbox\Contracts\UploadServiceContract;
use Varbox\Models\Config;

class ConfigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Config::class;

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
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function appName()
    {
        return $this->state([
            'key' => 'app.name',
            'value' => 'Varbox Demo',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function appTimezone()
    {
        return $this->state([
            'key' => 'app.timezone',
            'value' => 'UTC',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function appLocale()
    {
        return $this->state([
            'key' => 'app.locale',
            'value' => 'en',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function mailFromAddress()
    {
        return $this->state([
            'key' => 'mail.from.address',
            'value' => 'demo@varbox.io',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function mailFromName()
    {
        return $this->state([
            'key' => 'mail.from.name',
            'value' => 'Varbox Demo',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function servicesPostmarkKey()
    {
        return $this->state([
            'key' => 'services.postmark.key',
            'value' => $this->faker->asciify('********************'),
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function servicesGoogleKey()
    {
        return $this->state([
            'key' => 'services.google.key',
            'value' => $this->faker->asciify('********************'),
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function servicesFacebookKey()
    {
        return $this->state([
            'key' => 'services.facebook.key',
            'value' => $this->faker->asciify('********************'),
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function servicesGithubKey()
    {
        return $this->state([
            'key' => 'services.github.key',
            'value' => $this->faker->asciify('********************'),
        ]);
    }
}
