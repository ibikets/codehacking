@if(Session::has('msg'))

    <p class="alert alert-success">{{session('msg')}}</p>

@endif