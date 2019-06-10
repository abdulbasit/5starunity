@extends('layouts.app')
@section('content')
@section('style')
<style>
.form-group
{
    margin-top:10px
}
input[type="text"], input[type="password"], input[type="number"]
{
    margin-bottom:0px
}
.form-control
{
    height:50px !important
}
.button
{
    border: 1px solid green;
    color: white;
    border-radius: 100px;
    background: green;
    position: relative;
    left: 50%;
    margin-left: -139px;
    top: -18px;
}
</style>
@endsection
<div class="container-fluid">
        <div class="col-xs-12 contact_us_wrap">
            <fieldset>
                <div class="col-lg-10 fieldset-content col-lg-offset-1" style="background-image:url('{{ URL::to('/') }}/frontend/contact_form/images/bg-01.jpg'); background-size:cover">
                   <div class="row">
                    
                    <br />
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 contactForm">
                                <br />
                                <br />
                                <div class="section-title text-left">…ob allgemeine (An)Fragen, Entwicklerthemen oder <br />- Partnergesuche  wir freuen uns </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <input required="required" placeholder="Name*" type="text" value="{{ old('fname') }}" class="form-control" name="fname" id="lname"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <input type="email" class="form-control" placeholder="E-Mail-Adresse*" name="email" value=""  id="email"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <input type="text" class="form-control" placeholder="Telefonnummer*" name="email" value=""  id="email"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <input type="text" class="form-control" placeholder="Betreff*" name="email" value=""  id="email"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group form-password">
                                    <textarea style="height:150px !important" class="form-control" placeholder="Nachricht*" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="row contactFormNotice">
                                <p class="notice_form" style="color:#000; font-size:11px"> <font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="form-group form-password" >
                                <button class="btn btn-primary button" type="submit" >NACHRICHT SENDEN</button>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>

            </fieldset>
        </div>
    </div>

@endsection
