<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   You Answer
                </h4>
            </div>
            <div class="card-body">

                @include('layouts._message')

                <new-answer :question="{{$question}}"></new-answer>
            </div>
        </div>
    </div>
</div>
