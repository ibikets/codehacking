@extends('layouts.admin')

@section('title')
    Edit Categories Page
@endsection

@section('content')

    <h1>Edit Category</h1>

    <div class="row">

        <div class="col-sm-4">
            {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('UPDATE CATEGORY', ['class'=>'btn btn-success col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('DELETE CATEGORY', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
