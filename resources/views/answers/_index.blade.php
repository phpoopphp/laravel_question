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
                            <div class="flex flex-column vote-controls">
                                <a href="#" title="This question is useful" class="vote-up">
                                    <i class="fas fa-caret-up fa-2x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a href="#" title="This question is useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-2x"></i>
                                </a>
                                @can('accept',$answer)
                                    <a href="#" title="Mark this answer as best answer"
                                       class="{{$answer->status}} mt-2"
                                       onclick="event.preventDefault();document.getElementById('accept-answer-{{$answer->id}}').submit();"
                                    >
                                        <i class="fas fa-check fa-2x"></i>
                                    </a>

                                    <form method="post" action=" {{ route('answers.accept',$answer->id) }}"
                                          id="accept-answer-{{$answer->id}}" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    @if($answer->is_best)
                                        <a href="#" title="The question owner accepted this answer as best answer"
                                           class="{{$answer->status}} mt-2">
                                            <i class="fas fa-check fa-2x"></i>
                                        </a>
                                    @endif
                                @endcan
                            </div>
                            <div class="media-body">
                                <span class="badge badge-primary">{{$loop->index+1}}</span>
                                {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        @can('update',$answer)
                                            <a href="{{route('questions.answers.edit',[
                                            'question'=>$question->slug,
                                            'answer'=>$answer->id])}}"
                                               class="btn btn-outline-info btn-sm">Edit </a>

                                        @endcan
                                        @can('delete',$answer)

                                            <form action="{{route('questions.answers.destroy',[
                                            'question'=>$question->slug,
                                            'answer'=>$answer->id])}}"
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
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        @include('questions.user', ['data' => $answer])
                                    </div>
                                </div>


                            </div>
                        </div>
                        <hr>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



