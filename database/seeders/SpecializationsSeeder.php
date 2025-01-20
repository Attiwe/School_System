<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('specializations')->delete();

         $specializations = [
            ['Name' => 'عربي'],
            ['Name' => 'برمجه'],
            ['Name' => 'الرياضيات'],
            ['Name' => 'شبكات'],
            ['Name' => 'انجليزي'],
        ];

         foreach ($specializations as $S) {
            Specialization::create($S);
        }
    }
}
