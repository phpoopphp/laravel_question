<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::with('user','answers')->latest()->paginate(6);
        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question=new Question();
        return view('questions.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'title'=>'required|min:2',
          'body' =>'required'
      ]);
      $request->user()->questions()->create($request->only(['title','body']));
      return redirect()->route('questions.index')->with('success','Sual xetasiz qeyd olundu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
       $question->increment('views');
       $question->load('user','answers');
       return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
//     if (\Gate::allows('update-question',$question)){
//         return view('questions.edit',compact('question'));
//     }
//
//     abort('404','Sehifeye giris izniniz yoxdur');
        $this->authorize('update',$question);
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
//        $this->authorize('update-question',$question);
        $this->authorize('update',$question);

       $question->update($request->only(['title','body']));
       return redirect()->route('questions.index')->with('success','Sualda deyisiklik edildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete-question',$question);
        $question->delete();
        return redirect()->back()->with('success','Sual silindi');
    }
}
