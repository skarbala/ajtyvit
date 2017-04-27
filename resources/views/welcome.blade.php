@extends('master')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-2" style="text-align: center">
         <a href="http://www.ajtyvit.sk/"><img src="{{ url('img/logo.png') }}" alt=""></a>
    </div>
     <div class="col-md-4">
         <ul>
             <li><a class="btn btn-default btn-lg btn-block" href="{{ route('login') }}">prihlasit</a></li>
             <li><a class="btn btn-default btn-lg btn-block" href="{{ route('register') }}">registrovat</a></li>
         </ul>
    </div>
 </div>
</div>
@stop

