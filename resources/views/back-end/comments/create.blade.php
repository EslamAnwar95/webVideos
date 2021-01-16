<form action="{{route('comment.store')}}" method="post">
    @csrf
    @include('back-end.comments.form')
    <input type="hidden" value="{{$user->id}}" name="video_id">
    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
</form>