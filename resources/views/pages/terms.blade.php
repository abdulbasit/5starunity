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
.form-control
{
    padding-top:0px
}
section.homepage-news{
    padding-top:23px;
    padding-left:8px;
    padding-bottom:0px;
    border:solid 2px #888;
    background:none
}
h1
{
    font-weight: bold;
    text-align: center
}
h3
{
    font-weight: bold;
    text-align: center
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
                <br />
                <br />
                <div class="container">
                    <div class="row">
                        <img style="width:100%" src="{{ URL::to('/') }}/uploads/slider/1554483886_5starunity.png">
                    </div>
                    <br />
                    <br />
                    <div class="row" style="text-align:justify; line-height:28px">
                        Nachfolgende Auswahlmöglichkeiten zeigen Ihnen Partner / Community-Mitglieder, welche uns bereits freiwillig in / mit diversen Marketing-Kampagnen unterstützten und damit sekundär  Erfindern, Gründern und StartUp-Unternehmungen helfen. Klicken Sie sich durch die engagierten Beiträge oder nehmen Sie (z.B. mit einer Unterstützung innerhalb der Kampagnen) automatisch an einem kleinen Gewinnspiel teil und wahren Sie die Chance zu helfen und dadurch sogar tolle Sachpreise gewinnen zu können. Nähere Informationen finden Sie mit einem Klick auf das Bild der aktuellen Kampagne! 
                    </div>
                </div>
                <br />
                <br />  
                
                <section class="homepage-news">
                    <div class="container">
                        <canvas id="hidden-canvas2" style="display:none"></canvas>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div id="news-3" class="news-block news-block-large news-block-image" style="background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(https://5starunity.com/uploads/blog/1570525059_5starunity.jpg)" onclick="window.location = 'https://advertise.5starunity.com/';">
                                        <div class="news-date" style="display: block;">
                                            <strong>News</strong> | Oct 8, 2019
                                        </div>
                                        <div class="news-title" style="display: block;">
                                            5starUnity startet BETA-Phase<br>
                                        </div>
                                        <div class="news-brief news-brief-large" style="display: none;">
                                            Eine neuartige, innovative Plattform soll Erfindern, Entwicklern und Gründern helfen, ihre Produkte / Konzepte marktreif zu gestalten.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br />
                                     <h3>pix`lMania</h3>
                                    
                                    <h1>PARTNER </h1>
                                    <br />
                                    <h3>1</h3>
                                </div>
                            </div>
                        </div>
                </section>
                <br />
                <br />
                <section class="homepage-news">
                    <div class="container">
                        <canvas id="hidden-canvas2" style="display:none"></canvas>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div id="news-3" class="news-block news-block-large news-block-image" style="background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(https://5starunity.com/uploads/blog/221322.jpg)" onclick="window.location = 'https://advertise.5starunity.com/getp.php?gr=3&pa=2';">
                                        <div class="news-date" style="display: block;">
                                            <strong>Marketing </strong> | Feb 24, 2020
                                        </div>
                                        <div class="news-title" style="display: block;">
                                            5starUnity Europe OÜ startet erste Marketing-Kampagne<br>
                                        </div>
                                        <div class="news-brief news-brief-large" style="display: none;">
                                            Unterstützen Sie unsere innovative Plattform mit nur 5.- Euro und erhalten Sie eine Chance, dieses tolle Apple iPhone 11 zu gewinnen und nutze die
100% YEM – CASHBACK Option!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br />
                                     <h3>pix`lMania</h3>
                                     <h1>MARKETING  </h1>
                                   
                                    <br />
                                    <h3>1</h3>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(function(){
            
                                $(".news-block").hover(function(){
                                    $(this).find(".news-brief").stop(true, true).fadeIn(300);
                                    $(this).find('.news-date').css('display','none');
                                    $(this).find('.news-title').css('display','none');
                                }, function(){
                                    $(this).find(".news-brief").stop(true, true).fadeOut(300);
                                    $(this).find('.news-date').css('display','block');
                                    $(this).find('.news-title').css('display','block');
                                });
                            });
                        </script>
                </section>
                @endif
                @if($pageName=='promotions')
                <br /> <br />
                    <form action="/page/promotions" method="get">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-xs-12 col-lg-1 form-group"></div>
                            <div class="col-xs-12 col-lg-4 form-group">
                                <input type="text" value="{{request()->search}}" class="form-control " name="search" id="search" placeholder="{{ __('lables.cooperation_search')}}" style="margin:0px">
                            </div>
                            <div class="col-xs-12 col-lg-4 form-group">
                                <select name="category" id="category" class="form-control ">
                                    <option value="">{{ __('lables.cooperation_category_placholder')}}</option>
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
                    <div class="container">
                        @foreach($promotionsResult as $key =>$promotions)
                            <div class="row" style="margin-bottom: 10px; border:solid 4px #ccc">
                                <div class="col-md-3" style="padding:0px">
                                    <div id="myCarousel{{$promotions->promotion_id}}" class="carousel slide" data-ride="carousel" style="width:225px">
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
                                <div class="col-md-7" style="padding-left:40px">
                                    <h4><b>{{$promotions->promo_name}}</b></h4>
                                    <p>{{$promotions->short_description}}</p>
                                    
                                </div>
                                <div class="col-md-2">
                                    @if($key==0)
                                        <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-2px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px; padding-top:10px">
                                            <p style="float:left; width:100%; line-height:17px; position:relative; top:35px">
                                                <span style="width:100%; float:left; text-align:center; font-weight:normal">Ihr Vorteil</span>
                                                <span style="  width:100%; float:left; text-align:center; margin-top:10px">
                                                    {{$promotions->type}}
                                                </span>
                                            </p>
                                            <a target="_blank" style="position:relative; left:10px; top:70px; background-color:green; color:white; text-decoration:none; " href="{{$promotions->reference_website}}" class="btn-green">{{ __('lables.click_here')}} </a>
                                        </div>
                                    @else
                                        <div style="height:180px; border-left:solid 1px #ccc; position:relative; top:-5px; padding-top:30px; text-align:center; font-weight:bold; font-size:14px">
                                        <p style="float:left; width:100%; line-height:17px; margin-top:15px">
                                            <span style="width:100%; float:left; text-align:center; font-weight:normal">Ihr Vorteil</span>
                                            <span style="width:100%; float:left; text-align:center; margin-top:10px">
                                                {{$promotions->type}}
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
 <script>
    $(function(){

        $(".news-block").hover(function(){
            $(this).find(".news-brief").stop(true, true).fadeIn(300);
            $(this).find('.news-date').css('display','none');
            $(this).find('.news-title').css('display','none');
        }, function(){
            $(this).find(".news-brief").stop(true, true).fadeOut(300);
            $(this).find('.news-date').css('display','block');
            $(this).find('.news-title').css('display','block');
        });
    });
</script>
@endsection