<?php

//Patients Table Seeder

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //Patient Information

     public function run()
     {
         $role_user = Role::where('name', 'patient')->first();

         foreach ($role_user->users as $user) {
           $patient = new Patient();
           $patient->address = rand(1, 100) . " Main Street";
           $patient->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
           $patient->insurance = true;
           $patient->user_id = $user->id;
           $patient->save();
         }
     }

     private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')

     {
     $pieces = [];
     $max = mb_strlen($keyspace, '8bit') - 1;
     for ($i = 0; $i < $length; ++$i) {
       $pieces []= $keyspace[random_int(0, $max)];
     }
     return implode('', $pieces); }
 }
