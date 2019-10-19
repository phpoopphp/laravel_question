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

                <div class="card-text">
                    <form action="{{route('questions.answers.store',$question->slug)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="body">You Answer</label>
                            <textarea name="body" id="body" class="form-control {{$errors->has('body')?'is-invalid':null}}" cols="30" rows="10"></textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>

                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-block btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
