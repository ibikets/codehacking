@extends('layouts.admin')


@section('title')
    Status Create Page
    @stop

@section('content')
    <h1>Create Status</h1>

    <div class="col-sm-4">
        {!! Form::open(['method'=>'POST', 'action'=>'StatusController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null,  ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Status', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>







    @stop


@section('footer')



    @stop
