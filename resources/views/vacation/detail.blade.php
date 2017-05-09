@extends('layouts.app') @section('content')
    <div class="container">
        <div style="z-index: 1000; position: absolute" class="col-sm-8 text-center">
            @include('flash::message')
        </div>
        <h4 class="text-center">Detail dovolenky</h4>
        <div class="col-md-8 col-md-offset-2">
            <form action="" class="form-horizontal">
                <hr>
                <div class="form-group">
                    <label for="vacation_from" class="col-md-4 control-label">Začiatok dovolenky</label>
                    <div class="col-md-6">
                        <input id="vacation_from" type="date" class="form-control" name="vacation_from"
                               value="{{ $vacation->vacation_from}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="vacation_to" class="col-md-4 control-label">Koniec dovolenky</label>
                    <div class="col-md-6">
                        <input id="vacation_to" type="date" class="form-control" name="vacation_to"
                               value="{{ $vacation->vacation_to}}" disabled>
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
            </form>
            @if (Auth::user()->isAdmin() && $vacation->isSubmitted())
                <form class="form-horizontal"
                      method="POST"
                      action="{{ url('confirmVacation', $vacation->id) }}"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-success btn-block"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#confirmVacation"
                                    data-title="Delete User"
                                    data-message="Naozaj stornovat ziadost ?">
                                schváliť žiadosť
                            </button>
                        </div>
                    </div>
                </form>
            @endif
            @if (Auth::user()->isAdmin() && $vacation->isSubmitted())
                <form class="form-horizontal"
                      method="POST"
                      action="{{ url('declineVacation', $vacation->id) }}"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-danger btn-block"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#confirmDecline"
                                    data-title="Delete User"
                                    data-message="Naozaj stornovat ziadost ?">
                                zamietnut žiadosť
                            </button>
                        </div>
                    </div>
                </form>
            @endif
            @if ($vacation->isSubmitted())
                <form class="form-horizontal"
                      method="POST"
                      action="{{ url('cancelVacation', $vacation->id) }}"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-danger btn-block"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#confirmCancel"
                                    data-title="Storno ziadosti"
                                    data-message="Naozaj stornovat ziadost ?">
                                Stornovat žiadosť
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    @include('vacation.modal.decline')
    @include('vacation.modal.confirm')
    @include('vacation.modal.cancel')
@endsection
@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
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
        $('div.alert').not('.alert-important').delay(1000).fadeOut(350);
    </script>
@endsection
