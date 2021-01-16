@auth 

      <form method="post" action="{{route('front.commentStore' ,['id'=>$video->id])}}">
        @csrf
        <div class="form-group">
          <label for="">Add Comment</label>
          <textarea name="comment" class="form-control" rows="5"></textarea>
        </div>      
        <button type="submit" class="btn btn-success ">Add Comment</button>
      </form>
  @endauth 