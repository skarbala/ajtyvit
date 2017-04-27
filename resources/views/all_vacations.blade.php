@extends('layouts.app')

@section('content')
	@include('partials.vacation_table', ['vacations' => $vacations])
@stop
