@extends('layouts.app') @section('content')
<h4 class="text-center">Detail dovolenky</h4>
<div class="col-md-8 col-md-offset-2">
    <form action="" class="form-horizontal">
        <hr>
        <div class="form-group">
            <label for="vacation_from" class="col-md-4 control-label">Začiatok dovolenky</label>
            <div class="col-md-6">
                <input id="vacation_from" type="date" class="form-control" name="vacation_from" value="{{ $vacation->vacation_from}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="vacation_to" class="col-md-4 control-label">Koniec dovolenky</label>
            <div class="col-md-6">
                <input id="vacation_to" type="date" class="form-control" name="vacation_to" value="{{ $vacation->vacation_to}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Počet dní</label>
            <div class="col-md-6">
                <p class="form-control-static">{{$vacation->days_of_vacation}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Stav</label>
            <div class="col-md-6">
                <p class="form-control-static">{{$vacation->status->description}}</p>
            </div>
        </div>

        @if (Auth::user()->isAdmin() && $vacation->isSubmitted())
         <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-success btn-block" href="{{ url('/') }}">schváliť žiadosť</a>
            </div>
        </div>
        @endif

        @if ($vacation->isSubmitted())
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-danger btn-block" href="{{ url('/') }}">stornovať žiadosť</a>
            </div>
        </div>
        @endif

    </form>
</div>
@stop
