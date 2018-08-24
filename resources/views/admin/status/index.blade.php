@extends('layouts.admin')


@section('title')
    Status Page
@stop

@section('content')
<h1>Status Page</h1>

    <div class="row">

        <div class="col-sm-6">

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
                        <td>{{$statu->id}}</td>
                        <td>{{$statu->name}}</td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-sm-6">

        </div>

    </div>

@stop


@section('footer')



@stop
