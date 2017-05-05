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
                        <form
                                method="POST"
                                action="{{ url('confirmVacation', $vacation->id) }}"
                                accept-charset="UTF-8"
                        >
                            {{ csrf_field() }}

                            <a class="btn btn-success"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmVacation"
                               data-title="Delete User"
                               data-message="Naozaj stornovat ziadost ?">
                                schvalit
                            </a>

                        </form>
                        <form
                                method="POST"
                                action="{{ url('declineVacation', $vacation->id) }}"
                                accept-charset="UTF-8"
                        >
                            {{ csrf_field() }}

                            <a class="btn btn-danger"
                               type="button"
                               data-toggle="modal"
                               data-target="#confirmDecline"
                               data-title="Delete User"
                               data-message="Naozaj stornovat ziadost ?">
                                zamietnut
                            </a>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <style>
        /*.table > tbody > tr > td {*/
        /*vertical-align: middle;*/
        /*text-align: center;*/

        /*}*/

        form {
            display: inline-block;
        }

        /*.table > thead > tr > th {*/
        /*text-align: center;*/
        /*}*/
    </style>
    @include('vacation.modal.decline')
    @include('vacation.modal.confirm')
@endsection

@section('script')
    <script type="text/javascript">
        $('#confirmVacation').on('show.bs.modal', function (e) {
            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirmVacation').data('form', form);
        });
        <!-- Form confirm (yes/ok) handler, submits form -->
        $('#confirmVacation').find('.modal-footer #confirmVacation').on('click', function () {
            $(this).data('form').submit();
        });
        $('#confirmDecline').on('show.bs.modal', function (e) {
            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirmDecline').data('form', form);
        });

        <!-- Form confirm (yes/ok) handler, submits form -->
        $('#confirmDecline').find('.modal-footer #confirmDecline').on('click', function () {
            $(this).data('form').submit();
        });

        $('#confirmCancel').on('show.bs.modal', function (e) {

            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirmCancel').data('form', form);
        });
        <!-- Form confirm (yes/ok) handler, submits form -->
        $('#confirmCancel').find('.modal-footer #confirmCancel').on('click', function () {
            $(this).data('form').submit();
        });
    </script>

@endsection
