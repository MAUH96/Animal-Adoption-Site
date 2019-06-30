<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *links to its model in app folder
     * @return void
     */
    public function run()
    {
        $count = 10;
        factory(App\RequestsDbs::class, $count)->create();
    }
}
