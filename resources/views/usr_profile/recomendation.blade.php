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
.form-group label
{
    padding-top:5px
}
</style>
@endsection
<br />
<br />
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
                {{-- <h2 class="text-center registerHeading">{{ __('Login') }}</h2> --}}
            
            <div class="card-body">
               
                <form method="POST" action="{{ route('recomendations.save') }}" id="login">
                    @csrf
                    <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                
                            </label>
                            <div class="col-md-8 col-sm-7">
                                <p>
                                    Wir freuen uns, dass Sie uns helfen möchten die Community und ihre Partner
                                    zu erweitern und bitten darum folgende Angaben zu ergänzen:
                                </p>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                {{ __('lables.first_name')}} <span style="color:red">*</span>
                        </label>
                        <div class="col-md-8 col-sm-7">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="function" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                {{ __('lables.function')}} <span style="color:red">*</span>
                        </label>
                        <div class="col-md-8 col-sm-7">
                            <input id="function" type="text" class="form-control" name="function" value="{{ old('function') }}" required >
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="company" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                    {{ __('lables.company')}} <span style="color:red">*</span>
                            </label>
                            <div class="col-md-8 col-sm-7">
                                <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" required >                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                    {{ __('lables.email')}} <span style="color:red">*</span>
                            </label>
                            <div class="col-md-8 col-sm-7">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top:25px">
                            <label for="extra_comments" class="col-md-4 col-sm-3 col-form-label text-right"  style="margin-top:2px">
                                    {{ __('lables.extra_comments')}} <span style="color:red">*</span>
                            </label>
                            <div class="col-md-8 col-sm-7">
                                <textarea id="comments" class="form-control" rows="6" name="comments" required ></textarea>
                                <p><span style="color:red">*</span> Angaben / Eingaben sind erforderlich</p>
                            </div>
                            
                        </div>
                    <div class="form-group row">
                    </div>
                    <div class="form-group row mb-0">
                        <div class="row">
                            <div class="col-xs-12" id="logBtnWrap">
                                <div class="pull-right" style="width:100%">
                                    <div class="col-md-2 col-sm-3 col-xs-4 pull-right" style="position:relative; right:5px">
                                        <button type="submit" class="btn-green" style="margin-left:15px">
                                            {{ __('lables.send') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="col-lg-3 col-lg-offset-1 hidden-xs hidden-md">
            <br />
            <br /><br /><br /><br /><br /><br />
            <img class="img-responsive" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/recmondatinos.png">
        </div>
    </div>
    <br />
        <div class="row ">
            <div style="margin-left:30px">
                <p>
                        Ihre Empfehlung wird von unserer internen Abteilung Marketing, Relationship and Communication kontaktiert.
                        Wir bitten um Beachtung, dass zur Wahrung der Transparenz auf Sie als Empfehlungsgeber hingewiesen wird
                        und bedanken uns im Voraus für Ihre Mühe, das entgegengebrachte Vertrauen und die Treue zur Community.
                </p>
            </div>
        </div>
        <br />
</div>


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