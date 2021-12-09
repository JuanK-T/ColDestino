<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
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
        User::create([
            'name' => 'Sara Vernal',
            'email' => 'sara@mail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        Profile::factory(1)->create([
            'user_id' => 1
        ]);

        $users = User::factory(3)->create();

        foreach($users as $user){
            Profile::factory(1)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
