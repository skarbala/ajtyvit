@extends('layouts.app') @section('content')
    <div class="container">
        <div style="z-index: 1000; position: absolute" class="col-sm-8 text-center">
            @include('flash::message')
        </div>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-5 col-md-offset-1">
                @if ($vacations->isEmpty())
                    <h4 style="margin-top: 0px">Zatiaľ nemáš žiadnu žiadosť</h4>
                @else
                    <h4 style="margin-bottom: 20px;margin-top: 0px">Najnovšie žiadosti o dovolenku</h4>
                    @include('partials.vacation.table', ['vacations' => $vacations])
                @endif
            </div>
            <div class="col-md-5" style="text-align: center">
                <p>môžeš si ešte naplánovať</p>
                <p style="font-size: 60px">{{Auth::user()->getDaysOfVacationLeft()}}</p>
                <p>dní</p>
            </div>
        </div>
    </div>
<p>{{var_dump(ends_with(URL::previous(),"new_vacation"))}}</p>
@endsection
@section('script')
    <script>
        $('div.alert').not('.alert-important').delay(1000).fadeOut(350);
    </script>
@endsection