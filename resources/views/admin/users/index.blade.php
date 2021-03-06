@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)


            @foreach($users as $user)


                <tr>
                    <td>{{$user->id}}</td>
                    <td> <img src="{{$user->photo ? $user->photo->file : $user->placeholder()}}" class="index-thumbnail"></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                    <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'unknown'}}</td>
                    <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'unknown'}}</td>
                </tr>

            @endforeach


        @endif


        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{--            {{$posts->links()}}--}}
            {{$users->render()}}
        </div>
    </div>


@stop