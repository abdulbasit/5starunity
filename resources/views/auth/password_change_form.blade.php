@extends('layouts.app')
@section('style')
<link rel="stylesheet" media="screen" href="{{ asset('frontend/wizard-form/css/screen.css')}}">
<style>
.form-control
{
    box-shadow: none !important
}
#email-error
{
    display:none;
    border: 0px white !important;
    padding:0px;
    margin: 0px;
    position: absolute;
    width: 100%;
    top: -33px;
    color: red
}
#password-error
{
    display:none;
    border: 0px white !important;
    padding:0px;
    margin: 0px;
    position: absolute;
    width: 100%;
    top: -54px;
    color: red
}
.form_error
{
    border: solid 1px red !important
}
.error_msg
{
    color: red;
    font-size: 12px
}
.error{
    border:solid 1px red !important
}
</style>
@endsection
@section('content')
<div class="container">
    <br />
    {{ Session::get('test') }}
    <div class="row">
        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @endif
        <div class="col-lg-8 col-lg-offset-2">
                <h2 class="text-center registerHeading">{{ __('New Password') }}</h2>
            <br />
            <div class="card-body">
                <form method="POST" action="{{ route('edit.password') }}" id="login">
                    @csrf
                    <input type="hidden" name="user_id" id="use_id" value="{{$userDetail->id}}">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                {{ __('lables.password')}}
                        </label>
                        <div class="col-md-6 col-sm-7">
                            <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    </div>
                    <div class="form-group row mb-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-11 col-lg-10" id="logBtnWrap">
                                <div class="pull-right" style="width:100%">
                                    <div class="col-md-2 col-sm-3 col-xs-4 pull-right" style="position:relative; right:5px">
                                        <button type="submit" class="btn-green" style="margin-top:-5px; width:150px">
                                            {{ __('Send') }}
                                        </button>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3 extraBtns">
            <div class="card-body">
                <div class="form-group row exBtns" style="position:relative; left:4px">
                    <label for="" class="col-md-6 col-sm-6 col-xs-12 col-form-label text-right">
                        {{-- {{ __('Password') }} --}}
                        Noch nicht registriert?
                         </label>
                    <div class="col-md-5 col-sm-4 col-xs-11 no-padding">
                        <a class="btn btn-primary" style="width:100%; margin-top:-5px" href="{{ route('register') }}">
                                ZUR REGISTRIERUNG
                            {{-- {{ __('Registrer your self ') }} --}}
                        </a>
                    </div>
                </div>
                <div class="form-group row exBtns"  style="position:relative; left:4px">
                    <label for="" class="col-md-6 col-sm-6 col-xs-12 col-form-label text-right">
                        {{-- {{ __('Password') }} --}}
                        Login
                    </label>
                    <div class="col-md-5 col-sm-4 col-xs-11 no-padding">
                        @if (Route::has('password.request'))
                            <a class="btn btn-primary" style="width:100%; margin-top:-5px" href="{{ route('login') }}">
                                {{-- {{ __('Forgot Your Password?') }} --}}
                                Login
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<br />
