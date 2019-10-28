@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h3>{{$question->title}}</h3>
                                <div class="ml-auto">
                                    <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Back
                                        Questions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="media">
                        <div class="flex flex-column align-content-around vote-controls">
                            <a href="#"
                               title="This question is useful" class="vote-up {{auth()->guest()? 'off':''}}"
                               onclick="event.preventDefault(); document.getElementById('up-vote-questions-{{$question->id}}').submit();"
                            >
                                <form
                                        action="{{route('votes.question',$question->slug)}}"
                                        id="up-vote-questions-{{$question->id}}"
                                        method="post">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">

                                </form>
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">{{$question->votes_count}}</span>
                            <a href="#" title="This question is useful"
                               onclick="event.preventDefault(); document.getElementById('down-vote-questions-{{$question->id}}').submit();"

                               class="vote-down {{auth()->guest()?'off':''}}">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>

                            <form
                                    action="{{route('votes.question',$question->slug)}}"
                                    id="down-vote-questions-{{$question->id}}"
                                    method="post">
                                @csrf
                                <input type="hidden" name="vote" value="-1">

                            </form>

                            <a href="#" title="Click to mark as favorite (Click again to undo)"
                               class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i> <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body pl-4">
                            {!!  $question->body_html!!}
                            @include('questions.user', ['data' => $question,'label'=>'Created'])
                        </div>
                    </div>
                </div>


                @include('answers._index', ['question' => $question])

                @include('answers.create')


            </div>
        </div>


    </div>
@endsection
