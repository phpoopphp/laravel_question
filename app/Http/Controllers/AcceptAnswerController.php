<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        dd('accept-answers',$answer);
    }

    public function accept(Answer $answer)
    {
        $this->authorize('accept',$answer);
        $answer->question->acceptBestAnswer($answer );
        if(\request()->expectsJson()){
            return response()->json(['message'=>'Accepted']);
        }
        return back();
    }
}
