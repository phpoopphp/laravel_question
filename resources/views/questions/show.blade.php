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
                        <vote :model="{{$question}}" name="question"></vote>
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
