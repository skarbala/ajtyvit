@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h3 class="text-center" style="margin-bottom: 40px">Všetky žiadosti o dovolenku</h3>
        @include('partials.vacation.table', ['vacations' => $vacations])
    </div>
@stop
