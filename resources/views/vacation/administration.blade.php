@extends('layouts.app') @section('title') | Nova žiadosť @endsection @section('content')
<div class="container">
    <div style="z-index: 1000; position: absolute" class="col-md-8 text-center col-md-offset-1">
        @include('flash::message')
    </div>
    @if ($vacations->isEmpty())
        <h3 class="text-center" style="margin-bottom: 40px">Žiadne žiadosti na schválenie</h3>
    @else
    <div class="col-md-10 col-md-offset-1">
        <table class="table">
            <thead>
                <th>Meno</th>
                <th>Od</th>
                <th>do</th>
                <th>počet dní</th>
                <th>stav</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($vacations as $vacation)
                <tr>
                    <td>{{$vacation->user->name .' '. $vacation->user->surname}}</td>
                    <td>{{$vacation->vacation_from}}</td>
                    <td>{{$vacation->vacation_to}}</td>
                    <td>{{$vacation->days_of_vacation}}</td>
                    <td>{{$vacation->status->description}}</td>
                    <td>
                        <form method="POST" action="{{ url('confirmVacation', $vacation->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <a class="btn btn-success" type="button" data-toggle="modal" data-target="#confirmVacation" data-title="Delete User" data-message="Naozaj stornovat ziadost ?">
                                    schváliť
                                </a>
                        </form>
                        <form method="POST" action="{{ url('declineVacation', $vacation->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDecline" data-title="Delete User" data-message="Naozaj stornovat ziadost ?">
                                    zamietnuť
                                </a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
<style>
form {
    display: inline-block;
}
</style>
@include('vacation.modal.decline')
@include('vacation.modal.confirm')
@endsection
@section('script')
<script type="text/javascript">
$('div.alert').not('.alert-important').delay(1000).fadeOut(350);
</script>
<script src="{{asset('js/modal.js')}}"></script>
@endsection
