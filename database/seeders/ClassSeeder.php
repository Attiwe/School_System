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
            ['grade_id' =>   1, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>   1, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' =>   2, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>   2, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' => 3, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' => 3, 'nameClass' => 'الصف الدرسي التاني'],
            ['grade_id' =>  4, 'nameClass' => 'الصف الدرسي الاول'],
            ['grade_id' =>  4, 'nameClass' => 'الصف الدرسي التاني'],
        ];
    
         DB::table('class_roms')->insert($classRooms);
    }
    
}
