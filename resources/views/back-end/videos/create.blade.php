@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif
    @component('back-end.layout.navbar')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent

    @component('back-end.shared.create', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc])
  
        <form action="{{ route($routeName.'.store') }}" method="POST" enctype="multipart/form-data">
            {{-- {{dd(route($routeName . '.store'))}} --}}
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent

@endsection
