@extends('back-end.layout.app')
@php

@endphp
@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('back-end.layout.navbar')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot

    @endcomponent
    @component('back-end.shared.edit', ['pageDesc' => $pageDesc, 'moduleName' => $moduleName])

        <form action="{{ route($routeName . '.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')

            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>

        @slot('md4')
        @php
            $url = getYoutubeId($user->youtube)
        @endphp
        @if($url)
        <iframe width="250"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @endif
        <img src="{{url('uploads/'.$user->image)}}" width="250" >
    @endslot
      
        
    @endcomponent
    @component('back-end.shared.edit', ['pageDesc' => "Comment", 'moduleName' => "Here you can Control your comments"])
    @slot('md4')
    @include('back-end.comments.create')
@endslot
    
    @include('back-end.comments.index')
    
@endcomponent
    

    
@endsection
