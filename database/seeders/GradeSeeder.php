<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
         DB::table('grades')->delete();
         $grades = [
         [
            'name'=>'اعدادي هندسه',
            'notes'=>'  -- ',
         ],
         [
            'name'=>'  هندسة الاتصالات والحاسبات ',
            'notes'=>'  -- ',
         ],
         [
            'name'=>'  هندسة  المدنيه',
            'notes'=>'  -- ',
         ],
          [
            'name'=>'  هندسة الكيميائية ', 
            'notes'=>'  -- ',
         ],
        ];

        DB::table('grades')->insert($grades);

    }
}
