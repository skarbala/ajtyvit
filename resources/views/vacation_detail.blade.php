@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-4">
        <form action="" class="form-horizontal">
        <h4>Detail dovolenky</h4>
        <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label">Dovolenka od</label>
                <input type="email" class="form-control disabled" id="disabledInput"
                value=" {{$vacation->vacation_from}}" disabled>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Dovolenka do</label>
                <p class="form-control-static">
                    {{$vacation->vacation_to}}
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">pocet dni</label>
                <p class="form-control-static">
                    {{$vacation->days_of_vacation}}
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">stav</label>
                <p class="form-control-static">
                {{$vacation->status->description}}
            </div>
            </p>
        </form>
    </div>
@stop
