@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/wizard-form/css/style.css')}}">
<style>
.fieldset-content
{
    height: auto !important;

}
.label {
    font-size: 13px;
    font-weight: normal;
}
label{
    width:175px !important
}
.actions ul li a
{
    border: solid 1px #000;
    color: black;
    border-radius: 100px;
    background: none
}
.actions ul li a:hover
{
    border: solid 1px #000;
    color: white;
    border-radius: 100px;
    background-color:black
}
label.error
{
    right:10px
}
#val
{
    height: 35px;
    width: 100%
}
#val1
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
}
#val2
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;

}
input[type='file']
{
    height: 35px;
    width: 100% !important
}
#button
{
    height: 35px;
    z-index: -1000;
}
#button1
{
    height: 35px;
    cursor: pointer;
    background: #f8f8f8;
    color: #999;
    position: absolute;
    right: 0;
    top: 0;
    font-size: 14px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    z-index: -1000;
    width: 125px;
    padding-top: 4px;
}
#button2
{
    height: 35px;
    width: 125px;
    padding-top: 4px;
    cursor: pointer;
    background: #f8f8f8;
    color: #999;
    position: absolute;
    right: 0;
    top: 0;
    font-size: 14px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    z-index: -1000;
}
.form-file
{
    width: 100%
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
.actions ul li a
{
    height: 40px;
}
label.error {
    right: 10px;
    width: 100%;
    text-align: right;
}
</style>
@endsection
@section('content')
<div class="main">
        <div class="container">
            <h2 class="text-center">Sign up to great new account </h2>
            <br />
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" action="{{ route('register.save') }}">
                @csrf
                <h3>
                    <span class="title_text">Account Infomation</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="fname" class="form-label">First Name <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="lname" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="mname" class="form-label">Middle Name </label>
                                <input type="text" value="{{ old('mname') }}" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" id="mname" placeholder="Middle Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="lname" class="form-label">Last Name <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('lname') }}" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="lname" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="email" class="form-label">Email <font color="red"> *</font></label>
                                <label id="email-error" class="error" for="email" style="display: none;"></label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" placeholder="Your Email" />
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group form-password">
                                <label for="password" class="form-label" style="margin-left:23px">Password <font color="red"> *</font></label>
                                <input required="required" type="password"  id="password" data-indicator="pwindicator" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />
                                <div id="pwindicator">
                                    {{-- <div class="bar-strength">
                                        <div class="bar-process">
                                            <div class="bar"></div>
                                        </div>
                                    </div> --}}
                                    <div class="label"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fieldset-footer">
                        &nbsp; {{-- <span>Step 1 of 2</span> --}}
                    </div>
                </fieldset>
                <h3>
                    <span class="title_text">Personal Information</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="dob" class="form-label">Date of Birth <font color="red"> *</font></label>
                                <label id="dob-error" class="error" for="dob" style="display: none;"></label>
                                <input onchange="calcAge()" required="required" type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth (DD.MM.YYYY)" />
                            </div>
                            <div class="error_msg" id="dobMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="dob" class="form-label">Country <font color="red"> *</font></label>
                                <select name="country" id="country" onchange="getCountrySates()" class="form-control" required="required">
                                    <option >----Select Country----</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country->id}}">{{$country->country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-select">
                                <label for="country" class="form-label" style="width:183px !important">Postal Code / City <font color="red"> *</font></label>
                                <div class="row" style="width:100%">
                                    <div class="col-lg-5 col-xs-12">
                                        <input required="required" type="text" class="form-control" name="city" id="city" placeholder="City" />
                                    </div>
                                    <div class="col-lg-4 col-xs-12 no-padding">
                                        <input required="required" type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="address" class="form-label">Address <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="address" id="address" placeholder="Address" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-select">
                                <label for="country" class="form-label">House # / Street # <font color="red"> *</font></label>
                                <div class="row" style="width:100%">
                                    <div class="col-lg-5 col-xs-12">
                                        <input required="required" type="text" class="form-control" name="hnumber" id="hnumber" placeholder="Enter House Number" />
                                    </div>
                                    <div class="col-lg-4 col-xs-12 no-padding">
                                        <input required="required" type="text" class="form-control" name="street_n" id="street_n" placeholder="Enter Street Number" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-select">
                                <label for="country" class="form-label">Contact Number <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">Select Avatar</label>
                                <div class="form-file" id="id_card">
                                    <input type="file" name="profile_pic" id="profile_pic" class="custom-file-input form-control" />
                                    <span id='val'></span>
                                    <span id='button'>Select File</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">Identity Proof <font color="red"> *</font></label>
                                <div class="form-file" id="id_prrof">
                                    <input type="file" multiple="multiple" name="identity_card[]"  id="identity_card" class="custom-file-input form-control" />
                                    <span id='val2' class="idImg"></span>
                                    <span id='button2'>Select File</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fieldset-footer">
                        &nbsp;
                        {{-- <span>Step 2 of 2</span> --}}
                    </div>
                </fieldset>
                {{-- <h3 style="display:none">
                    <span class="title_text">Documents</span>
                </h3> --}}
                {{-- <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">Resident Proof</label>
                                <div class="form-file" id="resd_proof">
                                    <input type="file" multiple="multiple" name="resident_proof[]" id="resident_proof" class="custom-file-input form-control" />
                                    <span id='val1' class="resImg"></span>
                                    <span id='button1'>Select File</span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="fieldset-footer">
                        <span>Step 3 of 3</span>
                    </div>
                </fieldset> --}}
            </form>
            <input type="hidden" name="csToken" id="csToken" value="{{ csrf_token() }}">
        </div>
    </div>
<br />
@section('script')
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/js/main.js')}}"></script>
<script>
$( document ).ready(function() {
    $(".actions ul li:nth-child(2) a").css('display','none');
    $(".actions ul li:nth-child(2) ").append('<a id="validation" href="#" onclick="check_email()">Next</a>');
});

function check_email()
    {
        $("input").prop('disabled', true);
        $.ajax({
            method: "POST",
            url: "/check_email",
            data: { "_token":$("#csToken").val(),email: $("#email").val() }
        })
        .done(function( msg )
        {
            $("input").prop('disabled', false);
            if(msg=="error")
            {
                $("#email").addClass('error');
                $("#email-error").css('display','block');
                $("#email-error").html('email already register')
                return false;
            }
            else
            {

                $("#validation").remove();
                $(".actions ul li:nth-child(2) a").css({
                    'display': 'block',
                    'padding-top': '5px',
                    'text-align':'center'
                    });
                $("#validation").removeAttr("onclick");
                setTimeout(function(){
                    $(".actions ul li:nth-child(2) a").click();

                },500);

                $("#email").removeClass('error')
            }
        });
    }
function getCountrySates()
{
    var country_id = $( "#country option:selected" ).attr('value');
    $.ajax({
        method: "POST",
        url: "ajax/states",
        data: { "_token": "{{ csrf_token() }}",country_id: country_id}
        })
        .done(function( msg ) {
           $("#state").html(msg);
        });
}
function calcAge()
{
    var dateOfBirth = $("#dob").val();
    dateOfBirth = dateOfBirth.split('-');
    // dateOfBirth[2],dateOfBirth[1],dateOfBirth[0]
    var age = calculateAge(dateOfBirth[1], dateOfBirth[0], dateOfBirth[2]);
    if(age<18)
    {
        setTimeout(function(){
            $("#dob").addClass('error');
            $("#dob-error").css('display','block');
            $("#dob-error").html('You must be 18+');
        },1000);
    }
    else
    {
        $("#dob-error").css('display','none');
        $("#dob-error").html(' ');
        $("#dob").removeClass('error');
    }
}
function calculateAge(birthMonth, birthDay, birthYear) {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
    var calculatedAge = currentYear - birthYear;

    if (currentMonth < birthMonth - 1) {
        calculatedAge--;
    }
    if (birthMonth - 1 == currentMonth && currentDay < birthDay)
    {
        calculatedAge--;
    }
        return calculatedAge;
    }
</script>
@endsection
@endsection
