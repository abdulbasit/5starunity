@extends('layouts.app')
@section('content')
@section('style')
<style>
.carousel-indicators
{
    display:none
}
.badge_amount_red
{
    width: auto;
    position: absolute;
    top: 0px;
    background-color: red;
    color: white;
    right: 0;
    padding-left: 5px;
    padding-right: 5px;
    z-index: 1000;
}
.badge_amount_green
{
    width: auto;
    position: absolute;
    top: 0px;
    background-color: green;
    color: white;
    right: 0;
    padding-left: 5px;
    padding-right: 5px;
    z-index: 1000;
}

.btn-green
{
    border: 1px solid rgb(225, 225, 225);
    border-radius: 1000px;
    background-color: white;
    color: black;
    font-size: 18px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    position: relative;
    right: 0;
}
.btn-green:hover
{
    border: 1px solid rgb(225, 225, 225);
    border-radius: 1000px;
    background-color: green;
    color: white;
    font-size: 18px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    position: relative;
    right: 0;
}
.back-btn
{
    margin-top: -2px;
    float: left;
    padding-left: 10px;
    color: black;
    border: solid 1px #ccc;
    border-radius: 1000px;
    padding-right: 10px;
    padding-top: 4px;
    padding-bottom: 4px; 
    text-decoration:none;
    margin-left:50px;
    text-transform: uppercase;
}
.back-btn:hover{
    margin-top: -2px;
    float: left;
    padding-left: 10px;
    color: red;
    border: solid 1px;
    border-radius: 1000px;
    padding-right: 10px;
    padding-top: 4px;
    padding-bottom: 4px; 
    background-color:red; 
    color:white; 
    text-decoration:none;
    text-transform: uppercase;
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
                @if($pageName=='promotions')
                <br /> <br />
                    <form action="/page/promotions" method="get">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-xs-12 col-lg-1 form-group"></div>
                            <div class="col-xs-12 col-lg-4 form-group">
                                <input type="text" value="{{request()->search}}" class="form-control " name="search" id="search" placeholder="{{ __('lables.placehoder_search')}}" style="margin:0px">
                            </div>
                            <div class="col-xs-12 col-lg-4 form-group">
                                <select name="category" id="category" class="form-control ">
                                    <option value="">{{ __('lables.lottery_category_dropdown')}}</option>
                                    @foreach($categories as $proCategory)
                                        <option {{ $proCategory->id == request()->category ? 'selected="selected"' : '' }} value="{{$proCategory->id}}">{{$proCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (request()->has('search') || request()->has('category') || request()->has('cate')) 
                            <a href="/page/promotions" class="back-btn">
                                {{-- {{ __('lables.search')}} --}}
                                {{-- <i class="fa fa-eraser" aria-hidden="true"></i> --}}
                                {{ __('lables.remove_filters')}}
                            </a>
                        @endif
                            <div class="col-xs-12 col-lg-3 form-group text-left pull-left" style="width:150px; float:left; padding:0px">
                                <button type="submit" class="btn-green" style="margin-top:-2px; float:right">
                                    {{ __('lables.search')}}
                                </button>
                               
                            </div>
                        </div>
                    </form>
                    <br /><br /><br />
                    <div class="container" style=" border:solid 4px #ccc">
                        @foreach($promotionsResult as $key =>$promotions)
                            <div class="row" style="border-bottom:solid 1px #ccc; margin-bottom: 10px ">
                                <div class="col-md-3" style="padding:0px">
                                    <div id="myCarousel{{$promotions->promotion_id}}" class="carousel slide" data-ride="carousel" style="width:175px">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            @foreach(App\Models\PromotionPartner::images($promotions->promotion_id) as $keys => $images)
                                                <div class="item @if($keys==0)active @endif">
                                                    <img src="{{ URL::to('/') }}/uploads/promo_images/{{$images->image}}" alt="Los Angeles" style="width:100%;">
                                                </div>
                                            @endforeach
                                        </div>
                                    
                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel{{$promotions->promotion_id}}" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel{{$promotions->promotion_id}}" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>    
                                <div class="col-md-7">
                                    <h4><b>{{$promotions->promo_name}}</b></h4>
                                    <p>{{$promotions->short_description}}</p>
                                    
                                </div>
                                <div class="col-md-2">

                                    @if($promotions->badge_type=='percentage')
                                        <div class="badge_amount_red"><a style="color:white; text-decoration:none" href="{{Request::url().'?cate='.$promotions->badge_id}}">@if($promotions->badge_type=='fixed') €€€ @endif  @if($promotions->badge_type=='percentage') %%% @endif</a></div>
                                    @else
                                        <div class="badge_amount_green"><a style="color:white; text-decoration:none" href="{{Request::url().'?cate='.$promotions->badge_id}}">@if($promotions->badge_type=='fixed') €€€ @endif  @if($promotions->badge_type=='percentage') %%% @endif</a></div>
                                    @endif
                                    @if($key==0)
                                        <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-2px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px; padding-top:10px">
                                            {{-- <p style="color:red; float:left; width:100%; line-height:17px">
                                                <span style="width:100%; float:left; text-align:center">Orignal Price</span>
                                                <span style=" text-decoration: line-through; width:100%; float:left; text-align:center">
                                                    {{$promotions->p_price}} €
                                                </span>
                                            </p> --}}
                                            <p style="color:green; float:left; width:100%; line-height:17px; position:relative; top:35px">
                                                <span style="width:100%; float:left; text-align:center">{{ __('lables.you_pay')}}</span>
                                                <span style="  width:100%; float:left; text-align:center">
                                                    {{-- @if($promotions->type=='percentage')
                                                        {{round($promotions->p_price - ($promotions->p_price * ($promotions->p_price/100)),2)}} €
                                                    @else
                                                        {{$promotions->p_price-$promotions->d_amount}} --}}

                                                        € {{$promotions->p_price}}
                                                        
                                                    {{-- @endif --}}
                                                </span>
                                            </p>
                                            <a style="position:relative; left:10px; top:70px; background-color:green; color:white; text-decoration:none; " href="{{$promotions->reference_website}}" class="btn-green">{{ __('lables.click_here')}} </a>
                                        </div>
                                    @else
                                        <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-5px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px">
                                        {{-- <p style="color:red; float:left; width:100%; line-height:17px">
                                            <span style="width:100%; float:left; text-align:center">Orignal Price</span>
                                            <span style=" text-decoration: line-through; width:100%; float:left; text-align:center">
                                                {{$promotions->p_price}} €
                                            </span>
                                        </p> --}}
                                        <p style="color:green; float:left; width:100%; line-height:17px; margin-top:15px">
                                            <span style="width:100%; float:left; text-align:center">{{ __('lables.you_pay')}}</span>
                                            <span style="  width:100%; float:left; text-align:center">
                                                {{-- @if($promotions->badge_type=='percentage')
                                                    {{round($promotions->p_price - ($promotions->p_price * ($promotions->d_amount/100)),2)}} €
                                                @else
                                                    {{$promotions->p_price-$promotions->d_amount}}
                                                    
                                                @endif --}}
                                                € {{$promotions->p_price}}
                                            </span>
                                        </p>
                                        <a target="_blank" style="position:relative; left:10px; top:30px; background-color:green; color:white; text-decoration:none;" href="{{$promotions->reference_website}}" class="btn-green">{{ __('lables.click_here')}}</a>
                                    </div>                                    
                                    @endcan
                                </div>
                            </div>    
                        @endforeach
                    </div>
                 @endif
                {{-- {!!$page->botton_content!!} --}}
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