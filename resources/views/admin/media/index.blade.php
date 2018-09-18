@extends('layouts.admin')

@section('title')


@stop

@section('content')

    @include('includes.form_del_msg')

    @include('includes.form_msg')

    <div class="row">

        <h1>Media Page</h1>

        <div>
        @if($photos)

            <form action="/delete/media" method="post" class="form-inline">

                {{csrf_field()}}
                {{--{{method_field('delete')}}--}}

                <div class="form-group">
                    <select name="checkBoxArray" id="" class="form-control">
                        <option value="">Delete</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-danger">
                </div>

            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($photos as $photo)
                        <tr>
                            <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
                            <td>{{$photo->id}}</td>
                            <td><img height="50" src="{{$photo->file ? $photo->file : "No image"}}" alt=""></td>
                            <td>{{$photo->created_at ? $photo->created_at : "No date"}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                    </div>

                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

                </form>

            @endif
        </div>
    </div>

@stop


@section('scripts')

    <script>
        $(document).ready(function(){

            $("#options").click(function () {
                if(this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    })
                }else{
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    })
                }

            })
        });
    </script>



    @stop