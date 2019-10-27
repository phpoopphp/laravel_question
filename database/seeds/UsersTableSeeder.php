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
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();
        factory(\App\User::class, 4)->create()->each(function ($u) {
            $u->questions()->saveMany(
                factory(\App\Question::class, rand(1, 10))->make()
            )
                ->each(function ($question) {
                    $question->answers()->saveMany(
                        factory(\App\Answer::class,rand(1,5))->make()
                    );
                });
        });
    }
}
