<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Question $question)
    {
        $this->validate($request, [
            'body' => 'required|min:3'
        ]);

        $question->answers()->create([
            'user_id' => $request->user()->id,
            'body' => $request->get('body')
        ]);
        if($request->expectsJson()){
            return response()->json(['success'=>'Sualiniz xetasiz qeyd olundu'],201);
        }
        return redirect()->back()->with('success', 'Sualiniz xetasiz qeyd olundu');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->validate($request, [
            'body' => 'required|min:2'
        ]);
        $answer->update($request->all());
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Cavabiniz xetasiz deyisildi',
                'body_html' => $request->body
            ]);
        }
        return redirect()->route('questions.show', $question->slug)
            ->with('success', 'Cavabda deyisiklikler edildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        if(\request()->expectsJson()){
            return response()->json(['message'=>'Cavab xetasiz silindi']);
        }
        return redirect()->route('questions.show', $question->slug)
            ->with('success', 'Answer deleted');
    }

}
