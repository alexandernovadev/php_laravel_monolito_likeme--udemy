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
        DB::table('users')->insert([
            'name' => 'Sara',
            'surname' => 'nova',
            'role' => 'user',
            'nick' => 'sara1',
            'image' => '',
            'email' => 'sara@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mariana',
            'surname' => 'nova',
            'nick' => 'marina12',
            'role' => 'user',
            'image' => '',
            'email' => 'maraina@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Maria',
            'surname' => 'nova',
            'nick' => 'mari87',
            'role' => 'user',
            'image' => '',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bolin',
            'nick' => 'noli87',
            'role' => 'user',
            'image' => '',
            'surname' => 'nova',
            'email' => 'bola@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
