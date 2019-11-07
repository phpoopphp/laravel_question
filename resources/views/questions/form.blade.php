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

