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
</style>
@endsection
@section('content')
<section class="homepage-popular-startups">
        <div class="container-fluid">

            <div class="section-title padding-title"> {{ __('content.favt_products')}} </div>
        </div>

        <div class="ps_parent_circles">
            <div class="ps_circles">
                <i class="fa fa-circle circle" data-position="1"></i>
            </div>
        </div>
        <br />
        <div class="container listing_container" id="list_startups">
                <form action="/lottery/search" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-lg-1 form-group"></div>
                        <div class="col-xs-12 col-lg-4 form-group">
                            <input type="text" value="{{request()->search}}" class="form-control " name="search" id="search" placeholder="{{ __('lables.placehoder_search')}}">
                        </div>
                        <div class="col-xs-12 col-lg-4 form-group">
                            <select name="category" id="category" class="form-control ">
                                <option value="">{{ __('lables.lottery_category_dropdown')}}</option>
                                @foreach($category as $proCategory)
                                    <option {{ $proCategory->id == request()->category ? 'selected="selected"' : '' }} value="{{$proCategory->id}}">{{$proCategory->name}}</option>
                                @endforeach
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
                @if($lotteryData->count()>0)
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
                                        <h2 class="mb-5px">{{$lottery->name}}{{$lottery->lotteryId}}</h2>
                                    </a>
                                    <p itemprop="description">
                                        <a class="lot_desc" href="/lottery/detail/{{$lottery->lotteryId}}" title="{{$lottery->name}}">
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
                                            $total = $lottery->one_lot_amount*$lottery->getTotalLotsAttribute($lottery->lotteryId);
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
                                <a href="/lottery/detail/{{$lottery->id}}">
                                    <div class="footer_startup ">
                                        {{ __('menu.win_now')}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger alert-block">
                        Sorry No Record Found!
                    </div>
                @endif    
            </div>
            <nav class="text-center">
                <ul class="pagination">
                    {{-- {{ $lotteryData->links() }} --}}
                </ul>
            </nav>
    </section>
@endsection
@section('script')
    <script>
        $(".form-control").on('focus',function(){
            $(this).css('border-color','green');
        }).on('focusout',function(){
            $(this).removeAttr('style');
        })
    </script>
@endsection