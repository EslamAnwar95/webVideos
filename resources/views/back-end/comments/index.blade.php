


<table class="table" id="comments">
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>
                <p>{{$comment->user->name}}</p>
                <p>{{$comment->comment}}</p>
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </td>
            
            <td class="td-actions text-right">
              <button type="button" rel="tooltip" onclick="$(this).closest('tr').next('tr').slideToggle()" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Comment">
                <i class="material-icons">edit</i>
              </button>
              <a href="{{route('comment.delete' , ['id' => $comment->id])}}" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                <i class="material-icons">close</i>
              </a>
            </td>
          </tr>
          <tr style="display: none">
            <td>  
                <form action="{{route('comment.update' , ['id' => $comment->id])}}" method="post">
                    @csrf
                    @include('back-end.comments.form' , ['user' => $comment])
                    <input type="hidden" value="{{$user->id}}" name="video_id">
                    <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
                </form>
            </td>
          </tr>
    
@endforeach 
    </tbody>
  </table>