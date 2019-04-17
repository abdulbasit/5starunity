@extends('layouts.app')
@section('style')
    <style>
        .card{
            width:100%;
            border:0px;
            margin-top: 0px
        }
    </style>
@endsection
@section('content')
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
							<span class="review-no">{{$lotteryData->lottery_contestent->count()}} Participant</span>
						</div>
						<p class="product-description">
                            {{$lotteryData->description}}
                        </p>
                        <h4 class="price">Amount per lot: <span  > {{round($lotteryData->one_lot_amount,0)}} </span></h4>
						<h4 class="price"> Taler Required: <span id="totalAmount" lot-amount="{{round($lotteryData->one_lot_amount,0)}}"> {{round($lotteryData->one_lot_amount,2)}} </span></h4>
						<p class="vote">
                            <strong><?php
                                $total = $lotteryData->one_lot_amount*$lotteryData->lottery_contestent->count();
                                echo $progressBar = round($total/$lotteryData->lot_amount*100,0);
                                ?>%</strong>
                             Of total amount donated </p>
                        <div class="row">
                            @if(!Auth::guard('client')->check())
                                <div class="action col-xs-10 col-lg-8 no-padding">
                                    <a href="/login" class="add-to-cart btn" type="button">Apply</a>
                                </div>
                                <div class="action col-xs-10 col-lg-3 qty_wrap" id="qty_wrap">
                                    <input type="number" name="qty" id="qty" value="1" onkeypress="validate(event,'qty_wrap')" onchange="emptyQty()">
                                    <span id="lotSize" style="font-size:11px; text-align:center; width:100%; float:left">Enter no of lots</span>
                                </div>
                            @else
                            {{-- success login --}}
                                <div style="width:100%; color:red; font-size:14px; text-align:center; padding-bottom:7px" id="errorLots"></div>
                                <input type="hidden" name="total_lots" id="total_lots" value="{{$lotteryData->total_lots}}">
                                <div class="action col-xs-10 col-lg-8 no-padding">
                                    <button onclick="puchaseLottery()" class="add-to-cart btn" type="button">Apply</button>
                                </div>
                                <div class="action col-xs-10 col-lg-3 qty_wrap" id="qty_wrap">
                                    <input type="number" name="qty" id="qty" value="1" onkeypress="validate(event,'qty_wrap')" onchange="emptyQty()">
                                    <span id="lotSize" style="font-size:11px; text-align:center; width:100%; float:left">Enter no of lots</span>
                                </div>

                            @endif
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="8C6M6HC9ANYKJ">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>

                        </div>
					</div>
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
            if(qty=="")
                $("#qty").val('1');
        }
        function puchaseLottery()
        {
            var totalAmount = $("#totalAmount").text();
            var total_lots = $("#total_lots").val();
            var qty = $("#qty").val();

            $.ajax({
                method: "POST",
                url: "{{route('lottery.purchase')}}",
                data: { "_token": "{{ csrf_token() }}",qty: qty , amount:totalAmount,total_lots:total_lots }
            })
            .done(function( msg ) {
                // alert(msg);
                $("#errorLots").html(msg);
            });
        }
    </script>
@endsection
