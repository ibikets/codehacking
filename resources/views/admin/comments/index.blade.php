@extends('layouts.admin')

@section('title')
    Comments
@stop


@section('content')

    @if (count($comments) > 0)

        <h1>Comments Section</h1>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a class="btn btn-primary" href="{{route('home.post', $comment->post->slug)}}">View Post</a></td>
                        <td>
                            @if ($comment->is_active == 1)
                                {!! Form::open(['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id], 'class' => 'form-horizontal']) !!}
                                <input type="hidden" name="is_active" value="0">
                                    <div class="btn-group pull-right">
                                        {!! Form::submit("Unapprove", ['class' => 'btn btn-info']) !!}
                                    </div>
                                {!! Form::close() !!}

                            @else

                                {!! Form::open(['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id], 'class' => 'form-horizontal']) !!}
                                <input type="hidden" name="is_active" value="1">
                                    <div class="btn-group pull-right">
                                        {!! Form::submit("Approve", ['class' => 'btn btn-success']) !!}
                                    </div>
                                {!! Form::close() !!}

                            @endif


                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['PostsCommentsController@destroy', $comment->id], 'class' => 'form-horizontal']) !!}

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
        <h1 class="text-centered">No Comments</h1>
    @endif


@stop
