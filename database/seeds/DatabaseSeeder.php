<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *links to its model in app folder
     * @return void
     */
    public function run()
    {
        App\UsersDbs::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt("password"),
            'role' => 1,
            'remember_token' => Str::random(10),

        ]);
        $this->call(RequestsTableSeeder::class);
    }
}
