@extends('layouts.app')
@section('title')
    | Nova ziadost
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <h1 style="text-align: center">nova ziadza</h1>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('new_vacation') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('vacation_from') ? ' has-error' : '' }}">
                        <label for="birthdate" class="col-md-4 control-label">Zaciatok dovolenky</label>

                        <div class="col-md-6">
                            <input id="birthdate" type="date" class="form-control" name="vacation_from"
                                   value="{{ old('vacation_from') }}"
                            >
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('vacation_to') ? ' has-error' : '' }}">
                        <label for="birthdate" class="col-md-4 control-label">Koniec dovolenky</label>

                        <div class="col-md-6">
                            <input id="birthdate" type="date" class="form-control" name="vacation_to"
                                   value="{{ old('vacation_to') }}"
                                   required>

                            @if ($errors->has('vacation_to'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('vacation_to') }}</strong>
                                    </span>
                            @endif

                            @if ($errors->has('msg'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-lg btn-block  ">
                                Zadat dovolenku
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a class="btn btn-danger btn-block" href="{{ url('/') }}">zrusit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
