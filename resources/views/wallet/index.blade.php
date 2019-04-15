
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
<div class="container">
    <div class="row profile">
         @include('../layouts.user_menu')
         <div class="col-md-9 prof">
             <div class="row">
                <h4 class="no-padding pull-left">Wallet</h4>
                <button id="btnPurchaseCredit" class="btnPurchaseCredit pull-right" type="button"> + Purchase Credit </button>
                <button id="viewHistory" class="btnPurchaseCredit pull-right" style="display:none" type="button"> Viwe History </button>
             </div>
            <div class="checkout-panel">
                <div id="historyTable">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Purchased Credit</th>
                            <th>Balance</th>
                            <th>Available Balance</th>
                            <th>Purchased Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($walletHistory as $history)
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                                <td>john@example.com</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-body " id="paymentOptions" style="display:none">
                    <div id="paypal-button-container"></div>
                    <form action="{{route('credit_card')}}" method="post">
                        @csrf
                    <div class="creditFormWrap">
                        <span class="pull-right paymehnt_close">Close</span>
                        <label class="text-left col-lg-8 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CREDIT</label>
                                        <input type="text" name="credit" id="credit" placeholder="Enter Amount e.g.(20 &euro;)" />
                                    </div>
                                </div>
                            </div>
                            <div id="creditCard">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>CARD NUMBER</label>
                                                <div class="">
                                                    <input type="text" id="card_number" name="card_number" class="" placeholder="Valid Card Number" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-7">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                <input type="text" id="expiration" name="expiration" class="" placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label>CV CODE</label>
                                                <input type="text" id="cvv" name="cvv" class="" placeholder="CVC" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-7">
                                            <div class="form-group">
                                                <label>FIRST NAME</label>
                                                <input type="text" id="fname" name="fname" class="" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label>LAST NAME</label>
                                                <input type="text" id="lname" name="lname" class="" placeholder="Last Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                              <input type="submit" onclick="credit_card()" class="btnPurchaseCredit pull-right" value="Submit" />
                                            </div>
                                        </div>
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
@section('script')
<script>
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
            // alert('dd');
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

      var amount = $("#credit").val();
      var card_number = $("#card_number").val();
      var expiration = $("#expiration").val();
      var cvv = $("#cvv").val();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var card_type = GetCardType(card_number);
      $.ajax({
            method: "POST",
            url: "{{route('credit_card')}}",
            data: { "_token": "{{ csrf_token() }}",amount: amount , card_number:card_number,expiration:expiration,
                    cvv:cvv,fname:fname,card_type:card_type,lname:lname }
        }).done(function( msg ) {
            console.log(msg)
            // $("#errorLots").html(msg);
        });
}
</script>
@endsection
