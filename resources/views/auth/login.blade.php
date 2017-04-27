@extends('master')
@section('title')
    Prihlasenie
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">

                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--  <label for="email" class="col-md-3 control-label">e-mail</label> --}}

                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus placeholder="email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" required
                                       placeholder="heslo">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--      <div class="form-group">
                                 <div class="col-md-6 col-md-offset-3">
                                     <div class="checkbox">
                                         <label>
                                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                         </label>
                                     </div>
                                 </div>
                             </div> --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-default btn-block btn-lg">
                                    prihlasit
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a class="btn btn-danger btn-block" href="{{ url('/') }}">
                                    zrusit
                                </a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
