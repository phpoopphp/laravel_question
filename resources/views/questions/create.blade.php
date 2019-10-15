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

                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Question title</label>
                                <input type="text" class="form-control {{$errors->has('title')?'is-invalid':null}}" name="title" id="title"
                                       value="{{$question->title}}">

                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('title')}}</strong>

                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="body">Question</label>
                                <textarea  class="form-control  {{$errors->has('body')?'is-invalid':null}}" name="body" id="body">{{$question->body}}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('body')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Ask Question</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
