@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/wizard-form/css/style.css')}}">
<style>
.bar-strength
{
    width: 100% !important;
    height: 7px !important;
    position: unset  !important;
}
.fieldset-content
{
    height: auto !important;
}
help{
    float: left;
    width: 100%;
    font-size: 12px;
    text-align: center;
    color: #888;
}
.label {
    font-size: 13px;
    font-weight: normal;
    width:230px !important
}
.actions ul li a
{
    border: 1px solid rgb(225, 225, 225);
    color: black;
    border-radius: 100px;
    background: none
}
.actions ul li a:hover
{
    border: 1px solid green;
    color: white;
    border-radius: 100px;
    background-color:green
}
label.error
{
    right:10px;
    border:none
}
#val
{
    height: 35px;
    width: 100%
}
.title
{
    margin-bottom: 0px
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
#val3
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
#val4
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

.form-group rp
{
    border: 0px white !important;
    display: none !important

}
.form-group input.error{
    border:solid 1px red !important
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
    width: auto;
    text-align: right;
}
.terms_cond
{
    height: 400px;
    overflow: auto;
}
.actions
{
    position: relative !important;
    bottom: -10px !important
}
.fieldset-content
{
    padding-right: 15px !important
}

</style>
@endsection
@section('content')
<div class="main">
       
        <div class="container">
            <h2 class="text-center registerHeading">{{ __('content.register_heading')}}  </h2>
            <br />
            <form method="POST" id="signup-form" class="" enctype="multipart/form-data" action="{{ route('register.save') }}">
                @csrf
                <input type="hidden" name="invitee" value="{{$invitee}}">
                <h3>
                    <span class="title_text">{{ __('content.accunt_information')}} </span>
                </h3>
                <fieldset>
                    <div class="col-lg-7 fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="fname" class="form-label">{{ __('lables.first_name')}} <font color="red"> *</font></label>
                                <input autofocus required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="fname"/>
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
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" onchange="check_email()"/>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group form-password" style="margin:0px">
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
                            <div class="col-xs-12 form-group" style="margin:0px">
                                <label for="email" class="form-label"></label>
                                <p style="font-size:11px; width:100%; line-height:20px">
                                    Wir empfehlen mind. acht Charakter und dabei einen Groß- / Kleinbuchstaben, <br />Ziffern und zwei Sonderzeichen.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="email" class="form-label"></label>
                                <p  style="font-size:11px; width:100%"><font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 hidden-xs hidden-md">
                        <br />
                        <img class="img-responsive" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/1regsiter.png">
                    </div>
                    {{-- <div class="fieldset-footer">
                        &nbsp; <span>Step 1 of 2</span>
                    </div> --}}
                </fieldset>
                <h3>
                    <span class="title_text">{{ __('content.personal_information')}}</span>
                </h3>
                <fieldset>
                    <div class="col-lg-7">
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.dob')}} <font color="red"> *</font></label>
                                <label id="dob-error" class="error" for="dob" style="display: none;"></label>
                                <input onchange="calcAge()" required="required" type="text" class="form-control" name="dob" id="dob" placeholder="(TT.MM.JJJJ)" />
                            </div>
                            <div class="error_msg" id="dobMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.country')}} <font color="red"> *</font></label>
                                <select name="country" id="country" onchange="getCountrySates()" class="form-control" required="required" style="margin-bottom:15px">
                                    <option >----{{ __('lables.selct_country')}}----</option>
                                    <option value="14">Österreich</option>
                                    <option value="82">Deutschland</option>
                                    {{-- @foreach($countries as $country)
                                        
                                        <option value="{{$country->country->id}}">{{$country->country->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-select">
                                <label for="country" class="form-label marginLabel">{{ __('lables.city')}} / {{ __('lables.postal_code')}} <font color="red"> *</font></label>
                                <div class="row" style="width:100%; margin:0px">
                                    <div class="col-lg-7 col-xs-12 paddingZero postaFields">
                                        <input required="required" type="text" class="form-control" name="city" id="city"/>
                                    </div>
                                    <div class="col-lg-3 col-xs-12 paddingZero stateMargin ">
                                        <input required="required" type="text" class="form-control" name="postal_code" id="postal_code"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="address" id="address"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="country" class="form-label">{{ __('lables.house_number')}}<font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="hnumber" id="hnumber" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address2')}} </label>
                                <input  type="text" class="form-control" name="address2" id="address2"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-select">
                                <label for="country" class="form-label">{{ __('lables.phone_number')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="phone" id="phone"/>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof">{{ __('lables.avatar')}} &nbsp; &nbsp;</label>
                                <div class="form-file" id="id_card">
                                    <input type="file" name="profile_pic" id="profile_pic" class="custom-file-input form-control" />
                                    <span id='val'></span>
                                    <span id='button1'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof" >{{ __('lables.identity_proof')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof">
                                    <input required="required" type="file" multiple="multiple" name="identity_card[]"  id="identity_card" class="custom-file-input form-control" />
                                    <span id='val2' class="idImg"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof">{{ __('lables.id_front')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_front">
                                    <input required="required" type="file" name="identity_card_front"  id="identity_card_front" class="custom-file-input form-control" />
                                    <span id='val3' class="idImg1"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group" style="margin:0px">
                                <label for="profile_pic" class="form-label addressProof" >{{ __('lables.id_back')}}<font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_bck">
                                    <input required="required" type="file" name="identity_card_back"  id="identity_card_back" class="custom-file-input form-control" />
                                    <span id='val4' class="idImg2"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="email" class="form-label"></label>
                                <p  style="font-size:11px; width:100%"><font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="fieldset-footer">
                        &nbsp;
                        <span>Step 2 of 2</span>
                    </div> --}}

                    </div>
                    <div class="col-lg-3 col-lg-offset-1 hidden-xs hidden-md">
                        <br />
                        <img class="img-responsive" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/1regsiter.png">
                    </div>

                </fieldset>

                <h3 style="display:none">
                    <span id="title_id_3" class="title_text">{{ __('content.terms_cond')}}</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 terms_cond" id="terms">
                                {!!$page->page_content!!}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <input type="hidden" name="csToken" id="csToken" value="{{ csrf_token() }}">
        </div>
    </div>
<br />
<br />
<br />
<input type="hidden" id="newindex" name="">
@section('script')
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/js/main.js')}}"></script>
<script>
// $( document ).ready(function() {
//     $(".actions ul li:nth-child(2) a").css('display','none');
//     $(".actions ul li:nth-child(2) ").append('<a id="validation" href="#" onclick="check_email()">Next</a>');
// });
$(document).ready(function(){
    setTimeout(function(){
        document.getElementById("fname").focus(); 
    },1000)
});
$(".form-control").on('focus',function(){
        $(".form-control").css('border','1px solid #ccc')
        var id = $(this).attr('id');
        $("#"+id).css('border','solid 1px green')
    }).focusout(function(){
        $(".form-control").css('border','1px solid #ccc')
    });
function check_email()
    {
        var email = $("#email").val();
        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

        var emailFormat = re.test($("#email").val());// this return result in boolean type
        
        if (emailFormat===false) {
            $("#email").addClass('error');
            $("#email-error").css('display','block');
            $("#email-error").html('Invalid Email ');
            $(".actions ul li:nth-child(2) a").removeAttr('href');
            return false;
        }

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
                $("#email-error").html('email already register');
                $(".actions ul li:nth-child(2) a").removeAttr('href');
                return false;
            }
            else
            {
                $("#validation").remove();
                $("#email-error").css('display','none');
                    $(".actions ul li:nth-child(2) a").attr('href','#next');
                $("#validation").removeAttr("onclick");
                // setTimeout(function(){
                //     $(".actions ul li:nth-child(2) a").click();

                // },500);

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
    dateOfBirth = dateOfBirth.split('.');
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
function calculateAge(birthMonth, birthDay, birthYear)
{
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
    var calculatedAge = currentYear - birthYear;

    if (currentMonth < birthMonth - 1)
    {
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
