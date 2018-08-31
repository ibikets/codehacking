@extends('layouts.admin')

@section('title')
    Edit Categories Page
@endsection

@section('content')
    @if(Session::has('msg'))

        <p class="alert alert-success">{{session('msg')}}</p>

    @endif
    <h1>Edit Category</h1>

    <div class="row">

        <div class="col-sm-4">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('CREATE CATEGORY', ['class'=>'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
