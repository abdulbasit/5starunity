@extends('layouts.app')
@section('content')

{{-- <section class="homepage-header">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-xs-12 text-center">

                    <div class="header-title">
                     MAKING INNOVATION POSSIBLE                </div>
                    <div class="play-button-holder" id="play_big_video" data-toggle="modal" data-target="#video_modal">
                        <img src="{{ asset('frontend/graphics/layout/play-btn-normal-new-home.png')}}" onmouseover="this.src='graphics/layout/play_v1_white2.png';" onmouseout="this.src='graphics/layout/play-btn-normal-new-home.png';" class="play-button">
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
    <section>

            <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 442px; overflow: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
                </div>

                <!-- Slides Container -->
                <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
                overflow: hidden; top:60px">
                    <div>
                        <img data-u="image" src="{{ URL::to('/') }}/images/slide1.png" />
                        <span></span>
                    </div>
                    <div>
                        <img data-u="image" src="{{ URL::to('/') }}/images/slide2.png" />
                    </div>
                    <div>
                        <img data-u="image" src="{{ URL::to('/') }}/images/001.png" />
                        <span></span>
                    </div>
                    <div>
                        <img data-u="image" src="{{ URL::to('/') }}/images/002.png" />
                        <span></span>
                    </div>
                </div>
                    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
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
            <div class="section-title">Innovativ Erfinder und Gründer unterstützen!</div>
            <div class="section-subtitle">
                    Ideeller Hauptzweck des 5starUnity e.V. ist es, Menschen zu ermöglichen Ihre Ideen zu verwirklichen undzum Wohle der Allgemeinheit eine Verbesserung zu realisieren.
                    Zur Unterstützung erfolgsversprechender Unternehmungen, die Geschichte schreiben könnten,
                    bieten wir Ihnen hier die Möglichkeit zu spenden!
                    Jeder Spender wird mit kostenfreien Talern belohnt und hat im Gegenzug die Chance in unserer Lottery of Things
                    sein Wunschobjekt zu gewinnen - notariell beglaubigt.

            </div>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row circles-holder">
                        <div class="col-md-4 c_dist">
                            <div class="circle c_nd circle1st">
                                <div class="circle c_st">
                                    <div class="circle_icon">
                                        <span class="circle_counter">#1</span>
                                        <span class="circle_text">
                                            Register
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c_dist">
                            <div class="circle c_nd circle1st">
                                <div class="circle c_nd">
                                    <div class="circle_icon">
                                        <span class="circle_counter">#2</span>
                                        <span class="circle_text">
                                            Donate
                                        </span>
                                    </div>
                                    {{-- <div class="circle_text">
                                        Investment
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c_dist">
                            <div class="circle c_nd circle1st">
                                <div class="circle c_rd">
                                    <div class="circle_icon">
                                        <span class="circle_counter">#3</span>
                                        <span class="circle_text">
                                            Lottery of Things
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 button-container">
                    <a href="#" class="btn layoutV2-btn">Register your self</a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage-popular-startups">
        <div class="container-fluid">
            <div class="section-title padding-title">Popular Investments</div>
        </div>

        <div class="ps_parent_circles">
            <div class="ps_circles">
                <i class="fa fa-circle circle" data-position="1"></i>
            </div>
        </div>
        <div class="container listing_container" id="list_startups">
                <div class="row row_for_mobile">
                    <link href="../code/scripts/countdown/jquery.countdown.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript" src="../code/scripts/countdown/jquery.countdown.js"></script>
                                <script type="text/javascript" src="../code/scripts/countdown/jquery.countdown-de.js"></script>

                    <span id="total_pages" data-total="111"></span>









                <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-yes " data-uri="https://www.companisto.com/de/investment/vanilla-bean"
                             itemscope itemtype="http://schema.org/Product">


                    <meta itemprop="image" content="https://www.companisto.com/assets/1546954124_profile%20teaser_856x400.png"></meta>
                    <div class="content_startup_blok current_investment " href="investment/vanilla-bean.html">
                        <a itemprop="url" title="vanilla bean" href="investment/vanilla-bean.html">
                            <div class="stratup_img lazy" data-src="https://www.companisto.com/assets/1546954124_profile%20teaser_856x400.png" title="vanilla bean" href="investment/vanilla-bean.html"
                                                >


                                                </div>
                        </a>
                        <div itemprop="logo" class="st_logo lazy" data-src="https://www.companisto.com/assets/1546954124_LOGO_white%20400x400px.png"
                                        ></div>
                        <div class="row content_info">
                            <a itemprop="url" title="vanilla bean" href="investment/vanilla-bean.html">
                                <h2 class="mb-5px">vanilla bean</h2>
                            </a>
                            <span class="grey_50 startupLocation"><i class="fa fa-map-marker" aria-hidden="true"></i> Regensburg, DE</span>

                            <p itemprop="description">
                                <a href="investment/vanilla-bean.html" title="vanilla bean">
                                    Der weltweit erste verpackungsfreie Restaurant-Lieferdienst – CO2-frei und 100% vegan.                    </a>
                            </p>

                            <span class="typeStartupBg"><span></span></span>            </div>
                        <div class="row finance_info">
                            <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                                        Ziel:

                                    500.000 &euro;                                    </div>
                            <div class="col-xs-5 col-sm-6 block_finance_right text-right">


                                                                <div class="block_time_left">
                                            <i class="fa fa-clock-o time_icon" aria-hidden="true" style="font-size: 18px;vertical-align: middle;color:#5b8b9b;padding-bottom: 2px;"></i>
                                            noch 36 Tage                            </div>


                            </div>
                        </div>

                        <div class="row progress_info nopadding">
                                                                            <div class="col-xs-12 progress canInvest">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">23%</div>
                                        </div>
                                                                            <div class="col-xs-6 block_details borderRightgrey">

                                        <strong>116.250 &euro;</strong>

                                    Investiert                    </div>
                                                    <div class="col-xs-6 block_details">
                                    <strong>137</strong>Companisten                    </div>

                                        </div>
                                    <div class="footer_startup ">

                                JETZT INVESTIEREN                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-no " data-uri="investments.html"
                             itemscope itemtype="http://schema.org/Product">


                    <meta itemprop="image" content="../assets/1535029843_weissenhaus_profile%20teaser_856x400_V1.jpg"></meta>
                    <div class="content_startup_blok  " href="investments.html">
                        <a itemprop="url" title="WEISSENHAUS" href="investments.html">
                            <div class="stratup_img lazy" data-src="https://www.companisto.com/assets/1535029843_weissenhaus_profile%20teaser_856x400_V1.jpg" title="WEISSENHAUS" href="investments.html"
                                                >


                                                </div>
                        </a>
                        <div itemprop="logo" class="st_logo lazy" data-src="../assets/1535040283_weissenhaus.jpg"
                                        ></div>
                        <div class="row content_info">
                            <a itemprop="url" title="WEISSENHAUS" href="investments.html">
                                <h2 class="mb-5px">WEISSENHAUS</h2>
                            </a>
                            <span class="grey_50 startupLocation"><i class="fa fa-map-marker" aria-hidden="true"></i> Weissenhaus, DE</span>

                            <p itemprop="description">
                                <a href="investments.html" title="WEISSENHAUS">
                                    Das WEISSENHAUS Grand Village Resort & Spa am Meer ist ein privat geführtes...                    </a>
                            </p>

                            <span class="typeStartupBg"><span></span></span>            </div>
                        <div class="row finance_info">
                            <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                                        Ziel:

                                    7.500.000 &euro;                                    </div>
                            <div class="col-xs-5 col-sm-6 block_finance_right text-right">


                                    <i class="fa fa-check" aria-hidden="true"></i>

                            </div>
                        </div>

                        <div class="row progress_info nopadding">
                                                                            <div class="col-xs-12 progress">
                                            <div class="progress-bar progress-bar-funded" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">100%</div>
                                        </div>
                                                                            <div class="col-xs-6 block_details borderRightgrey">

                                        <strong>7.500.000 &euro;</strong>

                                    Investiert                    </div>
                                                    <div class="col-xs-6 block_details">
                                    <strong>1641</strong>Companisten                    </div>

                                        </div>
                                    <div class="footer_startup footer_startup_gray">

                                Abgeschlossen                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-no equity_campaign" data-uri="https://www.companisto-investments.de/de/investment/ameriaag"
                             itemscope itemtype="http://schema.org/Product">


                    <meta itemprop="image" content="../assets/1543691113_ameria_startup_image.png"></meta>
                    <div class="content_startup_blok  " href="https://www.companisto-investments.de/de/investment/ameriaag">
                        <a itemprop="url" title="AMERIA AG" href="https://www.companisto-investments.de/de/investment/ameriaag">
                            <div class="stratup_img lazy" data-src="https://www.companisto.com/assets/1543691113_ameria_startup_image.png" title="AMERIA AG" href="https://www.companisto-investments.de/de/investment/ameriaag"
                                                >


                                                </div>
                        </a>
                        <div itemprop="logo" class="st_logo lazy" data-src="../assets/1527151902_ameria.jpg"
                                        ></div>
                        <div class="row content_info">
                            <a itemprop="url" title="AMERIA AG" href="https://www.companisto-investments.de/de/investment/ameriaag">
                                <h2 class="mb-5px">AMERIA AG</h2>
                            </a>
                            <span class="grey_50 startupLocation"><i class="fa fa-map-marker" aria-hidden="true"></i> Heidelberg, DE</span>

                            <p itemprop="description">
                                <a href="https://www.companisto-investments.de/de/investment/ameriaag" title="AMERIA AG">
                                    Eigenkapital-Beteiligungen – Erste Aktienemission über Companisto....                    </a>
                            </p>
                                                            <div class="title_info">
                                <span class="info_box box_gray">aktien</span>
                                <span class="info_box box_black">Eigenkapital</span>
                            </div>

                            <span class="typeStartupBg"><span></span></span>            </div>
                        <div class="row finance_info">
                            <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                                        Ziel:

                                    5.500.000 &euro;                                    </div>
                            <div class="col-xs-5 col-sm-6 block_finance_right text-right">


                                    <i class="fa fa-check" aria-hidden="true"></i>

                            </div>
                        </div>

                        <div class="row progress_info nopadding">
                                                                            <div class="col-xs-12 progress">
                                            <div class="progress-bar progress-bar-funded" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">100%</div>
                                        </div>
                                                                            <div class="col-xs-6 block_details borderRightgrey">
                                                                <strong>5.500.000 &euro;</strong>

                                    Investiert                    </div>
                                                    <div class="col-xs-6 block_details">
                                    <strong>850</strong>Companisten                    </div>

                                        </div>
                                    <div class="footer_startup footer_startup_gray">

                                Abgeschlossen                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4 startup_blok active-no " data-uri="investment/replicate.html"
                             itemscope itemtype="http://schema.org/Product">


                    <meta itemprop="image" content="../assets/1502361611_2017-08-10_replicate-profile_v3_1000x400px.jpg"></meta>
                    <div class="content_startup_blok  " href="investment/replicate.html">
                        <a itemprop="url" title="REPLICATE® System" href="investment/replicate.html">
                            <div class="stratup_img lazy" data-src="https://www.companisto.com/assets/1502361611_2017-08-10_replicate-profile_v3_1000x400px.jpg" title="REPLICATE® System" href="investment/replicate.html"
                                                >


                                                        <div class="co_financing">
                                        Co-finanzierung                        </div>
                                                </div>
                        </a>
                        <div itemprop="logo" class="st_logo lazy" data-src="../assets/1502187945_2017-08-08_replicate_profile-graphics_logo_V2.jpg"
                                        ></div>
                        <div class="row content_info">
                            <a itemprop="url" title="REPLICATE® System" href="investment/replicate.html">
                                <h2 class="mb-5px">REPLICATE® System</h2>
                            </a>
                            <span class="grey_50 startupLocation"><i class="fa fa-map-marker" aria-hidden="true"></i> Berlin, DE</span>

                            <p itemprop="description">
                                <a href="investment/replicate.html" title="REPLICATE® System">
                                    Mit dem REPLICATE® System der NDI AG wird die Versorgung von Zahnlücken für den...                    </a>
                            </p>

                            <span class="typeStartupBg"><span></span></span>            </div>
                        <div class="row finance_info">
                            <div class="col-xs-7 col-sm-6 block_finance_left text-left  block_days_left_gray">
                                                        Ziel:

                                    2.500.000 &euro;                                    </div>
                            <div class="col-xs-5 col-sm-6 block_finance_right text-right">


                                    <i class="fa fa-check" aria-hidden="true"></i>

                            </div>
                        </div>

                        <div class="row progress_info nopadding">

                                        <div class="col-xs-12 progress_completed">
                                            <div class="progress-bar progress_completed" role="progressbar" aria-valuenow="140" aria-valuemin="0" aria-valuemax="100" style="width:100%">140%</div>
                                        </div>

                                                                           <div class="col-xs-4 block_details borderRightgrey">

                                        <strong>3.500.000 &euro;</strong>

                                    Investiert                    </div>
                                                        <div class="col-xs-4 block_details borderRightgrey">
                                        <strong>1 M €</strong>Co-finanziert                        </div>
                                                    <div class="col-xs-4 block_details">
                                    <strong>2276</strong>Companisten                    </div>

                                        </div>
                                    <div class="footer_startup footer_startup_gray">

                                Abgeschlossen                            </div>
                    </div>
                </div>
            <script>
                $('.large-tooltip').tooltip();
            </script>
                </div>
            </div>
        <div class="row">
            <div class="col-xs-12 button-container">
                <a href="en/investments.html" class="btn layoutV2-btn">Current investment opportunities</a>
            </div>
        </div>
    </section>

    <section class="homepage-news">
        <div class="container">
            <div class="section-title">News</div>
        </div>

        <div class="container">
            <canvas id="hidden-canvas2" style="display:none"></canvas>
            <div class="row">


                                            <div class="col-sm-4">
                                                                <div id="news-1" class="news-block  news-block-image"
                            style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(assets/1548851982-teaser-800x600px_.jpg)'                         onclick="window.location = 'de/article/article-2766.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 30 January, 2019                        </div>
                            <div class="news-title">
                                Why vanilla bean focuses on vegan offerings<br />
                            </div>
                            <div class="news-brief ">
                                vanilla bean crosses the investment threshold. vanilla bean uses current examples to show that it makes economic sense to invest in the vegan market.                        </div>
                        </div>

                                        </div>


                                            <div class="col-sm-4">
                                                                <div id="news-2" class="news-block  "
                                                     onclick="window.location = 'de/article/article-2764.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 24 January, 2019                        </div>
                            <div class="news-title">
                                Rydies acquires new customers – movelo and EBIKE HOLIDAYS<br />
                            </div>
                            <div class="news-brief ">
                                With movelo, Rydies has gained another partner to expand its employee mobility services.                        </div>
                        </div>

                                        </div>


                                            <div class="col-sm-4">
                                                                <div id="news-3" class="news-block  news-block-image"
                            style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(assets/1548324240_teaser-800x600px_.png)'                         onclick="window.location = 'de/article/article-2762.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 24 January, 2019                        </div>
                            <div class="news-title">
                                BE Food and StadtFarm arouse international interest<br />
                            </div>
                            <div class="news-brief ">
                                A few days ago, the StadtFarm was visited by a high-profile visitor: the Australian Minister of Agriculture came to find out about our water-conserving AquaTerraPonik technology.                        </div>
                        </div>

                                        </div>


                            <div class="col-sm-8">
                                        <div id="news-4" class="news-block news-block-large news-block-image"
                            style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(assets/1548240207_teaser-800x600px_.jpg)'                         onclick="window.location = 'de/article/article-2763.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 23 January, 2019                        </div>
                            <div class="news-title">
                                vanilla bean gets off to a strong start<br />
                            </div>
                            <div class="news-brief news-brief-large">
                                vanilla bean has launched its campaign successfully. Detailed information on financial planning is available. You can also watch the recording of the video conference.                        </div>
                        </div>

                                        </div>


                                            <div class="col-sm-4">
                                                                <div id="news-5" class="news-block  "
                                                     onclick="window.location = 'de/article/article-2759.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 17 January, 2019                        </div>
                            <div class="news-title">
                                Rydies in the final spurt - a look at the highlights<br />
                            </div>
                            <div class="news-brief ">
                                There are just 7 days left for an investment in Rydies' urban mobility solution. We look back at milestones reached during the campaign.                        </div>
                        </div>



                                                                    <div id="news-6" class="news-block  news-block-image"
                            style='background-image: linear-gradient(rgba(6, 6, 6, 0.69), rgba(87, 87, 90, 0.5)),url(assets/1547715727-befood-AG-update%207teaser-800x600px_.jpg)'                         onclick="window.location = 'de/article/article-2760.html';"
                        >
                            <div class="news-date">
                                <strong>News</strong> | 17 January, 2019                        </div>
                            <div class="news-title">
                                BE Food approaches the home stretch with a new look<br />
                            </div>
                            <div class="news-brief ">
                                The StadtFarm gets a whole new look to stand out in retail. Additionally, our campaign is approaching its final spurt with big leaps!                        </div>
                        </div>

                                        </div>

                                                </div>

                <div class="row">
                    <div class="col-xs-12 button-container">
                        <a href="de/news.html" class="btn layoutV2-btn">View all news</a>
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

    <section class="homepage-statistics">
        <div class="container">
            <div class="section-title">Companisto in figures</div>
        </div>

            <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/companist_homepages.png')}}" class="stats-icon">
                        <h4>94,236</h4>
                        <p class="grey_75">Companists</p>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/invested_homepage.png')}}" class="stats-icon">
                        <h4>
                             <span>&euro;</span> 60,300,992                    </h4>
                        <p class="grey_75">Invested</p>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/exits_homepage.png')}}" class="stats-icon">
                        <h4>5 Exits</h4>
                        <p class="grey_75">Sold startups</p>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/jobs_homepage.png')}}" class="stats-icon">
                        <h4 class="grey">1154</h4>
                        <p class="grey_75">New jobs</p>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/rounds-of-financing_homepage.png')}}" class="stats-icon">
                        <h4 class="grey">117</h4>
                        <p class="grey_75">rounds of financing</p>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="stats-icon-block">
                        <img src="{{ asset('frontend/graphics/layout/payments_homepage.png')}}" class="stats-icon">
                        <h4 class="grey">
                             <span>&euro;</span> 4,716,812                    </h4>
                        <p class="grey_75">in payments to Companists</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ANGEL CLUB SECTION  -->
    <section class="homepage-angel-club container-fluid">
        <div class="container">
            <div class="row row-angel-club">
                <div class="col-md-6 col-sm-12 col-xs-12 column-angel-club">
                    <div class="description-angel-club">The Companisto Angel Club is a special area for affluent investors and business angels on Companisto. Members are given the opportunity to participate in companies at preferential conditions.</div>
                    <img src="{{ asset('frontend/graphics/layout/angel_club_companisto_logo_2_white.png')}}" class="logo-angel-club"/>
                </div>
                <div class="col-md-5 col-md-offset-2 col-sm-12 col-xs-12 column-angel-club centering-column">
                    <a href="en/angel-club.html" class="btn layoutV2-btn-angel-club">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage-testimonials">
        <div class="container">
            <div class="section-title">What our investors say</div>
        </div>

        <div class="container homepage-testimonials-large-devices">
            <div class="row item active">
                <div class="col-md-4 col-xs-12">
                    <div class="testimonial-box">
                        <div class="carousel-caption">
                            <div class="who">
                                <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_1_new_homepage.png')}}"><br />
                            </div>
                            <p>
                                “Easy, straight-forward, and everything explained.<br/> Investing this way is fun.”
                            </p>
                            <div class="who-name">
                                <strong>Hans-Peter P.</strong> <br/>
                                <i>Investor</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="testimonial-box">
                        <div class="carousel-caption">
                            <div class="who">
                                <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_2_new_homepage.png')}}"><br />
                            </div>
                            <p>
                                “An easy, straight-forward and comfortable solution for investing venture capital. <br/>Contact is always friendly and the processes run quickly. I like being a customer here.“
                            </p>
                            <div class="who-name">
                                <strong>Michael H.</strong> <br/>
                                <i>Investor</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="testimonial-box">
                        <div class="carousel-caption text-center">
                            <div class="who">
                                <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_3_new_homepage.png')}}"><br />
                            </div>
                            <p>
                                “A good selection of startups; realistic financial goals; honest company information; good updates.”
                            </p>
                            <div class="who-name">
                                <strong>Gerhard H.</strong> <br/>
                                <i>Investor</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container homepage-testimonials-small-devices">
            <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="row item active">
                        <div class="col-xs-12">
                            <div class="testimonial-box">
                                <div class="carousel-caption">
                                    <div class="who">
                                        <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_1_new_homepage.png')}}"><br />
                                    </div>
                                    <p>
                                        “An easy, straight-forward and comfortable solution for investing venture capital. <br/>Contact is always friendly and the processes run quickly. I like being a customer here.”
                                    </p>
                                    <div class="who-name">
                                        <strong>Hans-Peter P.</strong> <br/>
                                        <i>Investor</i>
                                    </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row item">
                        <div class="col-xs-12">
                            <div class="testimonial-box">
                                <div class="carousel-caption text-center">
                                    <div class="who">
                                        <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_2_new_homepage.png')}}"><br />
                                    </div>
                                    <p>
                                        “An easy, straight-forward and comfortable solution for investing venture capital. <br/>Contact is always friendly and the processes run quickly. I like being a customer here.”
                                    </p>
                                    <div class="who-name">
                                        <strong>Michael H.</strong> <br/>
                                        <i>Investor</i>
                                    </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row item">
                        <div class="col-xs-12">
                            <div class="testimonial-box">
                                <div class="carousel-caption text-center">
                                    <div class="who">
                                        <img class="lazy" src="{{ asset('frontend/graphics/layout/testimonial_pic_color_3_new_homepage.png')}}"><br />
                                    </div>
                                    <p>
                                        “An easy, straight-forward and comfortable solution for investing venture capital. <br/>Contact is always friendly and the processes run quickly. I like being a customer here.”
                                    </p>
                                    <div class="who-name">
                                        <strong>Gerhard H.</strong> <br/>
                                        <i>Investor</i>
                                    </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel2" data-slide="prev" style="margin-left: -150px;color: #434343;">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel2" data-slide="next" style="margin-right: -150px;color: #434343;">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel2" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
    </section>

    <section class="homepage-newsletter">
        <div class="container-fluid newsletter-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 newsletter-text">
                        <h2>Don’t miss our new investment opportunities</h2>
                        <p>Click and subscribe to our weekly newsletter for all the latest investment news and start-ups</p>

                        <div class="newsletter-input">
                            <form name="newsletter-form-home" method="get" action="https://www.companisto.com/en/newsletter-subscribe">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="E-mail address">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="document.getElementsByName('newsletter-form-home')[0].submit();"> Subscribe</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-lg-offset-2 col-md-4 hidden-xs hidden-sm newsletter-img">
                        <img src="{{ asset('frontend/graphics/layout/telefon-subscribe-down.png')}}"  alt=""/>
                        <img src="{{ asset('frontend/graphics/layout/tel-mockup-en.png')}}"  alt=""/>                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="all-startups-background">
         <div class="row">
            <div class="col-xs-12 button-container">
                <a href="en/investments.html" class="btn layoutV2-btn">Current investment opportunities</a>
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
        </script>
@endsection
