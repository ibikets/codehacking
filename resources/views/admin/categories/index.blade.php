@extends('layouts.admin')

@section('title')
    Categories Page
    @endsection

@section('content')

<h1> Category Page</h1>

@include('includes.form_msg')



<div class="row">

    <div class="col-sm-6">
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

    <div class="col-sm-6">

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>

    <div class="row">



    </div>

    @stop


