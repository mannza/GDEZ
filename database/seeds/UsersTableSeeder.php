<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # User 1
      DB::table('users')->insert([
        'name' => 'The Admin',
        'email' => 'theadmin@gmail.com',
        'password' => bcrypt('theadmin'),
        'phone' =>'0123456798',
        'role' => 'admin'
]);

        # User 2
        DB::table('users')->insert([
          'name' => 'The Staff',
          'email' => 'thestaff@gmail.com',
          'password' => bcrypt('thestaff'),
          'phone' =>'0123456798',
          'role' => 'staff'
]);

          # User 3
          DB::table('users')->insert([
            'name' => 'The Student',
            'email' => 'thestudent@gmail.com',
            'password' => bcrypt('thestudent'),
            'phone' =>'0123456798',
            'role' => 'student'
          ]);
    }
}
