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
        $users = factory(App\User::class, 25)->create();
        foreach ($users as $user) {
          if(rand(0,10) <= 7) continue;

          factory(App\Report::class, rand(1, 20))->create(['reportUserID' => $user->id]);
        }
    }
}
