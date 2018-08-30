@extends('layouts.admin')

@section('title')

    Lists Posts

@endsection


@section('content')

    <h1>Posts Page</h1>
    @if(Session::has('msg'))

        <p class="alert alert-success">{{session('msg')}}</p>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th>Creates At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'No Media Available'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                </tr>
            @endforeach

        </tbody>
    </table>


@endsection


@section('footer')



@endsection