<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Nurse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->call('media-library:clean');

        $this->call(RolesAndPermissionsSeeder::class);

        $admin = Admin::factory()->createOne([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'phone' => '111111111',
        ]);

        /** @var Nurse $nurse */
        $nurse = Nurse::factory()->createOne([
            'name' => 'Nurse',
            'email' => 'nurse@demo.com',
            'phone' => '222222222',
        ]);
        $nurse->givePermissionTo([
            'manage.doctors',
            'manage.feedback',
        ]);

        $doctor = Doctor::factory()->createOne([
            'name' => 'Doctor',
            'email' => 'doctor@demo.com',
            'phone' => '333333333',
        ]);

        $this->call([
            DummyDataSeeder::class,
        ]);

        $this->command->table(['ID', 'Name', 'Email', 'Phone', 'Password', 'Type', 'Type Code'], [
            [$admin->id, $admin->name, $admin->email, $admin->phone, 'password', 'Admin', $admin->type],
            [
                $nurse->id,
                $nurse->name,
                $nurse->email,
                $nurse->phone,
                'password',
                'Nurse',
                $nurse->type,
            ],
            [
                $doctor->id,
                $doctor->name,
                $doctor->email,
                $doctor->phone,
                'password',
                'Doctor',
                $doctor->type,
            ],
        ]);
    }
}
