<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'doctor')->first();

        foreach ($role_user->users as $user) {
          $doctor = new Doctor();
          $doctor->address = rand(1, 100) . " Main Street";
          $doctor->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
          $doctor->date_started = '1998/10/19';
          $doctor->user_id = $user->id;
          $doctor->save();
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
