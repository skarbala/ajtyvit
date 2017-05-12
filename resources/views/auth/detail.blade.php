@extends('layouts.app')
@section('title')
    |Profil
@stop
@section('content')
    <div class="container">
        <h3 class="text-center" style="margin-bottom: 40px">Profil</h3>
        <hr>
        <div class="row">
            <form action="" class="form-horizontal">
                @if(Auth::user()->title)
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Titul</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="vacation_from"
                                   value="{{Auth::user()->title->uivalue}}
                                           " disabled>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Meno</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="vacation_from"
                               value="{{ Auth::user()->name}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Priezvisko</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="vacation_from"
                               value="{{ Auth::user()->surname}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Datum narodenia</label>
                    <div class="col-md-6">
                        <input id="name" type="date" class="form-control" name="vacation_from"
                               value="{{ Auth::user()->birthdate}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6">
                        <input id="name" type="email" class="form-control" name="vacation_from"
                               value="{{ Auth::user()->email}}" disabled>
                    </div>
                </div>
            </form>
        </div>
@endsection
