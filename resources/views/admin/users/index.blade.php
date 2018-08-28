@extends('layouts.admin')

@section('title')

Lists Users Page

@endsection


@section('content')

    <h1>Admin Users Page</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Status</th>
                <th>Role</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : 'No Image Available'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->statu  ? $user->statu->name : 'Not Active'}}</td>
                    {{--<td>{{$user->is_active}}</td>--}}
                    <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection


@section('footer')



@endsection