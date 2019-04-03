@extends('layouts.app')
@section('content')
<section class="homepage-popular-startups">
        <div class="container-fluid">
            <div class="section-title padding-title">Favourite products from our donors & your chances for great WINS </div>
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
                        <div class="content_startup_blok current_investment " href="investment/vanilla-bean.html">
                            <a itemprop="url" title="vanilla bean" href="/lottery/detail/{{$lottery->id}}">
                                <div class="stratup_img lazy" data-src="" title="vanilla bean" href="investment/vanilla-bean.html" style="overflow:hidden; height:100px">
                                    <img class="img-responsive" src="{{ URL::to('/') }}/uploads/pro_images/{{$lottery->product->product_images[0]->pro_image}}">
                                </div>
                            </a>
                            <div class="row content_info">
                                <a itemprop="url" title="vanilla bean" href="/lottery/detail/{{$lottery->id}}">
                                    <h2 class="mb-5px">{{$lottery->name}}</h2>
                                </a>
                                {{-- <span class="grey_50 startupLocation"><i class="fa fa-map-marker" aria-hidden="true"></i> Regensburg, DE</span> --}}

                                <p itemprop="description">
                                    <a class="lot_desc" href="/lottery/detail/{{$lottery->id}}" title="{{$lottery->name}}">
                                        {{$lottery->description}}
                                    </a>
                                </p>
                                <span class="typeStartupBg"><span></span></span>
                            </div>
                            <div class="row finance_info">
                                <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                    Ziel: {{$lottery->lot_amount}} &euro;
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
                                        $total = $lottery->one_lot_amount*$lottery->lottery_contestent->count();
                                        $progressBar = round($total/$lottery->lot_amount*100,0);
                                        // */100
                                        ?>
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressBar ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progressBar ?>%"><?php echo $progressBar ?>%</div>
                                </div>
                                <div class="col-xs-6 block_details borderRightgrey">
                                <strong>{{$lottery->one_lot_amount*$lottery->lottery_contestent->count()}}

                                    &euro;</strong>
                                    Investiert
                                </div>
                                <div class="col-xs-6 block_details">
                                    <strong>{{$lottery->lottery_contestent->count()}}</strong>Companisten
                                </div>
                            </div>
                            <div class="footer_startup ">
                                WIN NOW
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav class="text-center">
                <ul class="pagination">
                    {{ $lotteryData->links() }}
                </ul>
            </nav>
    </section>
@endsection
