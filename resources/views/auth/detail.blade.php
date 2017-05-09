@extends('layouts.app')
@section('title')
    Profil
@stop
@section('content')
    <div class="container">
        <div class="row">
           <p>{{Auth::user()->name}}</p>
    </div>
@endsection
