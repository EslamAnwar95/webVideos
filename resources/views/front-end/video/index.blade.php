@extends('layouts.app')
@section('title')
{{$video->name}}

@endsection
@section('meta_desc')
{{$video->meta_desc}}
@endsection
@section('meta_keywords')
{{$video->meta_keywords}}
@endsection
@section('content')
<div class="container">
    <div class="title">
      <h1>{{$video->name}}</h1>
      {{-- {{dd($video)}} --}}
    </div>
    <div class="row">
      <div class="col-md-12">
        @php
        $url = getYoutubeId($video->youtube)
    @endphp
    @if($url)
    <iframe width="100%" height="500"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endif 
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 mt-4">
        <p><i class="nc-icon nc-user-run"></i>  {{$video->user->name}}</p>
        <p><i class="nc-icon nc-calendar-60"></i> {{$video->created_at->diffForHumans()}}</p>
        <p><i class="nc-icon nc-user-run"></i>  {{$video->desc}}</p>
        <a href="{{route('front.category',['id'=>$video->cat->id])}}"><p><i class="nc-icon nc-bullet-list-67"></i>   {{$video->cat->name}}</p></a>
      </div>
      <div class="col-md-6 mt-4">  
        

        <p>
          @foreach($video->tags as $tag) 
          <a href="{{route('front.tags',['id'=>$tag->id])}}">
            <span class="badge badge-info"><i class="nc-icon nc-tag-content"></i>  {{$tag->name}}</span>
          </a>
          @endforeach
        </p>
        <p>
          @foreach($video->skills  as $skill)
          <a href="{{route('front.skill',['id' =>$skill->id])}}">
          <span class="badge badge-info">{{$skill->name}}</span>
          </a>
          
          @endforeach
        </p>


      </div>
    </div>

    @include('front-end.video.comments')
    @include('front-end.video.add-comment') 
</div>
@endsection
