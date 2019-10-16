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
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
