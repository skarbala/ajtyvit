@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Najnovsie ziadosti</h3>
        <div class="row">
            <div class="col-md-6">
            @if ($vacations->isEmpty())
                <h4>zatial nemas ziadne dovolenky</h4>
            @else
                 @include('partials.vacation_table', ['vacations' => $vacations])
            @endif

            </div>
            <div class="col-md-6" style="text-align: center">
                <p>mozes si este naplanovat</p>
                <p style="font-size: 60px">{{Auth::user()->getDaysOfVacationLeft()}}</p>
                <p>dni</p>
            </div>
        </div>
    </div>
@endsection

