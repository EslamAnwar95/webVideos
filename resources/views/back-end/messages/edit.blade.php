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
                 
            @include('back-end.'.$folderName.'.form')                   
    @endcomponent
@endsection
