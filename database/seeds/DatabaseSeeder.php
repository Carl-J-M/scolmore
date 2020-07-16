<?php

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
      DB::table('messages')->insert([
    'number' => Integer::random(11),
    'message' => Str::random(140)
]);
    }
}
