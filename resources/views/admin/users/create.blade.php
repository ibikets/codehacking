@extends('layouts.admin')

@section('title')

Create Page

@endsection


@section('content')

    <h1>Admin Create Users Page</h1>

    <div class="row">
        <div class="col-sm-9">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email: ') !!}
                {!! Form::email('email', null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status: ') !!}
                {!! Form::select('is_active', [''=> 'Choose Status'] + $status, null, ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role: ') !!}
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles,null,  ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('file', 'Passport: ') !!}
                {!! Form::file('photo_id', ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password: ') !!}
                {!! Form::password('password', ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="col-sm-3">

        </div>


    </div>


        @if(count($errors) >0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif




@endsection


@section('footer')



@endsection