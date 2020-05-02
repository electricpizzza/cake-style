<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'first_name' => 'zakariae',
            'last_name' => 'dinar',
            'email' => 'dinar@mail.com',
            'roll' => 'admin',
            'password' => Hash::make('salamsalam'),
        ]);
    }
}
