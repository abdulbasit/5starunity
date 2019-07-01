@extends('layouts.app')
@section('content')
@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
.my-card
{
    position: relative;
    top: 35px;
    border-radius: 50%;
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
    width: 75px;
    height: 75px;
    padding: 0px;
    text-align: center;
    padding-top: 22px;
    left: 50%;
    box-shadow: 1px 5px 7px #CCC;
    margin-left: -35px
}
</style>
@endsection
<div class="container">
    <div class="row profile">
         @include('../layouts.user_menu')
         <div class="col-md-9 prof">
            <div class="checkout-panel">
                @if(Session::get('success')!="")
                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div id="historyTable">
                    <h3>Your Lots</h3>
                    <div class="" style="background:none">
                        <div class="row w-100">
                            <div class="col-md-4">
                                <div class="card border-info shadow text-info p-3 my-card" >
                                    <span class="fa fa-money" aria-hidden="true">
                                        <img src="">
                                    </span>
                                </div>
                                <div class="card border-info mx-sm-1 p-3 card_stats">
                                    <div style="margin-top: 15px; float: left; width: 100%;">
                                        <div class="text-info text-center col-xs-12">Available Balance--</div>
                                        <div class="text-info text-center col-xs-12">234</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-info shadow text-info p-3 my-card" >
                                    <span class="fa fa-bar-chart" aria-hidden="true"></span>
                                </div>
                                <div class="card border-info mx-sm-1 p-3 card_stats">
                                    <div style="margin-top: 15px; float: left; width: 100%;">
                                        <div class="text-info text-center col-xs-12">Purchased Lots</div>
                                        <div class="text-info text-center col-xs-12">234</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-info shadow text-info p-3 my-card" >
                                    <span class="fa fa-minus-square-o" aria-hidden="true"></span>
                                </div>
                                <div class="card border-info mx-sm-1 p-3 card_stats">
                                    <div style="margin-top: 15px; float: left; width: 100%;">
                                        <div class="text-info text-center col-xs-12">
                                            Total Spent
                                        </div>
                                        <div class="text-info text-center col-xs-12">234</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
</div>
@endsection
