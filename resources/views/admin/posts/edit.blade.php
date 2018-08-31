@extends('layouts.admin')

@section('title')

    Edit Posts

@endsection


@section('content')

    <h1>Edit Post</h1>
    @if(Session::has('msg'))

        <p class="alert alert-success">{{session('msg')}}</p>

    @endif
    <h3>Updated by: {{Auth::user()->name}}</h3>

    <div class="row">
        
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : "No Image Available"}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">


            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category: ') !!}
                {!! Form::select('category_id', [''=>'Choose Category'] + $categories, null,  ['class'=>'form-control'] ) !!}
            </div>



            <div class="form-group">
                {!! Form::label('photo_id', 'Photo: ') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Content: ') !!}
                {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>12] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('UPDATE POST', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}


            {{--Delete functionality--}}
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('DELETE POST', ['class'=>'btn btn-danger col-sm-6 pull-right']) !!}
                </div>

            {!! Form::close() !!}

        </div>

    </div>

    @include('includes.form_error')

@endsection


@section('footer')



@endsection