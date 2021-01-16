@extends('layouts.app')
@section('title')
{{$tag->name}}
@endsection
@section('content')
<div class="container">
    <div class="title">
      <h1>{{$tag->name}}</h1>
    </div>
    
        @include('front-end.shared.video-row')       

</div>
@endsection
