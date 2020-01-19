@extends('layouts.app')

@section('style')
<style>
.listing_container
{
    padding-bottom:0px;
}
</style>
@endsection

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
         <div class="container">
            <div class="checkout-panel text-center">
                <div class="section-title">
                        <br />
                    Mit SPENDEN in die Zukunft tolle Lieblingsprodukte gewinnen
                </div>
                <p>Ihre Spenden helfen zukunftsorientierten Unternehmen, Entwicklern und Gründern bspw. in einer StartUp-Phase dabei, diverse Konzepte / Produkte zu gestalten / zu realisieren. Unter der Rubrik GRÜNDER / FÖRDERER informieren wir stets kommunikativ sowie transparent über bereits erfolgte Unterstützungen, welche nur durch Ihre freiwilligen und gütigen Spenden erreicht wurden.</p>
                {{-- <br /> --}}
                <br />
                <p>Neben der emotionalen Ehrenerklärung für zukünftige innovative Projekte ist ein weiterer Vorteil Ihrer Spende, dass Sie von unserer Sales & Marketing Gesellschaft mit kostenfreien 5starUnity-Talern belohnt werden und die Möglichkeit besitzen, nachfolgende Sachpreise gewinnen zu können. Fehlt Ihnen aktuell ein beliebtes Produkt, freuen wir uns über eine schriftliche Mitteilung. Unsererseits versprechen wir, Intensionen unserer Community innerhalb des Präsidiums / der Geschäftsführung zeitnah zu thematisieren.</p>
                <br />
                {{-- <br /> --}}
                <p>Suchen Sie mit nachstehender Funktion Ihre Lieblingsprodukte und nutzen Sie erhaltenen 5starUnity-Taler, um diese bspw. in gültige Lose zu tauschen. In Ihrem persönlichen Nutzerbereich werden alle Informationen dargestellt – wir wünschen Ihnen bereits heute viel Glück bei den überwachten Ziehungen und noch mehr Freude mit unseren tollen Sachpreisen.</p>


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
                        <div class="listing_container" id="list_startups">
                                <div class="row row_for_mobile">
                                <span id="total_pages" data-total="111"></span>
                                @foreach($lotteryData as $i=>$lottery)
                                    <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes ">
                                        <div class="content_startup_blok current_investment ">
                                            <a itemprop="url" title="{{$lottery->name}}" href="/lottery/detail/{{$lottery->lotteryId}}">
                                                <div class="stratup_img lazy" data-src="" title="{{$lottery->name}}" style="overflow:hidden; height:100px">
                                                    <img class="img-responsive" src="{{ URL::to('/') }}/uploads/pro_images/{{@$lottery->product->product_images[0]->pro_image}}">
                                                </div>
                                            </a>
                                            <div class="row content_info">
                                                <a itemprop="url" title="{{$lottery->name}}" href="/lottery/detail/{{$lottery->lotteryId}}">
                                                    <h2 class="mb-5px">{{$lottery->name}}</h2>
                                                </a>
                                                <p itemprop="description">
                                                    <a class="lot_desc" href="/lottery/detail/{{$lottery->lotteryId}}" title="{{$lottery->name}}">
                                                        {!! html_entity_decode($lottery->description) !!}
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
                                                        @$total = $lottery->one_lot_amount*$lottery->getTotalLotsAttribute($lottery->lotteryId);
                                                        @$progressBar = round($total/$lottery->lot_amount*100,0);
                                                        ?>
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressBar ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progressBar ?>%"><?php echo $progressBar ?>%</div>
                                                </div>
                                                <div class="col-xs-6 block_details borderRightgrey">
                                                <strong>{{$lottery->getTotalLotsAttribute($lottery->lotteryId)}}</strong>
                                                    {{ __('menu.lots_bought')}}
                                                </div>
                                                <div class="col-xs-6 block_details">
                                                    <strong>{{$lottery->getTotalContestentsAttribute($lottery->lotteryId)}}</strong>{{ __('menu.participants')}}
                                                </div>
                                            </div>
                                            <a href="/lottery/detail/{{$lottery->lotteryId}}">
                                                <div class="footer_startup ">
                                                    {{ __('menu.win_now')}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br />
                        <div class="row">
                            <div class="col-xs-12 button-container" style="margin:0px; margin-top:30px">
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
<div style="width:100%; height:auto; background-color:#F5F5F5">
    <div class="container">
        <div class="row profile">
             <div class="container">
                <div class="checkout-panel text-center" style=" background-color:#F5F5F5">
                    <div class="section-title">
                            <br />
                        Freunde werben und gemeinsam Entwickler erfolgreich machen
                        </div>
                        <p>Unsere innerste Überzeugung des langfristigen Erfolgs und der Wille bahnbrechende Erfindungen zu unterstützen, ohne den Gründern im Vorfeld ein Exit-Szenario aufzuzeigen, benötigt Sie und eine starke Community. Wir freuen uns bereits direkt mit der Gründung des Vereins starke Partner gefunden zu haben und sind gewillt, unser Netzwerk stetig zu erweitern – jeder Nutzer erhält Zugang zu einzigartigen Angeboten.</p>
                        <br />
                        {{-- <br /> --}}
                        <p>Gerne erwarten wir Ihre Informationen über ggf. zukünftige Partnerschaften oder Gründer, welche eine Unterstützung jedweder Art benötigen. Senden Sie uns einfach mit dem internen Kontaktformular alle Daten, wir melden uns mit Sicherheit bei angegebenen Ansprechpartnern. Neben Geschäftspartnern haben Sie stets die Möglichkeit Freunde zu werben – hierzu finden Sie Ihren eigenen Link innerhalb des verifizierten internen Profils.</p>
                        <br />
                        {{-- <br /> --}}
                        <p>Durch unsere zahlreichen Partner / Unterstützer, günstig erhaltenen Produkten oder gar kostenfreien Sachspenden für die vereinsinterne Lottery of Things, erhalten Sie zusätzliche Taler bei jeder Spende Ihrer Freunde – denn gemeinsam Gewinnen macht mehr Freude. Genaue Voraussetzungen für diesen Bonus und ggf. noch weiteren tollen Bonbons finden Sie innerhalb des internen Systems, nach einer erfolgreichen Verifikation. </p>
             </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-xs-12 button-container" style="margin:0px">
                <a href="/partner" class="btn layoutV2-btn">
                    INFORMIEREN SIE SICH ÜBER MEINUNGEN UNSERER SPENDER UND PARTNER
                </a>
            </div>
        </div>
    </div> --}}
</div>
<br />
<section class="homepage-newsletter ContentContainer">
        <div class="container-fluid newsletter-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 newsletter-text">
                        <h2>{{ __('content.customer_reviews')}} </h2>
                        <p>{{ __('content.customer_reviews_desc')}}</p>
                        <div class="col-xs-12 button-container" style="margin:0px">
                            <a href="/ceo" class="btn layoutV2-btn" style="font-size:14px; margin-top:40px">
                                MEINUNGEN UNSERER SPENDER UND PARTNER
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 hidden-xs hidden-sm newsletter-img">
                        <img style="width:100%" src="{{ asset('images/003.png')}}"  alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
