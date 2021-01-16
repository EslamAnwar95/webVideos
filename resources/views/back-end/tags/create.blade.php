@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('back-end.layout.navbar')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent

    @component('back-end.shared.create', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc])
        <form action="{{ route($routeName . '.store') }}" method="POST">

            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent

@endsection
