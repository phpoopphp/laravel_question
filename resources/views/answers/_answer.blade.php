<answer :answer="{{$answer}}" inline-template>
    <div class="media">
        <div class="flex flex-column vote-controls">
            <a href="#" title="This question is useful"
               onclick="event.preventDefault(); document.getElementById('up-vote-answers-{{$answer->id}}').submit();"
               class="vote-up">
                <i class="fas fa-caret-up fa-2x"></i>
            </a>

            <form
                    action="{{route('votes.answers',$answer->id)}}"
                    id="up-vote-answers-{{$answer->id}}"
                    method="post">
                @csrf
                <input type="hidden" name="vote" value="1">

            </form>

            <span class="votes-count">{{$answer->votes_count}}</span>
            <a href="#" title="This question is useful"
               onclick="event.preventDefault(); document.getElementById('down-vote-answers-{{$answer->id}}').submit();"
               class="vote-down off">
                <i class="fas fa-caret-down fa-2x"></i>
            </a>

            <form
                    action="{{route('votes.answers',$answer->id)}}"
                    id="down-vote-answers-{{$answer->id}}"
                    method="post">
                @csrf
                <input type="hidden" name="vote" value="-1">

            </form>

{{--            @include('answers._accept')--}}

            <vote :model="{{$answer}}" name="accept"></vote>


        </div>
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
               <div class="form-group">
                   <textarea
                           required
                           rows="10" class="form-control" v-model="body"></textarea>
               </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm" :disabled="isInvalid">Update</button>
                    <button class="btn btn-info btn-sm" @click="cancel">Cancel</button>
                </div>
            </form>
          <div v-else>
              <div v-html="bodyHtml"></div>
              <div class="row">
                  <div class="col-md-4">
                      @can('update',$answer)
{{--                          <a href="{{route('questions.answers.edit',[--}}
{{--                                            'question'=>$question->slug,--}}
{{--                                            'answer'=>$answer->id])}}"--}}
{{--                             class="btn btn-outline-info btn-sm">Edit </a>--}}

                          <a  @click.prevent="edit"
                              class="btn btn-outline-info btn-sm">Edit </a>

                      @endcan
                      @can('delete',$answer)

                              <button class="btn btn-sm btn-outline-danger" @click="deleteAnswer()">Delete</button>
                      @endcan
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                      @include('questions.user', ['data' => $answer,'label'=>'Answered'])
                  </div>
              </div>
          </div>



        </div>
    </div>

</answer>
