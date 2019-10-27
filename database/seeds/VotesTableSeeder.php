<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votables')->where('votable_type','App\Question')->delete();

        $users=\App\User::all();
        $numberOfUsers=$users->count();
        $votes=[-1,1];

        foreach (\App\Question::all() as $question) {
            for ($i=0; $i< rand(0,$numberOfUsers);$i++){
                $user=$users[$i];
                $user->voteQuestion($question,$votes[rand(0,1)]);
            }
        }

    }
}
