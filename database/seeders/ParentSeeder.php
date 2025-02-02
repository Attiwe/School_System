<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('my_parents')->delete();
         $parent = [
            'email'=>'ebrahim@gmail.com',
            'email_mather'=>'test@gmail.com',
            'national_id_father'=>'مصري',
            'national_id_mother'=>'مصري',
            'passport_id_father'=>'125362569824',
            'passport_id_mother'=>'125362569824',
            'phone_father'=>'01150629726',
            'phone_mother'=>'01150629726',
            'name_father'=>'مصري',
            'name_mother'=>'test',
            'job_father'=>'test',
            'job_mother'=>'test',
            'address_father'=>'test',
            'address_mother'=>'test',
            'blood_type_father_id'=>'2',
            'blood_type_mother_id'=>'2',
            'nationality_father_id'=>'20',
            'nationality_mother_id'=>'20',
            'religion_father_id'=>'1',
            'religion_mother_id'=>'1',
            'password'=>' 123654789',
            

         ];

         DB::table('my_parents')->insert($parent);


   }
}
