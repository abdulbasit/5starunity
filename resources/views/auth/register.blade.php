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
    width: 100%
}
#val2
{
    height: 35px;
    width: 100%
}
input[type='file']
{
    height: 35px;
    width: 100%
}
#button
{
    height: 35px;
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
</style>
@endsection
@section('content')
<div class="main">

        <div class="container">
            <h2 class="text-center">Sign up to great new account </h2>
            <br />
            <form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}">
                    @csrf
                <h3>
                    <span class="title_text">Account Infomation</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="name" class="form-label">Complete Name</label>
                                <input required="required" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="User Name" />
                            </div>
                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="name" class="form-label">Complete Name</label>
                                <input required="required" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="User Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" placeholder="Your Email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group form-password">
                                <label for="password" class="form-label" style="margin-left:23px">Password</label>
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
                        <span>Step 1 of 3</span>
                    </div>
                </fieldset>
                <h3>
                    <span class="title_text">Personal Information</span>
                </h3>
                <fieldset>

                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input required="required" type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth (DD-MM-YYYY)" />
                            </div>
                            <div class="error_msg" id="dobMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="address" class="form-label">Address</label>
                                <input required="required" type="text" class="form-control" name="address" id="address" placeholder="Address" />
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-select">
                            <label for="country" class="form-label">Country</label>
                            <div class="row" style="width:100%">
                                <div class="col-lg-3 col-xs-12">
                                <select name="country" id="country" class="form-control" required="required">
                                    <option value="">Country</option>
                                    <option value="Australia">Australia</option>
                                    <option value="USA">America</option>
                                </select>
                                </div>
                                <div class="col-lg-3 col-xs-12">
                                    <select name="state" id="state" class="form-control" required="required">
                                        <option value="">State</option>
                                        <option value="Australia">Australia</option>
                                        <option value="USA">America</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-xs-12">
                                    <input required="required" type="text" class="form-control" name="city" id="city" placeholder="City" />
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-select">
                                <label for="country" class="form-label">Postal Code </label>
                                <input required="required" type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" />
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
                    </div>
                    <div class="fieldset-footer">
                        <span>Step 2 of 3</span>
                    </div>
                </fieldset>
                <h3>
                    <span class="title_text">Documents</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        {{-- <div class="form-radio">
                            <label for="payment_type">Payment Type</label>
                            <div class="form-radio-flex">
                                <input type="radio" name="payment_type" id="payment_visa" value="payment_visa" checked="checked" />
                                <label for="payment_visa"><img src="images/icon-visa.png" alt=""></label>

                                <input type="radio" name="payment_type" id="payment_master" value="payment_master" />
                                <label for="payment_master"><img src="images/icon-master.png" alt=""></label>

                                <input type="radio" name="payment_type" id="payment_paypal" value="payment_paypal" />
                                <label for="payment_paypal"><img src="images/icon-paypal.png" alt=""></label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="credit_card" class="form-label">Credit Card</label>
                                <input type="text" name="credit_card" id="credit_card" />
                            </div>
                            <div class="form-group">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" name="cvc" id="cvc" />
                            </div>
                        </div>
                        <div class="form-date">
                            <label for="expiry_date">Expiration Date</label>
                            <div class="form-flex">
                                <div class="form-date-item">
                                    <select id="expiry_date" name="expiry_date"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_year" name="expiry_year"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name_of_card" class="form-label">Name of card</label>
                            <input type="text" name="name_of_card" id="name_of_card" />
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">Resident Proof</label>
                                <div class="form-file" id="resd_proof">
                                    <input type="file" multiple="multiple" name="resident_proof" id="resident_proof" class="custom-file-input form-control" />
                                    <span id='val' class="resImg"></span>
                                    <span id='button'>Select File</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">Identity Proof</label>
                                <div class="form-file" id="id_prrof">
                                    <input type="file" multiple="multiple" name="identity_card"  id="identity_card" class="custom-file-input form-control" />
                                    <span id='val' class="idImg"></span>
                                    <span id='button'>Select File</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="fieldset-footer">
                        <span>Step 3 of 3</span>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
{{-- <div class="container">
    <div class="row">
        <div class="col-lg-9 col-xs-12 col-lg-offset-2">
            <div class="card-header text-center"><h3>{{ __('Register') }}</h3><br /></div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<br />
@section('script')
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/js/main.js')}}"></script>
<script>
today = new Date()
past = new Date(2010,05,01) // remember this is equivalent to 06 01 2010
//dates in js are counted from 0, so 05 is june

function calcDate(date1,date2) {
    var diff = Math.floor(date1.getTime() - date2.getTime());
    var day = 1000 * 60 * 60 * 24;

    var days = Math.floor(diff/day);
    var months = Math.floor(days/31);
    var years = Math.floor(months/12);

    var message = date2.toDateString();
    message += " was "
    message += days + " days "
    message += months + " months "
    message += years + " years ago \n"

    return message
    }


a = calcDate(today,past)
console.log(a) // returns Tue Jun 01 2010 was 1143 days 36 months 3 years ago
</script>
@endsection
@endsection
