@extends('back-end.layout.app')
@section('title')
    Home
@endsection
@push('css')
    
@endpush
@section('content')
    @component('back-end.layout.navbar')
        @slot('nav_title')
            Home
        @endslot
       
    @endcomponent
    @include('back-end.home-section.statics')
    @include('back-end.home-section.comments')
    
@endsection


@push('js')
    <script>
        // alert('welcome')
    </script>
@endpush