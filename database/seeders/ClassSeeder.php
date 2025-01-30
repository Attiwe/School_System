<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_roms')->delete(); 
        $classRooms = [
            ['grade_id' =>  5, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>  5, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' =>   6, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>   6, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' => 7, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' => 7, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' =>  8, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>  8, 'nameClass' => 'الصف الدرسي التاني'],
        ];
    
         DB::table('class_roms')->insert($classRooms);
    }
    
}
