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

        factory(\App\User::class,4)->create()->each(function ($u){
                $u->questions()->saveMany(
                    factory(\App\Question::class,rand(1,10))->make()
                );
        });
    }
}
