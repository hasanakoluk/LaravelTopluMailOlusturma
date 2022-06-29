<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Musteriler;
use Illuminate\Support\Str;

class MusterilerFactory extends Factory
{
    protected $model = Musteriler::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adsoyad' => $this->faker->name(),
            'mail' => $this->faker->unique()->safeEmail(),
            'telefon' => $this->faker->phoneNumber,
        ];
    }
}
