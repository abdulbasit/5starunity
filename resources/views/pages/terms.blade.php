@extends('layouts.app')
@section('content')
@section('style')
<style>
.carousel-indicators
{
    display:none
}
.badge_amount
{
    width: auto;
    position: absolute;
    top: 0px;
    background-color: red;
    color: white;
    right: 0;
    padding-left: 5px;
    padding-right: 5px;
}
</style>
@endsection
<div class="container no-padding">
    
    <h2 class="text-center registerHeading" style="font-weight:bold">{{$page->page_title}}</h2>
    <br />
    <div class="fieldset-content">
        <div class="row">
            <div class="col-xs-12 terms_cond" id="terms">
                {!!$page->page_content!!}
                @if($pageName=='partner')
                    <div class="col-xs-12 button-container" style="margin:0px; margin-top:35px">
                        <a href="https://advertise.5starunity.com" class="btn layoutV2-btn" style="width:500px">
                            pix`lMania 
                        </a>
                    </div>
                @endif
                <div class="container" style=" border:solid 4px #ccc">
                    @if($pageName=='promotions')
                        @foreach($promotionsResult as $key =>$promotions)
                            <div class="row" style="border-bottom:solid 1px #ccc; margin-bottom: 10px ">
                                <div class="col-md-3" style="padding:0px">
                                    <div id="myCarousel{{$promotions->id}}" class="carousel slide" data-ride="carousel" style="width:250px">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                    
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            @foreach($promotions->product_images as $keys => $images)
                                                <div class="item @if($keys==0)active @endif">
                                                {{-- <img style="margin:5px" width="100" class="rounded" src="{{$images->image}}"> --}}
                                                    <img src="{{ URL::to('/') }}/uploads/promo_images/{{$images->image}}" alt="Los Angeles" style="width:100%;">
                                                </div>
                                            @endforeach
                                        </div>
                                    
                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel{{$promotions->id}}" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel{{$promotions->id}}" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>    
                                <div class="col-md-7">
                                    <h4><b>{{$promotions->name}}</b></h4>
                                    <p>{{$promotions->short_description}}</p>
                                    
                                </div>
                                <div class="col-md-2">
                                    <div class="badge_amount">{{$promotions->discount_amount}}%</div>
                                    @if($key==0)
                                        <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-2px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px">
                                            <p style="color:red; float:left; width:100%; line-height:17px">
                                                <span style="width:100%; float:left; text-align:center">Orignal Price</span>
                                                <span style=" text-decoration: line-through; width:100%; float:left; text-align:center">
                                                    {{$promotions->price}} €
                                                </span>
                                            </p>
                                            <p style="color:green; float:left; width:100%; line-height:17px">
                                                <span style="width:100%; float:left; text-align:center">Special Price</span>
                                                <span style="  width:100%; float:left; text-align:center">
                                                    {{round($promotions->price - ($promotions->price * ($promotions->discount_amount/100)),2)}} €
                                                </span>
                                            </p>
                                            <a style="position:relative; left:10px; top:15px; background-color:green; color:white; text-decoration:none;" href="{{$promotions->reference_website}}" class="btn-green">Click Here </a>
                                        </div>
                                    @else
                                    <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-5px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px">
                                        <p style="color:red; float:left; width:100%; line-height:17px">
                                            <span style="width:100%; float:left; text-align:center">Orignal Price</span>
                                            <span style=" text-decoration: line-through; width:100%; float:left; text-align:center">
                                                {{$promotions->price}} €
                                            </span>
                                        </p>
                                        <p style="color:green; float:left; width:100%; line-height:17px">
                                            <span style="width:100%; float:left; text-align:center">Orignal Price</span>
                                            <span style="  width:100%; float:left; text-align:center">
                                                    {{round($promotions->price - ($promotions->price * ($promotions->discount_amount/100)),2)}} €
                                            </span>
                                        </p>
                                        <a target="_blank" style="position:relative; left:10px; top:15px; background-color:green; color:white; text-decoration:none;" href="{{$promotions->reference_website}}" class="btn-green">Click Here </a>
                                    </div>                                    
                                    @endcan
                                </div>
                            </div>    
                        @endforeach
                    @endif

                </div>
                {!!$page->botton_content!!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$('.carousel').carousel({
  interval: 10000
})
</script>
@endsection