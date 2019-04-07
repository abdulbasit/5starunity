<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-2" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="rgba(70,104,109,.8)">
    <meta name="msapplication-navbutton-color" content="rgba(70,104,109,.8)">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900|Open+Sans:300,300i,400,600,600i,700,700i,800,800i|Oswald:200,300,400,500,600,700|Lato:100,400,300,300italic,400italic,700,700italic,900italic,900|Kalam:300,400,700|Roboto+Condensed|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('frontend/code/css/fonts/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/code/jquery-ui/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/code/jquery-ui/jquery-ui.theme.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/code/css/style6c71.css?ver=1549632172')}}" />
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/Highcharts-4.1.8/js/highcharts.js')}}"></script>
    <script src="{{ asset('frontend/code/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/site-scripts7031.js?v=1548947668')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/login-register.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/main.js')}}"></script>
    @yield('style')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="newLayout">
        <div class="co_navbar" style="height: 80px">
                <nav class="navbar navbar-default new_header navbar-transparent absolute-positioning ">
                    <div class="container">
                        <div class="navbar-header">
                            <div class="col-xs-10 hidden-lg">
                                <a class="navbar-brand" href="en/index.html">
                                    <div class="navbar-logo-holder"></div>
                                </a>
                            </div>
                            <div class="col-xs-2">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color:black">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li  ><a href="/">LOTTERY of THINGS</a></li>
                                <li  ><a href="{{route('ceo')}}">ERFINDER / GRUNDER</a></li>
                                <li ><a href="{{route('partner')}}">PARTNER</a></li>
                                <li class="dropdown" id="bigmenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More&nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu largeDropdown" role="menu" aria-labelledby="bigmenu">
                                        <div class="row nopadding">
                                            <div class="col-md-12 nopadding text-left">
                                                <div class="list_nav">
                                                    <ul>
                                                        <li><a href="{{route('howitworks')}}">How It <span>Works</span></a></li>
                                                        <li><a href="{{route('inventro.acadmy')}}">Investors'<span>Academy</span></a></li>
                                                        <li><a href="{{route('news')}}">News</a></li>
                                                        <li><a href="{{route('about-us')}}">About Us</a></li>
                                                        <li><a href="{{route('media-info')}}">Media Info</a></li>
                                                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="nav pull-left hidden-xs">
                                <li><a class="navbar-brand" href="/"><div class="navbar-logo-holder"></div></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                @if(!Auth::guard('client')->check())
                                    <li><a class="login uppercase" href="{{ route('login') }}">Log In</a></li>
                                    <li><a class="register uppercase" href="{{ route('register') }}">Register</a></li>
                                @else
                                <li class="dropdown" id="bigmenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MY ACCOUNT&nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu largeDropdown" role="menu" aria-labelledby="bigmenu" style="padding:0px !important; padding-bottom:7px !important">
                                        <div class="row nopadding">
                                            <div class="col-md-12 nopadding text-left">
                                                <div class="list_nav">
                                                    <ul>
                                                        <li><a href="{{route('profile')}}">My Profile</a></li>
                                                        <li><a href="/logout">LOG OUT </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                <li><a href="en.html" class="uppercase language-link no_padding_right bold-text">EN</a></li>
                                <li class="lang-separator hidden-xs hidden-sm">|</li>
                                <li><a href="en.html" class="uppercase language-link no_padding_left ">DE</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('footer')

        <div id="defaultFooter">

            <div class="modal KontactModal fade" id="KontactForm" tabindex="-1" role="dialog" aria-labelledby="KontactFormLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Contact Us</h4>
                        </div>

                        <div class="modal-body bodyKontact">
                            <div class="row">
                                <div class="col-xs-12 col-md-4 TelNr text-center">
                                    <div class="iconKontact"></div>
                                    <div class="infoAbout text-left pluspadding">
                                        <p class="toll_free_service">Phone number for investors</p>
                                        <p>
                                            <span class="glyphicon glyphicon-earphone"></span> <strong>0800 - 100 267 0 (DE/Toll-free)</strong><br />
                                            <span class="glyphicon glyphicon-earphone"></span> <strong>+49(0)30 3464914 93</strong><br />
                                        </p>
                                        <p><strong>Mo-Fr 9 a.m. - 7 p.m.</strong></p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4 LiveChat text-center">
                                    <div class="iconKontact"></div>
                                    <div class="infoAbout">
                                        <a class="btn-default-new-layout btn-new-layout-white-transparent marginBottom30pxMobile" href="javascript:$zopim.livechat.window.show();$('#KontactForm').modal('hide');">Start live chat</a>
                                        <br/>
                                        <br/>
                                        <p><strong>Mo-Fr 9 a.m. - 7 p.m.</strong></p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4 EmailForm text-center">
                                    <div class="iconKontact"></div>
                                    <div class="infoAbout">
                                        <a class="btn-default-new-layout btn-new-layout-white-transparent marginBottom30pxMobile" href="de/contact-us.html#contact" target="_blank">More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-10 col-md-offset-1 text-center whiteBorderKontact">
                                    <a class="btn-default-new-layout btn-new-layout-transparent-white" href="de/faq.html" target="_blank">Help center</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="followUsWrapNew" style="background: transparent !important;">
            </div>

            <div id="footerBottomBar">
                <div class="container border">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BottomText grey_75 text-center">
                            <a style="text-decoration: none;cursor: default !important;">&copy; <?php echo date('Y') ?> 5Starunity</a>
                            <a href="de/page/business-terms.html">Terms and Conditions</a>
                            <a href="de/page/privacy-policy.html">Privacy Policy</a>
                            <a href="de/page/impressum.html">Legal Notice</a>
                        </div>

                        <div class="clear"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BottomFollow-us grey_75 text-center">
                            <div id="follow-us-footer">
                                <ul>
                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on Linkedin">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on XING">
                                            <i class="fa fa-xing" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#" title="Follow Companisto on YouTube">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <br />
                                    <li>
                                        <font color="black">
                                            Designed and Developed by <a href="https:://www.xnowad.com" target="_blank"><font color="blue" size="4">Xnowad.com</font></a>
                                        </font>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="investoren_support_div" data-toggle="modal" data-target="#KontactForm" id="BtnInvestorenSupport">
            <span>Investor Support</span>
            <img src="graphics/layout/LiveChat.svg" class="iconSupport">
        </div>
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/jquery.bcSwipe.min.js')}}"></script>
    <script src="{{ asset('frontend/code/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    @yield('script')
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
      $(".navbar").css('top','0');
  } else {
    $(".navbar").css('top','-100px');
  }
  prevScrollpos = currentScrollPos;
}
</script>
</body>
</html>
