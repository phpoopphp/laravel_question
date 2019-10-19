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
                                <a href="#" title="Mark this answer as best answer" class="vote-accept mt-2 favorited">
                                    <i class="fas fa-check fa-2x"></i>
                                </a>
                            </div>
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



