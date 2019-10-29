<div class="row mt-3" v-cloak>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{$question->answer_counts. "  ".\Str::plural('answer',$question->answer_counts)}}
                </h4>
            </div>
            <div class="card-body">

                <div class="card-text">
                    @foreach($question->answers as $answer)
                       @include("answers._answer",['answer'=>$answer])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



