@extends('layouts.admin')

@section('title')

    Lists Posts

@endsection


@section('content')


<div class="row">
  <div class="col-sm-6">
    <h1>Posts Page</h1>
    @if(Session::has('msg'))

        <p class="alert alert-success">{{session('msg')}}</p>

    @endif
  </div>
  <div class="col-sm-6">
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary pull-right">Create New Post</a>
  </div>
</div>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th></th>
                <th></th>
                <th>Created At</th>
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
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td><a class="btn btn-info" href="{{route('home.post', $post->slug)}}">View Post</a> </td>
                    <td><a class="btn btn-primary" href="{{route('admin.comments.show', $post->id)}}"> {{count($post->comments) == 1 ? count($post->comments) ." Comment" : count($post->comments) ." Comments" }}</a> </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>


@endsection


@section('footer')



@endsection
