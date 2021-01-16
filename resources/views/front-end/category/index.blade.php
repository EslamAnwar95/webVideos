@extends('layouts.app')
@section('title')
{{$category->name}}
@endsection
@section('meta_desc')
{{$category->meta_des}}
@endsection
@section('meta_keywords')
{{$category->meta_keywords}}
@endsection
@section('content')
<div class="container">
    <div class="title">
      <h1>{{$category->name}}</h1>
    </div>
    
        @include('front-end.shared.video-row')       

</div>
@endsection
