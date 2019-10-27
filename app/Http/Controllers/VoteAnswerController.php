<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vote(Answer $answer)
    {
        $vote=(int) \request()->vote;
        auth()->user()->voteAnswer($answer,$vote);
        return back();
    }
}
