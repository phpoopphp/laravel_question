<div>
    <user-info :label="{{$label}}" :model="{{$data}}"></user-info>
    <span class="text-muted">{{$label}} : {{$data->created_at->diffForHumans()}}</span>
    <div class="media">
        <a href="{{$data->user->url}}" class="btn btn-link pr-2">
            <img src="{{asset($data->user->avatar)}}" alt=""/>
        </a>
        <div class="media-body">
            <a href="{{$data->user->url}}" class="btn btn-link pr-2">
                {{$data->user->name}}
            </a>
        </div>
    </div>
</div>
