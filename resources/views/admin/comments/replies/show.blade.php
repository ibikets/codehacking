@extends('layouts.admin')

@section('title')
    replies
@stop


@section('content')

    @if (count($replies) > 0)

        <h1>Replies For: {{$comment->post->title}}  </h1>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th></th>
            </thead>
            <tbody>
            @foreach ($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a class="btn btn-primary" href="{{route('home.post', $reply->comment->post->slug)}}">View Post</a></td>
                    <td>
                        @if ($reply->is_active == 1)
                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], 'class' => 'form-horizontal']) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="btn-group pull-right">
                                {!! Form::submit("Unapprove", ['class' => 'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], 'class' => 'form-horizontal']) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="btn-group pull-right">
                                {!! Form::submit("Approve", ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif


                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id], 'class' => 'form-horizontal']) !!}

                        <div class="btn-group pull-right">
                            {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-centered">No replies</h1>
    @endif


@stop
