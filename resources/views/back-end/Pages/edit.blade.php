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

        <form action="{{ route($routeName . '.update', $user->id) }}" method="POST">
            @method('put')

            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>

    @endcomponent
@endsection
