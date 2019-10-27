@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.create')}}">Ask
                                    Question</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes_count}}</strong>
                                        {{Str::plural('vote',$question->votes_count)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answers_count}}</strong>
                                        {{Str::plural('answer',$question->answers_count)}}
                                    </div>
                                    <div class="view">
                                        <strong>{{$question->views}}</strong>
                                        {{Str::plural('view',$question->views)}}
                                    </div>

                                </div>
                                <br>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{$question->url}}"> {{$question->title}}</a></h3>
                                        <div class="ml-auto">
                                            @can('update',$question)
                                                <a href="{{route('questions.edit',$question->slug)}}"
                                                   class="btn btn-outline-info btn-sm">Edit </a>

                                            @endcan
                                            @can('delete',$question)

                                                <form action="{{route('questions.destroy',$question->slug)}}"
                                                      method="post"
                                                      class="pt-1 form-delete">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-sm btn-outline-danger" type="submit"
                                                            onclick="return confirm('Silmek isteyirsen')">Delete
                                                    </button>
                                                </form>


                                            @endcan


                                        </div>
                                    </div>
                                    <h3 class="mt-0">

                                        <p class="lead">
                                            Asked By
                                            <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                            <small class="text-muted">{{$question->created_date}}</small>
                                        </p>
                                    </h3>
                                    {{Str::limit($question->body,250)}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="mx-auto">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
