@extends('layouts.app')
@section('title')
{{$page->name}}
@endsection
@section('meta_desc')
{{$page->meta_descs}}
@endsection
@section('meta_keywords')
{{$page->meta_keywords}}
@endsection
@section('content')
<div class="section section-buttons text-center" style="min-height: 400px">

<div class="container">
    <div class="title">
      <h1>{{$page->name}}</h1>
    </div>
    
       <p>{{$page->meta_descs}}</p>     

</div>
</div>
@endsection
