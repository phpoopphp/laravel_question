@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Tebrikler</strong>
        <p>{{session()->get('success')}}</p>
    </div>
@endif
