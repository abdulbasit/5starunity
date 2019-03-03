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
    <link rel="stylesheet" href="{{ asset('frontend/code/jquery-ui/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/code/jquery-ui/jquery-ui.theme.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/code/css/style6c71.css?ver=1549632172')}}" />
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/Highcharts-4.1.8/js/highcharts.js')}}"></script>
    <script src="{{ asset('frontend/code/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/site-scripts7031.js?v=1548947668')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/code/scripts/login-register.js')}}"></script>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="newLayout">
        <div class="co_navbar">
                <nav class="navbar navbar-default new_header navbar-transparent absolute-positioning ">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="en/index.html">
                                {{-- <div class="navbar-logo-holder"></div> --}}
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li  ><a href="en/investments.html">LOTTERY of THINGS</a></li>
                                <li  ><a href="en/angel-club.html">ERFINDER / GRUNDER</a></li>
                                <li ><a href="en/for-founders.html">PARTNER</a></li>
                                <li class="dropdown" id="bigmenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More&nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu largeDropdown" role="menu" aria-labelledby="bigmenu">
                                        <div class="row nopadding">
                                            <div class="col-md-12 nopadding text-left">
                                                <div class="list_nav">
                                                    <ul>
                                                        <li><a href="en/how-it-works.html">How It <span>Works</span></a></li>
                                                        <li><a href="en/academy.html">Investors'<span>Academy</span></a></li>
                                                        <li><a href="en/blog.html">Blog</a></li>
                                                        <li><a href="de/news.html">News</a></li>
                                                        <li><a href="de/about.html">About Us</a></li>
                                                        <li><a href="de/press.html">Media Info</a></li>
                                                        <li><a href="de/contact-us.html">Contact Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="nav pull-left">
                                <li><a class="navbar-brand" href="en/index.html"><div class="navbar-logo-holder"></div></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="login uppercase" id="LoginForm" href="#" data-toggle="modal" data-form="login" data-target="#myLogin">Log In</a></li>
                                <li><a class="register uppercase" id="RegisterForm" href="#" data-toggle="modal" data-target="#myLogin">Sign Up</a></li>
                                <li><a href="en.html" class="uppercase language-link no_padding_right bold-text">EN</a></li>
                                <li class="lang-separator hidden-xs hidden-sm">|</li>
                                <li><a href="en.html" class="uppercase language-link no_padding_left ">DE</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

<div class="modal LoginModal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myLoginLabel">
    <div class="modal-dialog" role="document" id="contentToLoad">

    </div>
</div>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>



    <div id="Notice">
            <div class="container border">
                <div class="row">
                    <div class="col-xs-12 NoticeTitle grey_75 text-center">
                        <h6>Please note</h6>
                        The acquisition of this asset involves considerable risks and can lead to the complete loss of the assets used. The expected yield is not guaranteed and may turn out to be lower.			</div>
                </div>
            </div>
        </div>

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
            <div id="footerNew" class="panel-group">
                <div class="mask">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 panel-default footerCol">

                                <div class="larger footerAcc" id="titlefooterKontakt" data-toggle="collapse" data-parent="#footerKontakt" href="#footerKontakt" aria-expanded="true" aria-controls="footerKontakt">
                                    Contact Us                            <span class="arrow_footer">
                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div id="footerKontakt" class="customer_relations panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="text-left">
                                                <div class="custom_relations_detail">If you have any questions about investing on Companisto, please contact our service team:</div>
                                            </div>
                                        </div>

                                        <div class="row nopadding">

                                            <div class="col-md-12 nopadding">
                                                                                        <div class="email2"><br/><i class="fa fa-envelope" aria-hidden="true"></i><script type="text/javascript">eTd('companisto.com', 'service');</script></div><br/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="details_about_customer_relations">
                                                    <p class="toll_free_service">Phone number for investors</p>
                                                    <p>
                                                        <span class="glyphicon glyphicon-earphone"></span> <strong>0800 - 100 267 0 (DE/Toll-free)</strong><br />
                                                        <span class="glyphicon glyphicon-earphone"></span> <strong> +49(0)30 3464914 93</strong><br />
                                                    </p>

                                                    <p>We are available <strong>Monday through Friday</strong> between <strong>9 a.m. – 7 p.m. </strong></p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 panel-default footerCol">


                                <div class="larger footerAcc" id="titlefooterInvetoren" data-toggle="collapse" data-parent="#footerInvetoren" href="#footerInvetoren" aria-expanded="true" aria-controls="footerInvetoren">
                                    For investors                            <span class="arrow_footer">
                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div id="footerInvetoren" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <a href="de/why-invest.html">Why invest?</a>
                                        <a href="de/faq.html">FAQ for Investors</a>
                                        <a href="en/angel-club.html">Angel Club</a>
                                        <a href="de/recommend-friend.html">Refer a Friend</a>
                                        <a href="de/vib.html">Investments Information Sheets</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 panel-default footerCol">
                                <div class="larger footerAcc" id="titlefooterCompanisto2"  data-toggle="collapse" data-parent="#footerCompanisto2" href="#footerCompanisto2" aria-expanded="true" aria-controls="footerCompanisto2">
                                    Companisto
                                    <span class="arrow_footer">
                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div id="footerCompanisto2" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <a href="de/about.html">About Us</a>
                                        <a href="de/press.html">Media Info</a>
                                        <a href="de/career.html">Career</a>
                                        <a href="de/page/netiquette.html">Netiquette</a>
                                        <a href="de/page/zahlungsdetails.html">Payment Details</a>
                                        <a href="de/partnerprogramm.html">Partner Program</a>
                                        <a href="de/voucher-terms-and-conditions.html">Voucher terms and conditions</a>

                                    </div>
                                </div>

                            </div>


                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 panel-default footerCol">

                                <div class="larger footerAcc" id="titlefooterCompanies" data-toggle="collapse" data-parent="#footerCompanies" href="#footerCompanies" aria-expanded="true" aria-controls="footerCompanies">
                                    For companies                            <span class="arrow_footer">
                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div id="footerCompanies" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <a href="en/for-founders.html">Apply for financing</a>
                                        <a href="de/how-it-works.html">Investment Model</a>
                                        <a href="de/faq.html#startup-questions">FAQ for Companies</a>
                                        <div class="footer-address-details">
                                            Companisto GmbH<br/>
                                            Köpenicker Str. 154<br/>
                                            10997 Berlin
                                        </div>
                                        <a href="https://www.bundesverband-crowdfunding.de/transparenzsiegel/" target="_blank">
                                            <img class="logo-crowdfunding" src="graphics/layout/bvcf_transparenzsiegel_2019-300x300.png">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footerBottomBar">
                <div class="container border">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BottomText grey_75 text-center">
                            <a style="text-decoration: none;cursor: default !important;">&copy; 2011 - 2019 Companisto</a>
                            <a href="de/page/business-terms.html">Terms and Conditions</a>
                            <a href="de/page/privacy-policy.html">Privacy Policy</a>
                            <a href="de/page/impressum.html">Legal Notice</a>
                        </div>

                        <div class="clear"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BottomFollow-us grey_75 text-center">
                            <div id="follow-us-footer">
                                <ul>
                                    <li><a target="_blank" href="https://www.linkedin.com/company/companisto" title="Follow Companisto on Linkedin">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a target="_blank" href="http://www.facebook.com/Companisto" title="Follow Companisto on facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a target="_blank" href="https://twitter.com/Companisto" title="Follow Companisto on Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a target="_blank" href="https://www.instagram.com/companis.to/" title="Follow Companisto on instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li><a target="_blank" href="https://www.xing.com/companies/companistogmbh" title="Follow Companisto on XING">
                                            <i class="fa fa-xing" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a target="_blank" href="http://www.youtube.com/companisto" title="Follow Companisto on YouTube">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        </a>
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
<script src='{{ asset('frontend/code/scrollReveal/scrollReveal.js')}}'></script>
<script>
	var config = {
		vFactor: 0.50
	}

	$(document).ready(function(){
		if (typeof scrollReveal !== 'undefined') {
			window.sr = new scrollReveal( config );
		}
	});
</script>




<style>
    .register-overlay .LoginModal.main-row {
        background-color:#5b8b9b !important;
    }

    #register_btn_modal_register_overlay{
        color:#5b8b9b !important;
    }

    #register_btn_modal_register_overlay .fa {

            color:#5b8b9b !important;

    }

    #register_btn_modal_register_overlay:hover .fa{
        color:#fff !important;
    }

    #register_btn_modal_register_overlay:hover{
        color:#fff !important;
    }

    .form-control{
        border-radius:0;
    }
</style>





	<!--End of Zopim Live Chat Script-->
	<script>
	$(window).on('load',function(){
			});
	$('#myLogin').on('show.bs.modal', function (event) {
		var what = $(event.relatedTarget).attr('id');
		loadLoginForm(what);
	});

	// Empty modal content on close
	$(document).on('hide.bs.modal', '#myLogin', function (e) {
		$("#contentToLoad").empty();
	});

	function loadLoginForm(what){
		//var what = what.replace('_load', '');
		$.ajax({
			url: "https://www.companisto.com/en/login-ajax",
			data: { what: what },
			type: "GET",
			success: function(data){
				$("#contentToLoad").html(data);
			}
		});
	}

	function CloseVideoloadLoginFromExternal() {
		$('#video_modal').modal('hide');
		loadLoginFromExternal();
	}

	function loadLoginFromExternal() {
		$('#myLogin').modal('show');
		var what = 'RegisterForm';		loadLoginForm(what);
	}

	function loadLoginPopup(){
		$('#myLogin').modal('show');
		var what = 'LoginForm';
		loadLoginForm(what);
	}
	function loadRegisterPopup() {
		$('#myLogin').modal('show');
		var what = 'RegisterForm';
		loadLoginForm(what);
	}

		// Unveil images script
	!function(t){t.fn.unveil=function(i,e){var n,r=t(window),o=i||0,u=window.devicePixelRatio>1?"data-src-retina":"data-src",s=this;function l(){var i=s.filter(function(){var i=t(this);if(!i.is(":hidden")){var e=r.scrollTop(),n=e+r.height(),u=i.offset().top;return u+i.height()>=e-o&&u<=n+o}});n=i.trigger("unveil"),s=s.not(n)}return this.one("unveil",function(){var t=this.getAttribute(u);(t=t||this.getAttribute("data-src"))&&("IMG"===this.tagName?this.setAttribute("src",t):this.style.backgroundImage="url("+t+")","function"==typeof e&&e.call(this))}),r.on("scroll.unveil resize.unveil lookup.unveil click.unveil",l),l(),this}}(window.jQuery);


	$(document).ready(function() {
		$(".lazy").unveil(300);
	});


	$('.larger').on('click', function () {
		$($(this).data('target')).collapse('toggle');
	});

	// Toogle footer menu accordion only on mobile
	if ($(window).width() > 500) {
		$('.footerAcc').removeAttr('data-toggle');
	}

</script>
</body>
</html>
