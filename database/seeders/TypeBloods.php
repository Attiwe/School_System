<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeBloods extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('type_bloods')->delete();
    
        $bloodGroups = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];
    
         $data = array_map(fn($bg) => ['name' => $bg], $bloodGroups);
    
        DB::table('type_bloods')->insert($data);
    }
    
    
}
