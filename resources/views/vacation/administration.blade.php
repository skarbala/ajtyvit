@extends('layouts.app')
@section('title')
    | Nova žiadosť
@endsection
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <table class="table">
            <thead>
            <th>Meno</th>
            <th>Od</th>
            <th>do</th>
            <th>pocet dni</th>
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
                        <a class=" btn btn-success" href="{{url('confirmVacation',$vacation->id)}}">Schvalit</a>
                        <a class=" btn btn-danger" href="{{url('declineVacation',$vacation->id)}}">Zamietnut</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .table > tbody > tr > td {
            vertical-align: middle;
            text-align: center;

        }

        .table > thead > tr > th {
            text-align: center;
        }
    </style>

@endsection
