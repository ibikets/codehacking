@extends('layouts.admin')

@section('title')

    Create Posts

@endsection


@section('content')

    <h1>Create New Post</h1>
    @if(Session::has('msg'))

        <p class="alert alert-success">{{session('msg')}}</p>

    @endif
    <h3>Created by: {{Auth::user()->name}}</h3>

       <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

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
            {!! Form::submit('CREATE POST', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    @include('includes.form_error')

@endsection


@section('footer')



@endsection