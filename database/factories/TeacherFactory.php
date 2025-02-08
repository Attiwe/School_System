<?php

namespace Database\Factories;

use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'             => fake()->name(),
            'email'            => fake()->unique()->safeEmail(),
            'password'         => bcrypt('password'),
            'specialization_id'=> Specialization::pluck('id')->random(),
            'gender'           => fake()->randomElement(['male', 'female']),
            'joining_Date'     => fake()->date(),
            'address'          =>  "فيشا ",
            'phone'            =>  "01150629726"
        ];
    }
}
