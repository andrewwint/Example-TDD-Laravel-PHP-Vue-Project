<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Andrew Wint',
          'email' => 'wint.andrew@gmail.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Patrick Toner',
          'email' => 'ptoner@customerbenefitsanalytics.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Ben Bartholomew',
          'email' => 'ben@robot-kittens.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Ranga Srinivasan',
          'email' => 'ranga.s@ekoinfomatics.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table('users')->insert([
          'name' => 'Tom Duval',
          'email' => 'tduval9497@gmail.com',
          'password' => bcrypt('password123'),
          'created_at' => date("Y-m-d H:i:s")
      ]);


    }
}
