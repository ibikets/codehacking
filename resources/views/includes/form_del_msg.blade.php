@if(Session::has('delmsg'))

    <p class="alert alert-danger">{{session('delmsg')}}</p>

@endif