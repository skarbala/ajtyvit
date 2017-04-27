@extends('layouts.app')

@section('content')
<h1>vsetky vakacie</h1>
	@include('partials.vacation_table', ['vacations' => $vacations])
@stop
