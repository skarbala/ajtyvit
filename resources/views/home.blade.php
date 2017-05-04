@extends('layouts.app') @section('content')
    <div class="container">

        <div class="row" style="margin-top: 30px">
            <div class="col-md-5 col-md-offset-1">
                @if ($vacations->isEmpty())
                    <h4 style="margin-top: 0px">Zatiaľ nemáš žiadnu žiadosť</h4>
                @else
                    <h4 style="margin-bottom: 20px;margin-top: 0px">Najnovšie žiadosti o dovolenku</h4>
                    @include('partials.vacation_table', ['vacations' => $vacations])
                @endif
            </div>
            <div class="col-md-5" style="text-align: center">
                <p>môžeš si ešte naplánovať</p>
                <p style="font-size: 60px">{{Auth::user()->getDaysOfVacationLeft()}}</p>
                <p>dní</p>
            </div>
        </div>
    </div>
@endsection
