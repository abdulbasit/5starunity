@extends('layouts.app')
@section('content')
@section('style')
<link rel="stylesheet" media="screen" href="{{ asset('frontend/wizard-form/css/screen.css')}}">
<style>
label{
    width:100%;
    margin:0px;
    padding:0px
}
.form-group
{
    /* margin-top:8px */
    margin-bottom: 8px
}
input[type="text"], input[type="password"], input[type="number"]
{
    margin-bottom:0px
}
.form-control
{
    height:50px !important;
    box-shadow: none !important
}
.button
{
    border: 1px solid black;
    color: black;
    border-radius: 100px;
    position: relative;
    margin-left: -200px;
    top: -18px;
    left: 50%;
}
.error{
    border:solid 1px red !important
}
</style>
@endsection

<div class="container-fluid">
        <div class="col-xs-12 contact_us_wrap">
            <fieldset>
                <div class="col-lg-10 fieldset-content col-lg-offset-1" style="background-image:url('{{ URL::to('/') }}/frontend/contact_form/images/bg-01.jpg'); background-size:cover">
                   <div class="row">
                    <form action="/send-query" method="POST" id="contact">
                        @csrf
                    <br />
                    <br />
                    <br />
                    <div class="contactForm">
                        <div class="section-title text-left col-xs-9" style="line-height:40px">…ob allgemeine (An)Fragen, Entwicklerthemen oder Partnergesuche - wir freuen uns </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-6 col-xs-12 contactForm">
                                
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name"></label>
                                    <input required placeholder="Name*" type="text" value="{{ old('fname') }}" class="form-control" name="name" id="name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="email"></label>
                                    <input required type="email" class="form-control" placeholder="E-Mail-Adresse*" name="email" value=""  id="email" style="font-size:18px"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="phone"></label>
                                    <input required type="text" class="form-control" placeholder="Telefonnummer" name="phone" id="phone" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="betreff"></label>
                                    <input required type="text" class="form-control" placeholder="Betreff*" name="betreff" value=""  id="betreff"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group form-password">
                                    <label for="msg"></label>
                                    <textarea required style="height:150px !important; font-size:18px" class="form-control" placeholder="Nachricht*" name="msg" id="msg"></textarea>
                                </div>
                            </div>
                            <div class="row contactFormNotice">
                                <p class="notice_form" style="color:#000; font-size:11px"> <font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="form-group form-password" >
                                <button  class="btn btn-primary button" type="submit" >NACHRICHT SENDEN</button>
                                </div>
                            </div>
                        </div>
                   </div>
                    </form>
                </div>

            </fieldset>
        </div>
    </div>
    @section('script')
    <script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>

<script>


    $(".form-control").on('focus',function(){
        $(".form-control").css('border','1px solid #ccc')
        var id = $(this).attr('id');
        $("#"+id).css('border','solid 1px green')
    }).focusout(function(){
        $(".form-control").css('border','1px solid #ccc')
    });
    // $.validator.setDefaults({
    //     submitHandler: function() {
    //         $("#contact").submit();
    //         return false;
    //     }
    // });
    $().ready(function() {
        // validate the form when it is submitted
        var validator = $("#contact").validate({
            errorPlacement: function(error, element) {
                $("#"+element.attr( "id" )).css('border','solid 1px red');
            },
            errorElement: "span",
            messages: {
                name: {
                    required: " required field"
                },
                email: {
                    required: " required field",

                },
                phone: {
                    required: " required field"
                },
                betreff: {
                    required: " required field"
                },
                msg: {
                    required: " required field"
                },
            }
        });

        $(".cancel").click(function() {
            validator.resetForm();
        });
    });
    </script>
    @endsection
@endsection
