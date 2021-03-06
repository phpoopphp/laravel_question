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
        // $this->call(UsersTableSeeder::class);
//        factory(App\Question::class,10)->create();

        $this->call(UsersTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(VotesTableSeeder::class);




    }
}
