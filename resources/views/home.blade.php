@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title">
      <h2>Latest Videos</h2>
      <p>
        @if(request()->has('search') && request()->get('search') != ' ')
        you are searching for <b>{{request()->get('search')}}</b> | <a href="{{route('home')}}">Reset</a>
        @endif
      </p>
      
    </div>
    <div class="row">
        @foreach($videos as $video)
            <div class="col-4">
                
                @include('front-end.shared.video-card')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            {{$videos->links()}}
        </div>
    </div>
      <br/>   
</div>



@endsection
