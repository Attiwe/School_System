<?php

namespace Database\Seeders;

use App\Models\Religion;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionsSeeder extends Seeder
{
   
    public function run(): void
    {
         DB::table('religions')->delete();

         $religions = [
            [
                // 'en' => 'Muslim',
                'ar' => 'مسلم',
            ],
            [
                // 'en' => 'Christian',
                'ar' => 'مسيحي',
            ],
            [
                // 'en' => 'Other',
                'ar' => 'غير ذلك',
            ],
        ];

         $data = array_map(fn($religion) => [
            // 'name_en' => $religion['en'],
            'name' => $religion['ar'],
        ], $religions);

        // Insert data into the database
        DB::table('religions')->insert($data);
    }
}

 
