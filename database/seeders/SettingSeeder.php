<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' =>  date('Y-m-d')],
            ['key' => 'school_title', 'value' => 'IT'],
            ['key' => 'school_name', 'value' => 'Higher Institute of Engineering and Technology, Tanta'],
            ['key' => 'end_first_term', 'value' => date('Y-m-d')],
            ['key' => 'end_second_term', 'value' => now()->year . '-06-01'],
            ['key' => 'phone', 'value' => '01150629726'],
            ['key' => 'address', 'value' => 'طنطا'],
            ['key' => 'school_email', 'value' => 'ebrahim@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    
    }
}
