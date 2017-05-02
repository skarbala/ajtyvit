@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>vsetky vakacie</h1>
        @include('partials.vacation_table', ['vacations' => $vacations])
    </div>
@stop
