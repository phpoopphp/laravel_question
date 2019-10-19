@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Edit Question</h3>
                            <div class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.show',$question->slug)}}">Back
                                    Question</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                        <form action="{{route('questions.answers.update',[$question->slug,$answer->id])}}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="body">You Answer</label>
                                <textarea name="body" id="body"
                                          class="form-control {{$errors->has('body')?'is-invalid':null}}" cols="30"
                                          rows="10">{{$answer->body}}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('body')}}</strong>

                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-block btn-info">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
