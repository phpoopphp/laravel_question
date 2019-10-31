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
