<?php

use App\Models\User;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        User::create([
            'name' => 'admin',
            'email' => $faker->unique()->safeEmail,
            'password'=> bcrypt('123456'),
            'group' => 'admin',
        ]);
    }
}
