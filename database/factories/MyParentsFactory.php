<?php

namespace Database\Factories;

use App\Models\MyParents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyParents>
 */
class MyParentsFactory extends Factory
{
    protected $model = MyParents::class;

    public function definition(): array
    {
        return [
            'email'               => fake()->unique()->safeEmail(),
            'email_mather'        => fake()->unique()->safeEmail(),
            'national_id_father'  => fake()->numerify('############'), // رقم وطني عشوائي
            'national_id_mother'  => fake()->numerify('############'),
            
            'phone_father'        => fake()->phoneNumber(),
            'phone_mother'        => fake()->phoneNumber(),
            'name_father'         => fake('ar_SA')->name('male'), // اسم عربي للوالد
            'name_mother'         => fake('ar_SA')->name('female'), // اسم عربي للوالدة
            'job_father'          => fake()->jobTitle(),
            'job_mother'          => fake()->jobTitle(),
            'address_father'      => fake()->address(),
            'address_mother'      => fake()->address(),
            'blood_type_father_id'=> fake()->randomElement([1, 2, 3, 4]), // افتراضيًا A, B, AB, O
            'blood_type_mother_id'=> fake()->randomElement([1, 2, 3, 4]),
            'nationality_father_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'nationality_mother_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'religion_father_id'  => fake()->randomElement([1, 2]), // الإسلام أو المسيحية كمثال
            'religion_mother_id'  => fake()->randomElement([1, 2]),
            'password'            => Hash::make('password'), // كلمة مرور مشفرة
        'passport_id_father' => fake()->numerify('A########'), // جواز سفر إجباري
'passport_id_mother' => fake()->numerify('B########'),

        ];
    }
}
