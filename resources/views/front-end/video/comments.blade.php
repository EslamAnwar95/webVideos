<div class="row" id="comment">
    <div class="col-md-12">
          <div class="card card-nav-tabs text-left">
          @php
            $comments = $video->comments
          @endphp
          <h4 class="card-title">Comments ({{count($comments)}})</h4>
      <div class="card-body">          
         @foreach($comments as $comment)
         <div class='row'>
            <div class="col-8"><i class="nc-icon nc-circle-10"></i>
                : <a href="{{route('front.profile' ,['id'=>$comment->user->id ,'slug' => slug($comment->user->name)])}}">{{$comment->user->name}}</a>
            </div>
              <div class="col-4 text-right" >
               <span>{{$comment->created_at->diffForHumans()}}</span>              
            </div>
         </div>                   
        <p class="card-text"> 
          {{$comment->comment}}
        </p>
        @auth
        @if(auth()->user()->group == 'admin' || $comment->user->id = auth()->user()->id)
        @endauth
        
            <a href="" onclick="$(this).next('div').slideToggle(1000);return false;">Edit</a>        
              <div style="display: none">
                <form method="post" action="{{route('front.commentUpdate' ,['id'=>$comment->id])}}">
                  @csrf
                  <div class="form-group">
                    <textarea name="comment" class="form-control" rows="5">{{$comment->comment}}</textarea>
                  </div>                  
                  <button type="submit" class="btn btn-success ">Edit</button>
                </form>
            </div>                        
        @endif           
          <br>@if(!$loop->last)
            <hr>
          @endif
       @endforeach         
    </div>        
</div> 