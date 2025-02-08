<?php

namespace Database\Factories;

use App\Models\ClassRoms;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fees>
 */
class FeesFactory extends Factory
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
            'title'=>fake()->name,
            'amount'=>20000,
            'desc'=>"رسوم مصريف",
            'year'=> 2025,

        ];
    }
}
