@extends('layouts.app')
@section('style')
<style>
.btn-green
{
    right:0px !important
}
#search
{
    margin:0px;
}
.listing_container .startup_blok .content_startup_blok .content_info
{
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 30px;
    padding-bottom: 0; 
    min-height: 80px;
    height: 0;
    margin-bottom: 5px;
    overflow: hidden;
}
.listing_container .startup_blok .content_startup_blok .footer_startup
{
    height:auto !important
}
.listing_container .startup_blok .content_startup_blok
{
    height:auto !important
}
.listing_container .startup_blok
{
    padding-left: 15px;
    padding-right: 0px;
    transition: transform 0.15s ease-out;
    -webkit-font-smoothing: antialiased;
}
</style>
@endsection
@section('script')
<script>
    $(".form-control").on('focus',function(){
        $(this).css('border-color','green');
    }).on('focusout',function(){
        $(this).removeAttr('style');
    });
    $("#recomendationsbtn").on('click',function(){
        window.location='recomendations';
    });
</script>
@endsection
@section('content')
<section class="">
<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu')
        <div class="container listing_container" id="list_startups">
                <div class="col-lg-9 col-xs-12 profileWraper">
                    <p>
                        Partner bieten Ihnen die Möglichkeit nachfolgend eingestellte Werbung bis zu drei Mal anzusehen wodurch Sie kostenfreie Bonus-Taler zur freien Verfügung erhalten. Nutzen Sie diese Chance um bspw. Lose von Produkten Ihrer Wahl zu erwerben.  
                        <br />
                        <br />
                        Kennen auch Sie z.B. Unternehmen, welche gut sichtbare Werbeplätze buchen und an garantierten Views / Klicks interessiert sein könnten? Jede positv zustande gekommene Empfehlung vergüten wir mit S-PAY, die Sie frei nutzen dürfen.  
                    </p>
                    <br />
                    <br />
                    <div class="row text-center">
                        <button id="recomendationsbtn" type="button" class="btn-green" style="margin-top:-5px; right:0px">
                            {{ __('lables.recomend') }}
                        </button>
                    </div>
                    <br />
                    <br />
                    <form action="/lottery/search" method="post">
                    @csrf
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-xs-12 col-lg-5 form-group">
                            <input type="text" value="{{request()->search}}" class="form-control " name="search" id="search" placeholder="Suchbegriff">
                        </div>
                        <div class="col-xs-12 col-lg-5 form-group">
                            <select name="category" id="category" class="form-control ">
                                <option value="">Kategorie</option>
                                {{-- @foreach($category as $proCategory)
                                    <option {{ $proCategory->id == request()->category ? 'selected="selected"' : '' }} value="{{$proCategory->id}}">{{$proCategory->name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-xs-12 col-lg-2 form-group text-cnetr">
                            <button type="submit" class="btn-green" style="margin-top:-2px">
                                {{ __('lables.search')}}
                            </button>
                        </div>
                    </div>
                </form>
                
                    <br />
                    <div class="row row_for_mobile">
                    <span id="total_pages" data-total="111"></span>
                    @if($company->count()>0)
                        @foreach($company as $i=>$company)
                        
                            <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes promotions_card">
                                @if($company->promotionViwes($user_id,$company->company_id)>=$company->company_views_attempt)
                                    <a href="#">
                                @else        
                                    <a href="/partner/detail/{{$company->company_id}}">
                                @endif
                                    <div class="content_startup_blok current_investment ">
                                        <div class="stratup_img lazy text-center" data-src="" title="{{$company->company_name}}" style="overflow:hidden; height:100px">
                                            @if($company->image!="")
                                                <img class="img-responsive" src="{{ URL::to('/') }}/uploads/copmany_images/{{@$company->image}}">
                                            @else
                                            <?php 
                                                if (($pos = strpos($company->vidoe, "=")) !== FALSE) 
                                                { 
                                                    @$whatIWant = substr($company->vidoe, $pos+1); 
                                                }
                                                @$thumbnail="http://img.youtube.com/vi/".$whatIWant."/maxresdefault.jpg";
                                            ?>
                                                <img class="img-responsive" src="{{$thumbnail}}">
                                            @endif
                                        </div>
                                    <div class="row content_info">
                                        @if($company->promotionViwes($user_id,$company->company_id)==$company->company_views_attempt)
                                            <h4 class="mb-5px" style="color:black">{{$company->company_name}}</h4>
                                        @else
                                            <h4 class="mb-5px" style="color:black">{{$company->company_name}}</h4>
                                        @endif
                                    </div>
                                    
                                    <div class="row finance_info">
                                            
                                        <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                            {{ __('lables.maximum_views')}} : {{$company->company_views_attempt}}
                                        </div>
                                        
                                    </div>
                                    <?php
                                        $totalViewsAttempts = $company->view_counter;
                                        $promostionsView = $company->promotionViwes("0",$company->company_id);
                                        echo $progressPercent = round($promostionsView/$totalViewsAttempts*100,0); 
                                    ?>
                                    <div class="row progress_info nopadding">
                                        <div class="col-xs-12 progress canInvest">
                                            <?php
                                                $totalViewsAttempts = $company->view_counter;
                                                $promostionsView = $company->promotionViwes("0",$company->company_id);
                                                $progressPercent = round($promostionsView/$totalViewsAttempts*100,0); 
                                            ?>
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressPercent ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progressPercent ?>%"><?php echo $progressPercent ?>%</div>
                                        </div>
                                    </div>
                                    <div class="row progress_info nopadding" style="border-top:solid 1px #5b8b9b">
                                        <div class="col-xs-6 block_details borderRightgrey">
                                            ANSICHTEN 
                                            <br />
                                            {{$company->company_views}}
                                        </div>
                                        <div class="col-xs-6 block_details">
                                            MEINE ANSICHTEN<br /> {{$company->promotionViwes($user_id,$company->company_id)}} von {{$company->company_views_attempt}}
                                        </div>
                                    </div>
                                   
                                    @if($company->promotionViwes($user_id,$company->company_id)==$company->company_views_attempt)
                                        <div class="footer_startup ">
                                            {{ __('lables.already_viwed')}}
                                        </div>
                                    @else
                                        <div class="footer_startup ">
                                            {{$company->user_amount}} BONUS TALER pro Ansicht
                                        </div>
                                    @endif
                                </div>
                            </a>
                            </div>                        
                        @endforeach
                    @else
                        <div class="alert alert-danger alert-block">
                            Sorry No Record Found!
                        </div>
                    @endif   
                </div> 
            </div>
            <nav class="text-center">
                <ul class="pagination"></ul>
            </nav>
        </div>
        </div>
    </section>
@endsection
