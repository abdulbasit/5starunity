@section('footer')
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
                        <a style="text-decoration: none;cursor: default !important;">&copy; <?php echo date('Y') ?> 5starUnity e.V.</a>
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
                                </li><br />
                                <li>
                                    <font color="black">
                                    Designed and Developed by <a href="xnowad.com"><font color="blue">Xnowad.com</font></a>
                                    </font>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="investoren_support_div" data-toggle="modal" data-target="#KontactForm" id="BtnInvestorenSupport">
        <span>Investor Support</span>
        <img src="graphics/layout/LiveChat.svg" class="iconSupport">
    </div> --}}
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
@endsection
