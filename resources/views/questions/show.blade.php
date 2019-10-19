@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>{{$question->title}}</h3>
                            <div class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Back
                                    Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="lead">
                            {!!  $question->body_html!!}
                            @include('questions.user', ['data' => $question])
                        </p>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    {{$question->answers_count. "  ".\Str::plural('answer',$question->answers_count)}}
                                </h4>
                            </div>
                            <div class="card-body">

                                <div class="card-text">
                                    @foreach($question->answers as $answer)
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="badge badge-primary">{{$loop->index+1}}</span>
                                                {!! $answer->body_html !!}


                                                @include('questions.user', ['data' => $answer])

                                            </div>
                                        </div>
                                        <hr>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection
