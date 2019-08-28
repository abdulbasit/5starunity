@extends('layouts.app')
@section('style')
    <style>
        .card{
            width:100%;
            border:0px;
            margin-top: 0px
        }
        .add-to-cart
        {
            background-color:green;
            color:white;
            border-radius:100px
        }
        .add-to-cart:hover
        {
            background-color:green;
            color:white
        }
        .redeem
        {
            font-size:16px; 
            font-weight:bold; 
            text-decoration:none !important
        }
    </style>
@endsection
@section('content')
<input type="hidden" id="lottery_id" name="lottery_id" value="{{$lotteryData->id}}">
<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{ URL::to('/') }}/uploads/pro_images/{{$lotteryData->product->product_images[0]->pro_image}}" /></div>
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"> {{$lotteryData->name}} </h3>
						<div class="rating">
							{{-- <div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div> --}}
							<span class="review-no">{{$lotteryData->lottery_contestent->groupby('user_id')->count()}} Teilnehmer</span>
						</div>
						<p class="product-description">
                            {{$lotteryData->description}}
                        </p>
                        <h4 class="price">{{__('lables.lot_per_amount')}}: <span  > {{round($lotteryData->one_lot_amount,0)}} </span></h4>
						<h4 class="price"> {{__('lables.taler_rquired')}}: <span id="totalAmount" lot-amount="{{round($lotteryData->one_lot_amount,0)}}"> {{round($lotteryData->one_lot_amount,2)}} </span></h4>
						<p class="vote">
                            <strong><?php
                                $total = $lotteryData->one_lot_amount*$lotteryData->lottery_contestent->count();
                                echo $progressBar = round($total/$lotteryData->lot_amount*100,0);
                                ?>%</strong>
                             {{__('lables.total_donation')}}</p>
                        <input type="hidden" id="bonus_taler" name="bonus_taler" value="no">
                        <input type="hidden" id="bonusAmount" name="bonusAmount" value="0">
                        <div class="row">
                            @if(!Auth::guard('client')->check())
                                <div class="action col-xs-10 col-lg-8 no-padding">
                                    <a  href="/login" class="add-to-cart btn" type="button">{{__('menu.donate')}}</a>
                                </div>
                                <div class="action col-xs-10 col-lg-3 qty_wrap" id="qty_wrap">
                                    <input style="margin-top:0px" type="number" name="qty" id="qty" value="1" oninput="validate(event,'qty_wrap'); emptyQty()">
                                    <span id="lotSize" style="font-size:11px; text-align:center; width:100%; float:left; line-height:15px">{{__('lables.enter_number_of_lots')}}</span>
                                </div>
                            @else
                            {{-- success login --}}
                                <div style="width:100%; color:red; font-size:14px; text-align:center; padding-bottom:7px" id="errorLots"></div>
                                <input  type="hidden" name="total_lots" id="total_lots" value="{{$lotteryData1->totalLots}}">
                                <div class="action col-xs-10 col-lg-8 no-padding">
                                    <button trans_type="credit" onclick="puchaseLottery({{$user->user()->status}})" class="add-to-cart btn" id="lot_purchase" type="button">{{__('menu.donate')}}</button>
                                </div>
                                <div class="action col-xs-10 col-lg-3 qty_wrap" id="qty_wrap">
                                    <input style="margin-top:0px" type="number" name="qty" id="qty" value="1" oninput="validate(event,'qty_wrap'); emptyQty()" onchange="">
                                    <span id="lotSize" style="font-size:11px; text-align:center; width:100%; float:left; line-height:15px">{{__('lables.enter_number_of_lots')}}</span>
                                </div>
                            @endif
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>

<!-- Trigger the modal with a button -->
{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Lottery Numbers</h4>
            </div>
            <div class="modal-body">
            <p>Pleaase notedown your lottery numbers </p>
            <div id="numbers"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
    <script>

        function emptyQty()
        {
            var qty = $("#qty").val();
            if(qty=="" || qty<=0)
            {
                $("#errorLots").css('color','red');
                $("#errorLots").html("Minimum Lots Required = 1");
                $("#qty").val('1');
            }
        }
        function purchaseBonus()
        {
            $("#lot_purchase").attr('trans_type','bonus');
            $("#errorLots").html("");
            setTimeout(function(){
                puchaseLottery(0);
            },1000)
        }
        function puchaseLottery(val)
        {
            var type = $("#lot_purchase").attr('trans_type');
            console.log(type);
            
            if(val==1)
            {
                $("#errorLots").css('color','red');
                $("#errorLots").html("Your Account is not approved by the admin yet.");
                return false;
            }

            var bonusTaler = $("#bonus_taler").val();
            var totalAmount = $("#totalAmount").text();
            var total_lots = $("#total_lots").val();
            var qty = $("#qty").val();
            var lottery_id =$("#lottery_id").val();

            $.ajax({
                method: "POST",
                url: "{{route('lottery.purchase')}}",
                data: { "_token": "{{ csrf_token() }}",qty: qty , amount:totalAmount,total_lots:total_lots,lottery_id:lottery_id,bonusTaler:bonusTaler,type:type}
            }).done(function( msg ) {
                var obj = JSON.parse(msg);
                if(obj.status=='success')
                {
                    $("#numbers").html("");
                    $("#errorLots").css('color','green');
                    $("#errorLots").html(obj.message);
                    $("#myModal").modal();
                    var number = obj.numbers.split(",");
                    var arrayLength = number.length;
                    var i=0;
                    for (i=0;i<=arrayLength;i++) {
                        if(number[i]!==undefined)
                        {
                            $("#numbers").append("<p> Lott Number "+(i+1)+": "+number[i]+"</p>");
                        }
                    }
                }
                else
                {
                    $("#bonus_taler").val(obj.bonus_use);
                    $("#bonusAmount").val(obj.amount);
                    $("#errorLots").css('color','red');
                    $("#errorLots").html(obj.message+"<br /> "+obj.bonus_taler);
                }
            });
        }
       
    </script>
@endsection
