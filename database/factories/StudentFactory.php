<?php

namespace Database\Factories;

use App\Models\ClassRoms;
use App\Models\Grade;
use App\Models\MyParents;
use App\Models\Sections;
use App\Models\TypeBloods;
use Database\Seeders\Nationalities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'grade_id' => Grade::pluck('id')->random(),
        'class_id' => ClassRoms::pluck('id')->random(),
        'section_id' => Sections::pluck('id')->random(),
        'nationalitie_id' => \App\Models\Nationalities::pluck('id')->random(),
        'blood_id' => TypeBloods::pluck('id')->random(),
        'parents_id' => MyParents::pluck('id')->random(),
        'email' => fake()->unique()->safeEmail, // Ensuring unique and safe email
        'gender' => fake()->randomElement(['male', 'female']), // Random male or female
        'date_birth' => fake()->date($format = 'Y-m-d', $max = 'now'), // Realistic birthdate
        'academic_year' => "2025", // You can change this dynamically if needed
        'name' => fake('ar_SA')->name(),
        'password' => fake()->password(8), // You can define a specific length for password
    ];
}

}
