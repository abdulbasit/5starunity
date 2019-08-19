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
                {{-- <form action="/lottery/search" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-lg-1 form-group"></div>
                        <div class="col-xs-12 col-lg-4 form-group">
                            <input type="text" value="{{request()->search}}" class="form-control " name="search" id="search" placeholder="{{ __('lables.placehoder_search')}}">
                        </div>
                        <div class="col-xs-12 col-lg-2 form-group text-cnetr">
                            <button type="submit" class="btn-green" style="margin-top:-2px">
                                {{ __('lables.search')}}
                            </button>
                        </div>
                    </div>
                </form> --}}
                <br />
                <div class="row row_for_mobile">
                <span id="total_pages" data-total="111"></span>
                
                @if($company->count()>0)
                    @foreach($company as $i=>$company)
                        <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes ">
                            <div class="content_startup_blok current_investment ">
                                <a itemprop="url" title="{{$company->company_name}}" href="/partner/detail/{{$company->company_id}}">
                                    <div class="stratup_img lazy text-center" data-src="" title="{{$company->company_name}}" style="overflow:hidden; height:100px">
                                        @if($company->image!="")
                                            <img class="img-responsive" src="{{ URL::to('/') }}/uploads/copmany_images/{{$company->image}}">
                                        @else
                                        <?php 
                                            if (($pos = strpos($company->vidoe, "=")) !== FALSE) 
                                            { 
                                                $whatIWant = substr($company->vidoe, $pos+1); 
                                            }
                                            $thumbnail="http://img.youtube.com/vi/".$whatIWant."/maxresdefault.jpg";
                                        ?>
                                            <img class="img-responsive" src="{{$thumbnail}}">
                                        @endif
                                    </div>
                                </a>
                                <div class="row content_info">
                                    <a itemprop="url" title="{{$company->company_name}}" href="/partner/detail/{{$company->company_id}}">
                                        <h2 class="mb-5px">{{$company->company_name}}</h2>
                                    </a>
                                    <p itemprop="description">
                                        <a class="lot_desc" href="/partner/detail/{{$company->company_id}}" title="{{$company->company_name}}">
                                            {{$company->description}}
                                        </a>
                                    </p>
                                    <span class="typeStartupBg"><span></span></span>
                                </div>
                                <div class="row finance_info">
                                    <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                            {{ __('lables.maximum_views')}} : {{$company->totalViews}}
                                    </div>
                                    {{-- <div class="col-xs-5 col-sm-6 block_finance_right text-right">
                                        <div class="block_time_left">
                                            <i class="fa fa-clock-o time_icon" aria-hidden="true" style="font-size: 18px;vertical-align: middle;color:#5b8b9b;padding-bottom: 2px;"></i>
                                            noch 36 Tage
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row progress_info nopadding" style="border-top:solid 1px #5b8b9b">
                                    <div class="col-xs-6 block_details borderRightgrey">
                                            
                                        {{ __('lables.my_views')}}: {{$company->promotionVies($user_id,$company->company_id)}}/{{$company->company_views_attempt}}
                                    {{-- <strong>{{$company->getTotalLotsAttribute($company->company_id)}}</strong> --}}
                                        
                                    </div>
                                    <div class="col-xs-6 block_details">
                                        {{-- <strong>{{$company->getTotalContestentsAttribute($company->company_id)}}</strong>{{ __('menu.participants')}} --}}
                                    </div>
                                </div>
                                @if($company->promotionVies($user_id,$company->company_id)==$company->company_views_attempt)
                                <a href="#">
                                    <div class="footer_startup ">
                                        {{ __('lables.already_viwed')}}
                                    </div>
                                </a>
                                @else
                                <a href="/partner/detail/{{$company->company_id}}">
                                    <div class="footer_startup ">
                                        {{ __('lables.view_now')}}
                                    </div>
                                </a>
                                @endif
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
                    {{-- {{ $companyData->links() }} --}}
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