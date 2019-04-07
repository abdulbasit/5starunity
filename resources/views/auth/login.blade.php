@extends('layouts.app')

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
        <div class="col-lg-8">
            <div class="card-header text-center"><h3>{{ __('Login') }}</h3></div>
            <br />
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                    </div>
                    <div class="form-group row mb-0">
                        <div class="row">
                            <div class="col-xs-10">
                                <div class="pull-right" style="width:100%">
                                    <div class="col-md-2 col-xs-12 no-padding pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    {{-- <div class="col-md-4 col-xs-12 no-padding pull-right">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div> --}}
                                    <div class="col-md-3 col-xs-12 no-padding pull-right">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 extraBtns">

            <div class="row">
                <div class="col-xs-12 no-padding" style="margin-bottom:10px">
                    <a class="btn btn-primary" style="width:100%" href="{{ route('register') }}">
                        {{ __('Registrer your self ') }}
                    </a>
                </div>
            </div>
            <div class="row">
                    <div class="col-xs-12 no-padding">
                        @if (Route::has('password.request'))
                            <a class="btn btn-primary" style="width:100%" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
<br />
<br />
@endsection
