<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->count(20)->create();
        Nurse::factory()->count(50)->create();
        Doctor::factory()->count(30)->create();
    }
}
