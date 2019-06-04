@extends('layouts.app')
@section('content')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/css/main.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact_form/vendor/select2/select2.min.css')}}">
@endsection
<div class="container-fluid">
        <div class="col-xs-12 contact_us_wrap">
            <fieldset>
                <div class="col-lg-6 fieldset-content col-lg-offset-1">
                    <br />
                    <br />
                    <h3>…ob allgemeine (An)Fragen, Entwicklerthemen oder Partnergesuche - wir freuen uns </h3>
                    <br />
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="fname" class="form-label">{{ __('lables.first_name')}} <font color="red"> *</font></label>
                            <input required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="lname"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="mname" class="form-label">{{ __('lables.middle_name')}} </label>
                            <input type="text" value="{{ old('mname') }}" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" id="mname"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="lname" class="form-label">{{ __('lables.last_name')}} <font color="red"> *</font></label>
                            <input required="required" type="text" value="{{ old('lname') }}" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="lname"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="email" class="form-label">{{ __('lables.email')}} <font color="red"> *</font></label>
                            <label id="email-error" class="error" for="email" style="display: none;"></label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email"/>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group form-password">
                            <label for="password" class="form-label" style="margin-left:20px">{{ __('lables.password')}} <font color="red"> *</font></label>
                            <input required="required" type="password"  id="password" data-indicator="pwindicator" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />
                            <div id="pwindicator" style="width: 100px; height: 50px; top: 23px; position: relative;">
                                <div class="label1"></div>
                                <div class="bar-strength">
                                    <div class="bar-process">
                                        <div class="bar"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="notice_form">*Angaben / Eingaben sind erforderlich </p>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@section('script')
<script src="{{ asset('frontend/contact_form/vendor/animsition/js/animsition.min.js')}}"></script>
<script src="{{ asset('frontend/contact_form/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{ asset('frontend/contact_form/vendor/select2/select2.min.js')}}"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script src="{{ asset('frontend/contact_form/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{ asset('frontend/contact_form/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ asset('frontend/contact_form/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ asset('frontend/contact_form/js/main.js')}}"></script>

@endsection
@endsection
