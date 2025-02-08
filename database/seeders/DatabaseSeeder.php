<?php

namespace Database\Seeders;

use App\Models\Appointments;
use App\Models\Fees;
use App\Models\MyParents;
use App\Models\Sections;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          Student::factory(50)->create();
        //  Fees::factory(50)->create();
        // Appointments::factory(50)->create();
        //  Teacher::factory(100)->create();
        // MyParents::factory(10)->create();
        //   Sections::factory(30)->create();


        //   $this->call(TypeBloods::class);
        //   $this->call(Nationalities::class);
        //   $this->call(ReligionsSeeder::class);
        //   $this->call(Adnim::class);
        //   $this->call(SpecializationsSeeder::class);
        //    $this->call(GradeSeeder::class);
        //      $this->call(ClassSeeder::class);
        //       $this->call(ParentSeeder::class);
    }
}
