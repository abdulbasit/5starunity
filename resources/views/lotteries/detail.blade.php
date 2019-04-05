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
                                // */100
                                ?>%</strong>
                             Of total amount donated </p>
                        <div class="row">
                            @if(!Auth::guard('client')->check())
                                <div class="action col-xs-10 col-lg-8 no-padding">
                                    <a href="/login" class="add-to-cart btn" type="button">Apply</a>
                                </div>
                                <div class="action col-xs-10 col-lg-3">
                                    <input type="text" name="qty" id="qty" value="1" onkeypress='validate(event)' onchange="emptyQty()">
                                    <span style="font-size:11px; text-align:center; width:100%; float:left">Enter no of lots</span>
                                </div>
                            @else
                            <div class="action col-xs-10 col-lg-8 no-padding">
                                    <button class="add-to-cart btn" type="button">Apply</button>
                                </div>
                                <div class="action col-xs-10 col-lg-3">
                                    <input type="text" name="qty" id="qty" value="1" onkeypress='validate(event)' onchange="emptyQty()">
                                    <span style="font-size:11px; text-align:center; width:100%; float:left">Enter no of lots</span>
                                </div>
                            @endif
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }

            setTimeout(function(){
                var qty = $("#qty").val();
                var lotAmount = $("#totalAmount").attr('lot-amount');
                $("#totalAmount").html(lotAmount*qty);
            },300);

            // alert(qty);
            if(qty=="")
                $("#qty").val('1');
        }
        function emptyQty()
        {
            var qty = $("#qty").val();
            if(qty=="")
                $("#qty").val('1');
        }
    </script>
@endsection
