<?php

namespace Database\Factories;

use App\Models\ClassRoms;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sections>
 */
class SectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade_id'   => Grade::pluck('id')->random(),
            'class_id'   => ClassRoms::pluck('id')->random(),
            'nameSectian'=> fake()->word(),
            'statuse'    => 1,
            'desc'       => '--',
        ];
    }
}
