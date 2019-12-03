<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name','admin')->first();
      $role_doctor = Role::where('name','doctor')->first();
      $role_patient = Role::where('name','patient')->first();

      $admin = new User();
      $admin->name = 'Oisin McCann';
      $admin->email = 'admin@mybookstore.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->name = 'Doctor White';
      $doctor->email = 'doctor@mybookstore.ie';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Doctor Black';
      $doctor->email = 'doctor2@mybookstore.ie';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Doctor Green';
      $doctor->email = 'doctor3@mybookstore.ie';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->name = 'Dying Man';
      $patient->email = 'patient@mybookstore.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'The Man';
      $patient->email = 't@mybookstore.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Ze Man';
      $patient->email = 'z@mybookstore.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }
}
