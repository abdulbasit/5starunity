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
                <div class="col-lg-5 fieldset-content col-lg-offset-1">
                    <br />
                    <br />
                    <h3>…ob allgemeine (An)Fragen, Entwicklerthemen oder Partnergesuche - wir freuen uns </h3>
                    <br />
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="fname" class="form-label">Name <font color="red"> *</font></label>
                            <input required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="lname"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="email" class="form-label">Email Address <font color="red"> *</font></label>
                            <label id="email-error" class="error" for="email" style="display: none;"></label>
                            <input type="email" class="form-control" name="email" value=""  id="email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="email" class="form-label">Bettereff <font color="red"> *</font></label>
                            <input type="email" class="form-control" name="email" value=""  id="email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group form-password">
                            <label for="password" class="form-label">Message <font color="red"> *</font></label>
                            <textarea class="form-control" placeholder="Message" name="" id=""></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <p class="notice_form">*Angaben / Eingaben sind erforderlich </p>
                    </div>
                    <div class="row">
                        <div class="form-group form-password pull-right" style="margin-top:10px; margin-right:18px">
                          <button class="btn btn-primary" type="submit" >Send Message</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hidden-xs">
                        <br /><br />
                    <img class="img-responsive" src="{{ URL::to('/') }}/frontend/contact_form/images/bg-01.jpg">
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
