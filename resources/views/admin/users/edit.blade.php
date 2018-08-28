@extends('layouts.admin')

@section('title')

    Edit User Page

@endsection


@section('content')

    <h1>Edit User Page</h1>

    <div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'No Image Available'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

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
                {!! Form::select('is_active', $status, null, ['class'=>'form-control'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role: ') !!}
                {!! Form::select('role_id',  $roles, null,  ['class'=>'form-control'] ) !!}
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




    </div>


    @include('includes.form_error')




@endsection


@section('footer')



@endsection