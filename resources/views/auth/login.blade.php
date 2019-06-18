@extends('layouts.app')
@section('style')
<style>
.form-control
{
    box-shadow: none !important
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
            <div class="card-header text-center"><h3>{{ __('Login') }}</h3></div>
            <br />
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="pre-route" id="pre-route" value="{{Session::get('route')}}">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-right">
                                {{ __('lables.email')}}
                        </label>
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
                        <label for="password" class="col-md-4 col-form-label text-right">{{ __('lables.password')}}</label>
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
                                    <div class="col-md-2 col-xs-12 pull-right" style="position:relative; right:5px">
                                        <button type="submit" class="btn btn-primary" style="margin-top:-5px">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class="col-md-5 col-xs-12 no-padding pull-right">
                                        <div class="form-check" style="margin-left:10px">
                                            <input style="width:20px; height:20px" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember" style="position: relative; top: -5px;">
                                                    {{ __('lables.remember')}}
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
        <div class="col-lg-6 col-lg-offset-3 extraBtns">
            <div class="card-body">
                <div class="form-group row" style="position:relative; left:4px">
                    <label for="password" class="col-md-6 col-form-label text-right">
                        {{-- {{ __('Password') }} --}}
                        Noch nicht registriert?
                         </label>
                    <div class="col-md-5  no-padding">
                        <a class="btn btn-primary" style="width:100%; margin-top:-5px" href="{{ route('register') }}">
                                ZUR REGISTRIERUNG
                            {{-- {{ __('Registrer your self ') }} --}}
                        </a>
                    </div>
                </div>
                <div class="form-group row"  style="position:relative; left:4px">
                    <label for="password" class="col-md-6 col-form-label text-right">
                        {{-- {{ __('Password') }} --}}
                        Passwort Vergessen?
                    </label>
                    <div class="col-md-5 no-padding">
                        @if (Route::has('password.request'))
                            <a class="btn btn-primary" style="width:100%; margin-top:-5px" href="{{ route('password.request') }}">
                                {{-- {{ __('Forgot Your Password?') }} --}}
                                ANFORDERN
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
@section('script')
<script>
     $(".form-control").on('focus',function(){
        $(".form-control").css('border','1px solid #ccc')
        var id = $(this).attr('id');
        $("#"+id).css('border','solid 1px green')
    }).focusout(function(){
        $(".form-control").css('border','1px solid #ccc')
    });
</script>
@endsection
@endsection
