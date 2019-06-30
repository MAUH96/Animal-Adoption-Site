<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * links to its model in the app folder
     * @return void
     */
    public function run()
    {

        $count = 10;
        factory(App\UsersDbs::class, $count)->create();
    }
}
