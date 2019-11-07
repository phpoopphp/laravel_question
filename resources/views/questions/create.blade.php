@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Ask Question</h3>
                            <div class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Back
                                    Questions</a>
                            </div>
                        </div>

                    </div>

                    @include('questions.form')
                </div>
            </div>
        </div>
    </div>
@endsection
