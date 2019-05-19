@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="historyTable">
            <img src="{{URL::to('/') }}/images/1554660749_5starunity.jpg"}} style="width:100%" />
        </div>
    </div>
</div>
<div class="container">
    <div class="row profile">
         <div class="col-md-12">
            <div class="checkout-panel text-center">
                <div class="section-title">
                    Mit SPENDEN in die Zukunft tolle Lieblingsprodukte gewinnen
                </div>
                <p>Ihre Spenden helfen zukunftsorientierten Unternehmen, Start-Ups, Entwicklern und Gründern dabei, diverse Konzepte / Produkte zu gestalten / realisieren.</p>
                <p>Wir möchten Sie auf unseren Vorstellungsseiten der ERFINDER / GRÜNDER transparent über bereits erfolgte Unterstützungen informieren.</p>
                <p>Neben der emotionalen Befriedigung geleisteter Hilfen ist ein weiterer Vorteil Ihrer Spende, dass Sie mit 5starUnity-Talern belohnt werden und nun die Möglichkeit besitzen, nachfolgende Sachpreise gewinnen zu können. </p>
                <p>Lieblingsprodukte suchen, 5starUnity-Taler in Lose tauschen und mit ein wenig Fortuna, bei der anwaltlich beglaubigten Ziehung, tolle Gewinne erlangen.</p>

                {{-- <div class="section-title">Aktuellste und beliebteste Produkte unserer Spender</div> --}}
                <section class="homepage-popular-startups">
                        <div class="container-fluid">
                            <div class="section-title padding-title">
                                    Aktuellste und beliebteste Produkte unserer Spender
                                {{-- {{ __('content.favt_products')}} --}}
                            </div>
                        </div>
                        <div class="ps_parent_circles">
                            <div class="ps_circles">
                                <i class="fa fa-circle circle" data-position="1"></i>
                            </div>
                        </div>
                        <div class="container listing_container" id="list_startups">
                                <div class="row row_for_mobile">
                                <span id="total_pages" data-total="111"></span>
                                @foreach($lotteryData as $i=>$lottery)
                                    <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes ">
                                        <div class="content_startup_blok current_investment ">
                                            <a itemprop="url" title="vanilla bean" href="/lottery/detail/{{$lottery->lottery_id}}">
                                                <div class="stratup_img lazy" data-src="" title="vanilla bean" style="overflow:hidden; height:100px">
                                                    <img class="img-responsive" src="{{ URL::to('/') }}/uploads/pro_images/{{$lottery->product->product_images[0]->pro_image}}">
                                                </div>
                                            </a>
                                            <div class="row content_info">
                                                <a itemprop="url" title="vanilla bean" href="/lottery/detail/{{$lottery->lottery_id}}">
                                                    <h2 class="mb-5px">{{$lottery->name}}</h2>
                                                </a>
                                                <p itemprop="description">
                                                    <a class="lot_desc" href="/lottery/detail/{{$lottery->lottery_id}}" title="{{$lottery->name}}">
                                                        {{$lottery->description}}
                                                    </a>
                                                </p>
                                                <span class="typeStartupBg"><span></span></span>
                                            </div>
                                            <div class="row finance_info">
                                                <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                                        {{ __('menu.number_of_lots')}} : {{$lottery->created_lots}}
                                                </div>
                                                {{-- <div class="col-xs-5 col-sm-6 block_finance_right text-right">
                                                    <div class="block_time_left">
                                                        <i class="fa fa-clock-o time_icon" aria-hidden="true" style="font-size: 18px;vertical-align: middle;color:#5b8b9b;padding-bottom: 2px;"></i>
                                                        noch 36 Tage
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="row progress_info nopadding">
                                                <div class="col-xs-12 progress canInvest">
                                                        <?php
                                                        $total = $lottery->one_lot_amount*$lottery->getTotalLotsAttribute($lottery->lottery_id);
                                                        $progressBar = round($total/$lottery->lot_amount*100,0);
                                                        ?>
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressBar ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progressBar ?>%"><?php echo $progressBar ?>%</div>
                                                </div>
                                                <div class="col-xs-6 block_details borderRightgrey">
                                                <strong>{{$lottery->getTotalLotsAttribute($lottery->lottery_id)}}</strong>
                                                    {{ __('menu.lots_bought')}}
                                                </div>
                                                <div class="col-xs-6 block_details">
                                                    <strong>{{$lottery->getTotalContestentsAttribute($lottery->lottery_id)}}</strong>{{ __('menu.participants')}}
                                                </div>
                                            </div>
                                            <a href="/lottery/detail/{{$lottery->id}}">
                                                <div class="footer_startup ">
                                                    {{ __('menu.win_now')}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        <div class="row">
                            <div class="col-xs-12 button-container" style="margin:0px">
                                <a href="/lotteries" class="btn layoutV2-btn">
                                    {{ __('menu.view_all_lotteries')}}
                                </a>
                            </div>
                        </div>
                    </section>
         </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div id="historyTable">
            <img src="{{URL::to('/') }}/images/2019-05-13.jpg"}} style="width:100%" />
        </div>
    </div>

</div>
<br />
<div class="container">
    {{-- <p class="text-center">Das sicherste Zeichen des wahrhaft verständigen Menschen ist Neidlosigkeit.</p> --}}
    <div class="row">
        <div class="col-xs-12 button-container" style="margin:0px">
            <a href="/partner" class="btn layoutV2-btn">
                INFORMIEREN SIE SICH ÜBER MEINUNGEN UNSERER SPENDER UND PARTNER
            </a>
        </div>
    </div>

</div>
@endsection
