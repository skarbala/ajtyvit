@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Najnovsie ziadosti</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                    <th>Od</th>
                    <th>do</th>
                    <th>pocet dni</th>
                    <th>stav</th>
                    </thead>
                    <tbody>
                    @foreach($vacations as $vacation)
                        <tr>
                            <td>{{$vacation->vacation_from}}</td>
                            <td>{{$vacation->vacation_to}}</td>
                            <td>{{$vacation->days_of_vacation}}</td>
                            <td>{{$vacation->status->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" style="text-align: center">
                <p>mozes si este naplanovat</p>
                <p style="font-size: 60px">{{Auth::user()->getDaysOfVacationLeft()}}</p>
                <p>dni</p>
            </div>
        </div>
    </div>
@endsection

