@extends('layouts.admin')


@section('title')
    Status Page
@stop

@section('content')

    @include('includes.form_msg')

    <div class="row">

        <div class="col-sm-6">
            <h1>Status List</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Satus</th>
                </tr>
                </thead>
                <tbody>

                @foreach($status as $statu)
                    <tr>
                        <td><a href="{{route('admin.status.edit', $statu->id)}}">{{$statu->id}}</a></td>
                        <td>{{$statu->name}}</td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-sm-6">
            <h1>Create New Status</h1>



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

    </div>

@stop


@section('footer')



@stop
