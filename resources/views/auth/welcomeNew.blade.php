@extends('master')

@section('title')
    Welcome
@stop

@section('content')
     <div class="container">
        <div class="col-md-8 col-lg-offset-2" style="text-align: center">
            <h2>Vitaj {{Auth::user() ->name}}</h2>
            <p style="margin-top: 50px;">zostava ti</p>
            <h2>{{Auth::user()->days_of_vacation_left }}</h2>
            <p>dni dovolenky</p>
            <a class="btn btn-success btn-block btn-lg" style="margin-top: 100px" href="{{url("/")}}">Pokracovat</a>
        </div>
    </div>
@endsection
