@extends('layouts.app')
@section('content')

    <section>

            <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 550px; overflow: hidden; margin-top:-75px">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
                </div>

                <!-- Slides Container -->
                <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 480px;
                overflow: hidden; top:60px">
                @foreach($sliderData as $slider)
                    <div>
                        <a href="{{$slider->link}}">
                            <img data-u="image" src="{{ URL::to('/') }}/uploads/slider/{{$slider->image}}" />
                            <span></span>
                        </a>
                    </div>
                @endforeach
                </div>
                    <div id="left_arrow" data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div id="right_arrow" data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
                    <!--#endregion Arrow Navigator Skin End -->
                </div>
                <!-- Jssor Slider End -->
            </div>
    </section>
    <section class="homepage-howitworks">
        <div class="container">
            <div class="section-title">{{ __('content.3steps')}}</div>
            <div class="section-subtitle">
                <p>
                    {{ __('content.3steps_cont1')}}<br />
                </p>
                {{-- <br /> --}}
                <br />
                <p>
                    {{ __('content.3steps_cont2')}}<br />
                </p>
                <br />
                {{-- <br /> --}}
                <p>
                    {{ __('content.3steps_cont3')}}<br />
                </p>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row circles-holder">
                        <div class="col-md-4 col-sm-4 c_dist">
                            <a href="/register">
                                <div class="circle c_nd registerCircle"></div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 c_dist">
                            <a href="#">
                            <div class="circle c_nd spendCircle"></div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 c_dist">
                            <a href="/lotter-of-things">
                            <div class="circle c_nd lotteryThingsCircle"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 button-container ">
                    <a href="/register" class="btn layoutV2-btn">{{ __('menu.register_your_self')}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="all-startups-background" style="height:100% !important">
         <div class="row">
            <div class="container-fluid">
                <div class="col-xs-12 button-container text-center button-container-heading" style="padding:0px">
                    <img style="width:100%" src="{{ URL::to('/') }}/frontend/graphics/layout/003.png">
                </div>
            </div>
       </div>
    </section>
    <section style="margin-top:70px">
        <div class="container">
            {{-- <h2 class="why5starheading">Why 5Starunity?</h2> --}}
            <div class="row rowMargin">
                <div class="col-sm-6 whyWrap">
                    <div id="news" class="news-block why5starCont">
                        <div class="news-date why5starContIco" style="margin-top:10px; float:left">
                            <img style="width:150px; float:left" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/1Recht.png">
                            <span class="whyBoxHeading">SICHER</span>
                        </div>
                        <div class="news-brief why5starContDesc">
                            Unser eingetragener Verein dient zur Erfüllung unseres Satzungszweckes, es gehen 100% aller verbleibenden Gewinne (nach positiver Prüfung) an Erfinder,
                            Gründer und Entwickler - weltweit. Transparent werden wir alle Spender auf diesen Seiten darüber in Kenntnis setzen,
                            welche Unternehmungen über die Jahre unterstützt wurden
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 whyWrap" >
                    <div id="news" class="news-block news-block-image; why5starCont">
                        <div class="news-date why5starContIco" style="margin-top:10px; float:left">
                            <img style="width:150px; float:left" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/2Idee.png">
                            <span class="whyBoxHeading">INNOVATIV</span>
                        </div>
                        <div class="news-brief why5starContDesc">
                                Die Expertise des Vorstands sowie eine definierte, einheitliche Bestimmung über Verwendung der zu investierenden Gelder,
                                garantiert zielgerichtete und innovative Entwicklungen.
                                Aus den zu erwartenden Rückflüssen können wiederum erneut Hilfesuchenden unter die Arme gegriffen werden;
                                ein zeitlich erfolgreicher Kreislauf.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 whyWrap" >
                    <div id="news" class="news-block news-block-image; why5starCont">
                        <div class="news-date why5starContIco" style="margin-top:10px; float:left">
                            <img style="width:150px; float:left" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/3Herz.png">
                            <span class="whyBoxHeading">BEHERZT</span>
                        </div>
                        <div class="news-brief why5starContDesc">
                                Eine generelle Unterstützung für Erfinder, Gründer und Entwickler liegt uns am Herzen und treibt uns an,
                                hierfür ehrenamtlich innerhalb des Vereines zu Interagieren. Wir würden uns sehr freuen,
                                wenn Sie uns Ihr Vertrauen schenken und mit Spenden, Sachgütern, Rabatten bzw.
                                Informationen derartige Vorhaben tatkräftig unterstützen.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 whyWrap" >
                    <div id="news" class="news-block news-block-image; why5starCont">
                        <div class="news-date why5starContIco" style="margin-top:10px; float:left">
                            <img style="width:150px; float:left" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/4Trophäe.png">
                            <span class="whyBoxHeading">ERFOLGREICH</span>
                        </div>
                        <div class="news-brief why5starContDesc">
                            Durch den innovativen Charakter und der Vereinigung diverser Crowdfunding-Aspekte erhalten Sie für jeden gespendeten Euro einen Taler,
                            welchen Sie nun in diversen Verlosungen der vereinseigenen Lottery of Things einsetzen können.
                            Wir versichern anwaltlich überprüft, dass jedes Produkt an einen realen Spender übermittelt wird.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br />
    <section class="homepage-popular-startups" style="margin-top:30px">
        <div class="container-fluid">
            <div class="section-title padding-title"> {{ __('content.favt_products')}}</div>
        </div>

        <div class="container listing_container" id="list_startups">
                <div class="row row_for_mobile">
                <span id="total_pages" data-total="111"></span>
                @foreach($lotteryData as $i=>$lottery)
                    <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes ">
                        <div class="content_startup_blok current_investment ">
                            <a itemprop="url" title="{{$lottery->name}}" href="/lottery/detail/{{$lottery->lottery_id}}">
                                <div class="stratup_img lazy" data-src="" title="{{$lottery->name}}" style="overflow:hidden; height:100px">
                                    <img class="img-responsive" src="{{ URL::to('/') }}/uploads/pro_images/{{$lottery->product->product_images[0]->pro_image}}">
                                </div>
                            </a>
                            <div class="row content_info">
                                <a itemprop="url" title="{{$lottery->name}}" href="/lottery/detail/{{$lottery->lottery_id}}">
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
            <div class="col-xs-12 button-container" style="margin:0px; margin-top:35px">

                <a href="/lotteries" class="btn layoutV2-btn">
                    {{ __('menu.view_all_lotteries')}}
                </a>
            </div>
        </div>
    </section>
    <section class="homepage-news">
        <div class="container">
            <div class="section-title">{{ __('content.blog_heading')}}</div>
        </div>

        <div class="container">
            <canvas id="hidden-canvas2" style="display:none"></canvas>
            <div class="row">
                @foreach($blogData as $i=>$blog)
                    @if($i<=2)
                        <div class="col-sm-4">
                            <div id="news-{{$i}}" class="news-block  news-block-image"
                                style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url({{ URL::to('/') }}/uploads/blog/{{$blog->post_img}})' onclick="window.location = 'article/{{$blog->post_name}}-{{$blog->id}}';">
                                <div class="news-date">
                                    <strong>News</strong> | {{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                                </div>
                                <div class="news-title">
                                    {{$blog->title}}<br />
                                </div>
                                <div class="news-brief ">
                                    {{$blog->short_desc}}
                                </div>
                            </div>
                        </div>
                    @elseif($i==3)
                        <div class="col-sm-8">
                            <div id="news-{{$i}}" class="news-block news-block-large news-block-image"
                                style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url({{ URL::to('/') }}/uploads/blog/{{$blog->post_img}})' onclick="window.location = 'article/{{$blog->post_name}}-{{$blog->id}}';">
                                <div class="news-date">
                                    <strong>News</strong> | {{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                                </div>
                                <div class="news-title">
                                    {{$blog->title}}<br />
                                </div>
                                <div class="news-brief news-brief-large">
                                    {{$blog->short_desc}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4">
                            <div id="news-{{$i}}" class="news-block  news-block-image"
                                style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url({{ URL::to('/') }}/uploads/blog/{{$blog->post_img}})' onclick="window.location = 'article/{{$blog->post_name}}-{{$blog->id}}';">
                                <div class="news-date">
                                    <strong>News</strong> | {{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                                </div>
                                <div class="news-title">
                                    {{$blog->title}}<br />
                                </div>
                                <div class="news-brief ">
                                    {{$blog->short_desc}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
                <div class="row">
                    <div class="col-xs-12 button-container">
                        <a href="{{ route('news') }}" class="btn layoutV2-btn">{{ __('content.blog_button')}}</a>
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

    <section class="sfslf-background">
        {{-- <div style="position:absolute; width:100%; height:100%; background-color: rgba(0, 0, 0, 0.5);"></div> --}}
        <div class="row">
            <div class="container-fluid">
                <div class="col-xs-12 button-container text-left button-announce-heading">
                    {{-- <font size="5">
                        Listening is a soft but basic expression of good behaviour.<br />
                        <span class="pull-right">(Thaddäus Troll (1914 - 1980, Writer)</span>
                    </font> --}}
                </div>
            </div>
       </div>
    </section>
    <section class="homepage-testimonials">
        <div class="container">
            <div class="section-title">{{ __('content.donors_heading')}}</div>
        </div>
        <div class="container">
            <div class="row item active">
                @foreach($testimonialData as $testimonial)
                <div class="col-md-4 col-xs-12">
                    <div class="testimonial-box">
                        <div class="carousel-caption">
                            <div class="who" id="who_{{$testimonial->id}}" style="  border-radius: 1000px; width: 130px; height: 130px; overflow: hidden; margin-left: 25%;">
                                <img class="lazy" src="{{ URL::to('/') }}/uploads/testimonials/{{$testimonial->image}}"><br />
                            </div>
                            <p style="text-align:justify; margin-top:15px">
                                <?php
                                if (strlen($testimonial->detail) >= 180)
                                {
                                    echo substr($testimonial->detail, 0, 180)."...";
                                    ?>
                                    <span><a style="text-transform:lowercase; color:blue;float: right" onclick="donorDetail({{$testimonial->id}})" id="dMore" style="color:blue"> {{ __('menu.more')}} </a></span>
                                <?php
                                }
                                else
                                {
                                    echo $testimonial->detail;
                                }
                                ?>

                                <div id="{{$testimonial->id}}" style="display:none">{{$testimonial->detail}}
                                    <div class="who-name pull-right" style="margin-top:50px">
                                        <strong> {{$testimonial->name}} </strong> <br/>
                                        <i>{{$testimonial->title}}</i>
                                    </div>
                                </div>
                            </p>
                            <div class="who-name">
                                <strong> {{$testimonial->name}} </strong> <br/>
                                <i>{{$testimonial->title}}</i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="homepage-newsletter ContentContainer">
        <div class="container-fluid newsletter-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 newsletter-text">
                        <h2>{{ __('content.news_lettery_heading')}} </h2>
                        <p>{{ __('content.news_letter_desc')}}</p>
                        <div class="newsletter-input">
                            @if ($message = Session::get('success'))
                                <script>
                                    $(document).ready(function(){
                                        setTimeout(function(){
                                            document.getElementById("email").focus(); 
                                        },1000)
                                    });
                                function gotoBottom(id)
                                {
                                        var element = document.getElementsByClassName(id);
                                        element.scrollTop = element.scrollHeight - element.clientHeight;
                                    }
                                </script>
                                <div style="color:green; font-size:14px; text-align:center;" id="unsubsmsg">
                                    {{ $message }}
                                </div>
                            @endif
                            <form name="newsletter-form-home" method="get" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="E-Mail-Adresse" id="email" name="email">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default subscribeBtn" id="subscribeBtn"> {{ __('content.subscribe_btn')}}</button>
                                    </span>
                                </div>
                                
                            </form>
                            
                            <div style="color:green; font-size:14px; text-align:center;" id="subsMsg"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 hidden-xs hidden-sm newsletter-img">
                        <img style="width:100%" src="{{ asset('images/slide4.png')}}"  alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal newModalVideo fade" id="video_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('frontend/graphics/elements/companisto_website_logo_white.png')}}">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="embed_youtube_video"></div>
            </div>
        </div>
    </div>
        <div class="modal fade  modal-sm col-lg-offset-2 col-sm-offset-2" id="donorModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <div class="who" id="who_{{$testimonial->id}}" style="    border-radius: 1000px;
                            width: 130px;
                            height: 130px;
                            overflow: hidden;
                            margin-left: -76px;
                            position: relative;
                            left: 50%;">
                        <img src="" id="detailImg" style="width:100%">
                    </div>

                </h4>
              </div>
              <div class="modal-body" id="donor_content">
                <p>Some text in the modal.</p>
              </div>

            </div>
          </div>
        </div>

    <script src="{{ asset('frontend/jssor/docs.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('frontend/jssor/ie10-viewport-bug-workaround.js')}}"></script>
    <!-- jssor slider scripts-->
    <script type="text/javascript" src="{{ asset('frontend/jssor/jssor.slider.min.js')}}"></script>
<script>

    jQuery(document).ready(function ($) {
        var options = {
            $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
            $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $Idle: 2000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
            $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
            $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

            $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            },

            $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $SpacingX: 12,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth) {
                jssor_slider1.$ScaleWidth(parentWidth - 30);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
    $( document ).ready(function() {

        setTimeout(function(){
            $("#left_arrow").parent().css('top',"87px ");
            $("#right_arrow").parent().css('top',"87px ");
            }, 1500);
    });

    function donorDetail(id)
    {
        $("#donor_content").removeAttr('style');
        $('#donorModal').modal('toggle');
        var detail = $("#"+id).html();
        $("#donor_content").html(detail);
        var image = $("#who_"+id+' img').attr('src');
        $("#detailImg").attr('src',image);
        setTimeout(function(){
            var height = $("#donor_content").css('height');
            var orig_height = height.split('px');
            var height_add = parseInt(orig_height[0])+80;
            $("#donor_content").css('height', height_add+'px');

        },200);

    }
    $("#subscribeBtn").on('click',function(){
        var email = $("#email").val();
        $("#email").attr('disabled','disabled');
        $.ajax({
            method: "POST",
            url: "{{route('subscribe')}}",
            data: { "_token": "{{ csrf_token() }}",email: email }
        })
        .done(function( msg ) {
            $("#email").removeAttr('disabled');
            
            if(msg=='scuccess')
            {
                
                $("#subsMsg").css('color','green');
                $("#subsMsg").html("{{ __('messages.subscription_thanks')}}")
            }
            else if (msg=='error')
            {
                $("#subsMsg").css('color','red');
                $("#subsMsg").html("{{ __('messages.already_exists')}}")
            }
        });
    });
</script>
@endsection
