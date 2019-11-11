<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
          ['name' => 'PostPress Admin', 'email'=>'admin.postpress@timesprinters.com', 'password'=>bcrypt('password')],
      ];

      foreach($users as $user){
        User::create($user);
      }
    }
}
