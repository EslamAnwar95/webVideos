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
   @component('back-end.shared.table',['pageTitle'=> $pageTitle , 'pageDesc' => $pageDesc])

      
       @slot('addButton')
            <div class="col-md-4 text-right">
                 <a href="{{ route($routeName.'.create') }}" class="btn btn-white text-black btn-round">Add
                    {{ $sModuleName }}</a>
            </div>
       @endslot
       <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>Category</th>
                    <th>User</th>
                  
                    <th class="text-right">Controls</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->published == 1)
                                Published
                            @else
                                Hidden
                            @endif
                        </td>
                        <td>{{ $user->cat->name }}</td>
                        <td>{{ $user->user->name }}</td>
                       
                        <td class="td-actions text-right ">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                    
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
    </div>
   @endcomponent
@endsection
