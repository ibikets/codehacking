@if (Auth::check())

<!-- Comments Form -->
<div class="well">
    @include('includes.form_msg')
    @include('includes.form_del_msg')
    <h4>Leave a Comment:</h4>

    {!! Form::open(['method'=>'POST', 'action'=>'PostsCommentsController@store', 'rows'=>3]) !!}

    <input type="hidden" name="post_id" value="{{$post->id}}">

    <div class="form-group">
        {!! Form::label('body', 'Comment: ') !!}
        {!! Form::textarea('body', null,  ['class'=>'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endif

<hr>

<!-- Posted Comments -->

@if (count($comments) > 0)

@foreach ($comments as $comment)

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>Added {{$comment->created_at->diffForHumans()}}</small>
        </h4>
        <p>{{$comment->body}}</p>

        <div class="comment-reply-container">

            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

            <div class="comment-reply">
                {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <div class="form-group">
                    {!! Form::label('body', 'Reply') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
                </div>

                <div class="btn-group">
                    {!! Form::submit("Reply", ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        {{--@if (count($comment->replies) > 0)--}}

        @foreach ($comment->replies as $reply)

        @if($reply->is_active == 1)

        <!-- Nested Comment -->
        <div id="nested-comment" class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$reply->author}}
                    <small>{{$reply->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$reply->body}}</p>
            </div>

            <div class="comment-reply-container">

                <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                <div class="comment-reply col-sm-10">
                    {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                        {!! Form::label('body', 'Reply') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
                    </div>

                    <div class="btn-group">
                        {!! Form::submit("Reply", ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- End Nested Comment -->

        </div>
        @endif

        @endforeach

        {{--@endif--}}

    </div>
</div>

@endforeach


@endif