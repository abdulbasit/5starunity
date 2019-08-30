@extends('layouts.app')
@section('content')
@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
</style>
@endsection
@section('script')
<script>
@if($action=='purchase')
{
    $( document ).ready(function() {
        jQuery(function(){
            jQuery('#btnPurchaseCredit').click();
        });
    });
}
@endif

$("#btnPurchaseCredit").click(function(){
    $( "#historyTable" ).fadeOut( "slow", function() {
        $("#paymentOptions").fadeIn("slow",function(){
            $("#btnPurchaseCredit").fadeOut("fast",function(){
                $("#viewHistory").fadeIn();
            });
        });
    });
});
$("#viewHistory").click(function(){
    $( "#paymentOptions" ).fadeOut( "slow", function() {
        $("#historyTable").fadeIn("slow",function(){
            $("#viewHistory").fadeOut("fast",function(){
                $("#btnPurchaseCredit").fadeIn();
            });
        });
    });
});
$(".method").click(function(){
    var paymentMethod = $(this).attr('id');

        $(".method").removeClass('method-selected');
        $(this).addClass('method-selected');
        if(paymentMethod=='credit-card')
        {
            $(".creditFormWrap").fadeIn("slow",function(){
                $("#payBtn").attr('type','button');
                $("#payBtn").attr('onclick','credit_card()');
                $("#creditCard").css('display','block');
                $("#creditCard :input").prop("disabled", false);
                $("#creditPForm :input").attr("action","");
            });
        }
        else if(paymentMethod=='paypal')
        {
            $(".creditFormWrap").fadeIn("slow",function(){
                $("#creditPForm").attr("action","/balance/purchase");
                $("#creditCard").css('display','none');
                $("#creditCard :input").prop("disabled", true);
                $("#payBtn").attr('type','submit');
                $("#payBtn").attr('onclick','');
            });
        }
});
$(".paymehnt_close").click(function(){
    $(".creditFormWrap").fadeOut("fast",function(){
        $(".method").removeClass('method-selected');
    });
});
function credit_card()
{
    $("#creditForm").css('opacity','0.5');
    $("#creditPForm :input").prop("disabled", true);


      var credit = $("#credit").val();
      var card_number = $("#card_number").val();
      var expiration = $("#expiration").val();
      var cvv = $("#cvv").val();
      var fname = $("#fname").val();
      var lname = $("#lname").val();

      var values = [credit,card_number,expiration,cvv,fname,card_type,lname ];
      payment_form_validation(values);
      var card_type = GetCardType(card_number);
      $.ajax({
            method: "POST",
            url: "{{route('credit_card')}}",
            data: { "_token": "{{ csrf_token() }}",credit: credit , card_number:card_number,expiration:expiration,
                    cvv:cvv,fname:fname,card_type:card_type,lname:lname }
        }).done(function( msg ) {
            $("#creditForm").css('opacity','1');
            $("#creditPForm :input").prop("disabled", false);
            if(msg=='success')
            {
                $("#msg").html('Payment Success');
                $("#msg").addClass('success_msg');
            }
            setTimeout(function(){
                window.location="/wallet";
             }, 1000);
        }).fail(function() {

            $("#creditForm").css('opacity','1');
            $("#creditPForm :input").prop("disabled", false);
            $("#msg").html('Payment Unsuccessfull. Please try with correct information!');
            $("#msg").addClass('error_msg');
        });
}
function filter(type)
{
    window.location="/wallet/filter/"+type
}
$("#buyLot").click(function (){
    window.location="/lotteries";
})
</script>
@endsection

<div class="container">
    <div class="row profile">
         @include('../layouts.user_menu')
         <div class="col-md-9 prof">
             <div class="row">
                 {{$action}}
                 @if($type=='lot')
                    <h4 class="no-padding pull-left">Transaction History</h4>
                 @elseif($type=='credit')
                    <h4 class="no-padding pull-left">Credit History</h4>
                 @elseif($type=='bonus')                   
                    <h4 class="no-padding pull-left">Bonus Talers</h4>
                @endif
                <button id="buyLot" class="btnPurchaseCredit pull-right" type="button"> + Buy Lot </button>
                <button id="btnPurchaseCredit" class="btnPurchaseCredit pull-right" type="button"> + Donate </button>
                <div class="dropdown show pull-right dropDownMenu">
                    <a style="padding-left:15px;padding-right:15px; text-decoration:none" class="btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Results
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <ul>
                            {{-- <li onclick="filter('all')">
                                All
                            </li> --}}
                            
                            <li onclick="filter('credit')">
                                Credit History
                            </li>
                            <li onclick="filter('lot')">
                                Lots History
                            </li>
                            <li onclick="filter('bonus')">
                                Bonus History
                            </li>
                        </ul>
                    </div>
                </div>
             </div>
            <div class="checkout-panel">
                @if(Session::get('success')!="")
                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div id="historyTable" @if($action=='purchase') style="display: none"@endif>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th class="text-center">Transaction Type </th>
                            <th class="text-center">Transaction </th>
                            {{-- <th class="text-center">Balance</th> --}}
                            <th class="text-center">Available Balance</th>
                            <th class="text-center">Purchased Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($walletHistory as $key => $history)
                            @if($key==0)
                                <tr style="background-color:#fde9ec">
                            @else
                                <tr>
                            @endif

                            @if($history->credit!='0')
                                <td>Credit Donated</td>
                            @else($history->credit>='0')
                                <td>Lottery Purchased</td>
                            {{-- @elseif($history->credit=='0.00' && $history->type=='bonus')
                                <td>Bonus Talers</td>
                            @elseif($history->credit!='0.00' && $history->type=='bonus')
                                <td>Bonus Talers</td> --}}
                            @endif
                                <td>{{$history->balance}}</td>
                                <td>{{$history->total_available_balance}}</td>
                                <td>{{Carbon\Carbon::parse($history->created_at)->toFormattedDateString()}}</td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-body " id="paymentOptions" style="display:none">
                    <div id="paypal-button-container"></div>
                    <form action="" method="post" id="creditPForm">
                        @csrf
                    <div class="creditFormWrap">
                        <span class="pull-right paymehnt_close">Close</span>
                        <label class="text-left col-lg-8 col-xs-12" id="creditForm">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="credit_warp">
                                        <label>CREDIT</label>
                                        <input type="number" onkeypress="validate(event,'credit_warp')" name="credit" id="credit" placeholder="Enter Amount e.g.(20 &euro;)" />
                                    </div>
                                </div>
                            </div>
                            <div id="creditCard">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="">
                                                <label>CARD NUMBER</label>
                                                <div class="card_number_wrap">
                                                    <input type="text" onkeypress="validate(event,'card_number_wrap')" id="card_number" name="card_number" class="" placeholder="Valid Card Number" />
                                                    <span id="error_card" ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-7">
                                            <div class="exp_wrap">
                                                <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                <input type="text" onkeypress="validate(event,'exp_wrap')" id="expiration" name="expiration" class="" placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="cvv_wrap">
                                                <label>CV CODE</label>
                                                <input type="text" id="cvv" onkeypress="validate(event,'cvv_wrap')" name="cvv" class="" placeholder="CVC" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-7">
                                            <div class="fname_wrap">
                                                <label>FIRST NAME</label>
                                                <input type="text" onkeypress="validate(event,'fname_wrap')" id="fname" name="fname" class="" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="lname_wrap">
                                                <label>LAST NAME</label>
                                                <input type="text" onkeypress="validate(event,'lname_wrap')" id="lname" name="lname" class="" placeholder="Last Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div id="msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="">
                                    <input id="payBtn" type="button" onclick="credit_card()" class="btnPurchaseCredit pull-right" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </form>
                    <div class="payment-method" >
                        {{-- <div class="row"> --}}
                            <label for="paypal" class="method card " id="paypal">
                                <div class="card-logos">
                                    <img src="{{ URL::to('/') }}/frontend/img/paypal_logo.png"/>
                                </div>

                                <div class="radio-input">
                                    <input class="hidden" id="paypal" type="radio" name="payment">
                                    Pay with paypal
                                </div>
                            </label>

                            <label for="card" class="method card" id="credit-card">
                                <div class="card-logos">
                                    <img src="{{ URL::to('/') }}/frontend/img/visa_logo.png"/>
                                    <img src="{{ URL::to('/') }}/frontend/img/mastercard_logo.png"/>
                                </div>
                                <div class="radio-input">
                                    <input id="card" type="radio" name="payment" class="hidden">
                                    Pay with credit card
                                </div>
                            </label>
                        {{-- </div> --}}
                        {{-- <div class="row">
                            <label for="card" class="method card" id="credit-card">
                                <div class="card-logos">
                                    <img src="{{ URL::to('/') }}/frontend/img/visa_logo.png"/>
                                    <img src="{{ URL::to('/') }}/frontend/img/mastercard_logo.png"/>
                                </div>
                                <div class="radio-input">
                                    <input id="card" type="radio" name="payment" class="hidden">
                                    Pay with credit card
                                </div>
                            </label>
                        </div> --}}
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
