@extends('layouts.admin')


@section('title')
    Status Edit Page
@stop

@section('content')
    <h1>Edit Status</h1>

    <div class="row">

        <div class="col-sm-6">
            <h1>Create New Status</h1>

            {!! Form::model($statu, ['method'=>'PATCH', 'action'=>['StatusController@update', $statu->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('UPDATE STATUS', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=>['StatusController@destroy', $statu->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('DELETE STATUS', ['class'=>'btn btn-danger']) !!}
                </div>

            {!! Form::close() !!}

        </div>

    </div>


@stop


@section('footer')



@stop
