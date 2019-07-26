<?php

use Illuminate\Database\Seeder;
use App\lists;

class listTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        lists::truncate();

        factory(lists::class, 20)->create();
    }
}
