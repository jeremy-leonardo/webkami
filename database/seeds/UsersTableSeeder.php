<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'developer@mail.com',
                'name' => 'Anto Dev',
                'password' => bcrypt('password12345'),
                'is_client' => FALSE,
                'is_developer' => TRUE,
            ],
            [
                'email' => 'client@mail.com',
                'name' => 'Budi Clent',
                'password' => bcrypt('password12345'),
                'is_client' => TRUE,
                'is_developer' => FALSE,
            ],
            [
                'email' => 'jeremy@mail.com',
                'name' => 'Jeremy',
                'password' => bcrypt('password12345'),
                'is_client' => FALSE,
                'is_developer' => FALSE,
            ],
        ]);

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'email' => $faker->unique()->email,
                'name' => $faker->unique()->name,
                'password' => bcrypt('password12345'),
                'is_client' => TRUE,
                'is_developer' => FALSE,
            ]);
        }
    }
}
