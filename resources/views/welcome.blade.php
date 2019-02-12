@extends('layouts.app')
@section('content')

<section class="homepage-header">
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
    </section>
    <section class="homepage-howitworks">
        <div class="container">
            <div class="section-title">Investing together in innovation</div>
            <div class="section-subtitle">
                 Companisto is the investment platform for startups and growth companies. Business angels and investors join forces to invest venture capital in groundbreaking innovations, promising companies, and ideas that make history.        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row circles-holder">
                        <div class="col-md-4 c_dist">
                            <div class="circle c_st">
                                <div class="circle_icon">
                                    <img src="{{ asset('frontend/graphics/layout/icon-left-top.png')}}" alt="" />
                                </div>
                                <div class="circle_text">
                                    Selection
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c_dist">
                            <div class="circle c_nd">
                                <div class="circle_icon">
                                    <img src="{{ asset('frontend/graphics/layout/icon-mid-top.png')}}" alt="" />
                                </div>
                                <div class="circle_text">
                                    Investment
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c_dist">
                            <div class="circle c_rd">
                                <div class="circle_icon">
                                    <img src="{{ asset('frontend/graphics/layout/icon-right-top.png')}}" alt="" />
                                </div>
                                <div class="circle_text">
                                    Yield opportunity
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 button-container">
                    <a href="en/investments.html" class="btn layoutV2-btn">Invest with just a few clicks </a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage-popular-startups">
        <div class="container-fluid">
            <div class="section-title padding-title">Popular Investments</div>
        </div>

        <div class="container-fluid no-padding">
            <script src="{{ asset('frontend/code/jquery_touchwipe/jquery.touchwipe.1.1.1.js')}}"></script>


     <div class="ps_parent_circles">
        <div class="ps_circles">
            <i class="fa fa-circle circle" data-position="1"></i>
        </div>
    </div>


    <div class="ps_main_parent">
        <div class="ps_main_view_holder" id="ps_main_view">

            <div class="ps_main_view_content" data-uri="">
                <div class="ps_main_view_fade">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="ps_main_view_cofinancing"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7 col-sm-8">
                            <div class="ps_main_view_title"></div>
                            <div class="ps_main_view_city"></div>
                        </div>
                        <div class="col-xs-5 col-sm-4">
                            <div class="ps_main_view_logo" >
                                <img src="#" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-lg-8 startups_descriptions">
                            <div class="ps_main_view_img">
                                <img src="#" />
                                <div class="banderoleWrapper extended_banderole"><div class="banderole extendedFlagNew"><h5>Extended</h5></div></div>
                                <div class="banderoleWrapper ending_banderole"><div class="banderole endingFlagNew"><h5>Ending Soon</h5></div></div>
                                <div class="ps_main_view_desc"></div>
                                <div class="ps_main_view_title_info">
                                    <span class="ps_info_box btn btn-xs  button_blue">NEW</span>
                                    <span class="ps_info_box btn btn-xs button_gray">shares</span>
                                    <span class="ps_info_box btn btn-xs button_black">Equity</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 startups_financial_info">
                            <div class="ps_main_view_gmbh">
                                <div class="ps_main_info_row">
                                    <p>Companisto Wertpapier GmbH</p>
                                    <div class="ps_main_info_label">Mediator</div>
                                </div>
                                <div class="ps_main_info_row">
                                    <p class="ps_main_wkn_code"></p>
                                    <div class="ps_main_info_label">WKN</div>
                                </div>
                                <div class="ps_main_info_row">
                                    <p class="ps_main_isin_code"></p>
                                    <div class="ps_main_info_label">ISIN</div>
                                </div>
                            </div>

                            <div class="ps_main_details_goal_and_time">
                                <span class="ps_goal"></span>
                                <span class="ps_left_time"></span>
                            </div>

                                <div class=" col-xs-12 ps_main_progress progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            <div class="ps_main_details first-detail">
                                <span class="ps_total_invested"></span>
                                <div class="ps_main_details_t">
                                    <span class="ps_main_invested_text"></span>
                                </div>
                            </div>

                            <div class="ps_main_details ps_main_details_reserved" data-html="true" data-toggle="tooltip" data-placement="left" title="">
                                <span class="ps_procent"></span>
                                <div class="ps_main_details_t">
                                    <span class="percentage_or_reserved_text"></span>
                                </div>
                            </div>

                            <div class="ps_main_details last-detail">
                                <span class="ps_companists"></span>
                                <div class="ps_main_details_t ">
                                    Companists
                                </div>
                            </div>


                            <!--<div class="ps_main_footer_text">

                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="ps" id="ps">
        <ul style='display:none'>

                                    <li class="ps-li" data-id="122"
                    data-counter-startup="1"
                    data-name="vanilla bean"
                    data-img="assets/1546954124_profile%20teaser_856x400.png"
                    data-invested="&euro; 116,250"
                    data-text-invested="Invested"
                    data-companists="137"
                    data-logo="assets/1546954124_LOGO_white%20400x400px.png"
                    data-goal="&euro; 500,000"
                    data-goal-text="Goal"
                    data-days-left="36 Days left"
                    data-is-ameria=""
                    data-is-ending-soon=""
                    data-is-extended=""
                    data-is-ameria=""
                    data-cofinancing=""
                    data-co-amount=""
                    data-cofinancing-cond="no"
                    data-city="Regensburg, DE"
                    data-co-amount-text="Co-financed"
                    data-perc="23%"
                    data-wkn-code=""
                    data-isin-code=""
                    data-perc-text="of financing goal"
                    data-total-progress="0"
                    data-footer-text=""
                    data-name-url="vanilla-bean"
                    data-tooltip-text1=""
                    data-tooltip-text2=""
                    data-tooltip-text3=""
                    data-desc="The world’s first packaging-free restaurant delivery service – CO&lt;sub&gt;2&lt;/sub&gt;-free and 100% vegan."
                    data-hide-timeleft="">
                    <img id="startup-image-122" src='assets/1546954124_profile%20teaser_856x400.png'>
                    <div class="text-center ps-startup-name"><strong>vanilla bean</strong></div>
                    <div class="text-center ps-startup-invested">Invested: &euro; 116,250</div>

                </li>

        </ul>
    </div>

    <script>
        if (vld_components === undefined){
            var vld_components = {};
        }

        $(window).on("resize", function(){
            var window_width = $(window).width() > 1920 ? 1920 : $(window).width();
            var width = window_width / 3;
            $("#ps").find("ul li").css("width", width + "px");
        });

        vld_components.ps_slider = function(config_object){
            this.items_container         = config_object.items_container;
            this.main_view               = config_object.main_view;
            this.main_parent             = config_object.main_parent;
            this.slide_speed             = config_object.slide_speed;
            this.controls                = config_object.controls;
            this.circles                 = config_object.circles;
            this.homepage                = config_object.homepage;
            this.mouseover               = false;
            this.animation_progress      = false;
            this.init();
        };

        vld_components.ps_slider.prototype.init = function(){
            var window_width = $(window).width() > 1920 ? 1920 : $(window).width();
            var width        = window_width / 3;
            this.items_container.find("ul li").css("width", width + "px");

            this.updateData();
            this.items_container.find("ul li").on("click", function(e){
                this.element_click_function(e, "");
            }.bind(this));

            /*********************************************************
                Click on left or right arrow to move slider
            *********************************************************/
            /*this.controls.find(".ps-left").on("click", function(e){
                this.element_click_function(e, "");
            }.bind(this));
            this.controls.find(".ps-right").on("click", function(e){
                this.element_click_function(e, "");
            }.bind(this));*/
            /******************************************************************************************/
            /******************************************************************************************/


            /*******************************************************************************************
                When click the circle indicator, color the right circle and display the right startup
                - click circle and get the number
                - check if number of current startup is the same with the clciked startup number
                - if the numbers are not the same, get all li , make loop and search the li with clicked ID
                - get all info about clicked startup from data attributes , go to main div and display info
            ********************************************************************************************/
            this.circles.find("i:nth-child(2)").append("<div class='current'></div>");
            this.circles.find("i:nth-child(2)").addClass("color_current_indicator");

            this.circles.find("i").on("click", function(e){
                var target              = e.target;
                var nr_indicator        = parseInt(target.getAttribute('data-position'));
                var nr_current_startup  = this.main_view.attr('data-nr-startup');

                this.colorRightIndicatorWhenClicked(target, nr_indicator);

                if(nr_indicator != nr_current_startup) {
                    this.items_container.find('ul li').each(function(e, item) {
                        var nr_start = $(item).attr('data-counter-startup');

                        if(nr_start == nr_indicator) {
                            this.updateDataWhenSelectIndicators(null, $(item));
                        }
                    }.bind(this));
                }
            }.bind(this));


            vld_components.ps_slider.prototype.colorRightIndicatorWhenClicked = function(current_indicator,nr_indicator){
                this.circles.find('i').each(function(e, item) {
                    if($(item).attr('data-position') != nr_indicator) {
                        $(this).removeClass('color_current_indicator');
                    }
                });
                $(current_indicator).addClass('color_current_indicator');
            };
            /******************************************************************************************/
            /******************************************************************************************/



            /**************************************
                 Swipe left and right on mobile --- ( !it's a library)
            ***************************************/
            var that = this;
            $("body").touchwipe({
                 wipeLeft: function(e) { that.element_click_function(e, "left"); },
                 wipeRight: function(e) { that.element_click_function(e, "right"); },
                 min_move_x: 20,
                 preventDefaultEvents: true
            });
            /****************************************************/
            /****************************************************/


            /*****************************************************
                If default is autoslide
                - when mouse is over , stop autoslide
                - when mouse is out , start autoslide
            ********************************************************/
                this.items_container.on("mouseover", function(){
                    this.mouseover = true;
                }.bind(this));

                this.items_container.on("mouseout", function(){
                    this.mouseover = false;
                }.bind(this));

                this.main_view.on("mouseover", function(){
                    this.mouseover = true;
                }.bind(this));

                this.main_view.on("mouseout", function(){
                    this.mouseover = false;
                }.bind(this));

                // Default autoslide
                var total_items  = this.items_container.find("ul li");
                if(total_items.length > 1) {
                    this.timer();
                }
            /********************************************************/
            /********************************************************/

        };


        /************************************************************************************
            Animat startup to left or right
        ***************************************************************************************/
        vld_components.ps_slider.prototype.element_click_function = function(e, direction){
            this.animation_progress = true;
            if(direction === "") {
                direction = e.pageX < $(window).width() / 2 ? "left" : "right";
            }


            this.items_container.find("ul").animate(
                {
                    left: direction === "right" ? "-=680px" : "+=680px"
                }, {
                    "duration": 250,
                    "easing": "linear",
                    "complete": function () {
                        this.items_container.find("ul").css({
                            left: direction === "right" ? "+=680px" : "-=680px"
                        });

                        if (direction === "left") {
                            var last_child = this.items_container.find("ul li:last-of-type");
                            this.items_container.find("ul").prepend(last_child);
                        }

                        if(direction === "right") {
                            var first_child = this.items_container.find("ul li:first-of-type");
                            this.items_container.find("ul").append(first_child);

                        }

                        this.updateData();
                        this.animation_progress = false;
                    }.bind(this)
                }
            );

            this.move_slider_indicators(direction);
        };

        /***********************************************************************************************************/
        /***********************************************************************************************************/



        /************************************************************************************
            Move circle indicator when click the startup to change it and color the current indicator
        ***************************************************************************************/
        vld_components.ps_slider.prototype.move_slider_indicators = function(direction){
            var position        = this.circles.find("i .current").parent().attr('data-position'); //get position of current i
            var count_circles   =  this.circles.find("i").length; //get count circles indicators

            this.circles.find("i .current").parent().removeClass('color_current_indicator');

            this.circles.find('i:nth-child('+position+')').find('.current').remove(); //delete current class from current last indicator

            // if thecurrent indicators is the last and you wsant to go to the next , check if position is the last and fo to the first child
            if(direction == 'right') {
                if(position == count_circles) {
                    this.circles.find("i:first-child").append("<div class='current'></div>");
                    this.circles.find("i:first-child").addClass('color_current_indicator');
                } else {
                     this.circles.find("i:nth-child(" + position + ")").next().append("<div class='current'></div>"); // go to the next indicators and add the class
                     this.circles.find("i:nth-child(" + position + ")").next().addClass('color_current_indicator');
                }
            } else {
                if(position == 1) {
                    this.circles.find("i:last-child").append("<div class='current'></div>");
                    this.circles.find("i:last-child").addClass('color_current_indicator');
                } else {
                    this.circles.find("i:nth-child(" + position + ")").prev().append("<div class='current'></div>"); // go to the next indicators and add the class
                    this.circles.find("i:nth-child(" + position + ")").prev().addClass('color_current_indicator');
                }
            }
        };
        /***********************************************************************************************************/
        /***********************************************************************************************************/



        /**********************************************************
            Timer for autoslider
        ******************************************************/
            vld_components.ps_slider.prototype.timer = function(){
                var interval = setInterval(function(){
                    if(this.mouseover === false) {
                        this.element_click_function(null, "right");
                    }
                }.bind(this), this.slide_speed);
            };
        /***********************************************************/
        /***********************************************************/



        /*****************************************************************************************************
            When click a circle indicator --- display data about choosed startup for that circle in the main div
        *******************************************************************************************************/
        vld_components.ps_slider.prototype.updateDataWhenSelectIndicators = function(e, selected_li){
            this.main_view.find(".ps_main_view_fade").hide();

            if(selected_li.attr("data-is-ameria") == true) {
                this.main_parent.find('.ps_main_view_holder').removeClass('ps_main_view_rest_startups');
                this.circles.find('.ps_circles').removeClass('ps_circles_not_main_view');
                this.homepage.find('.button-container').removeClass('button_container_not_main_view');

                $('.ps_main_details_reserved').tooltip("enable").tooltip("show").css('cursor','help');

                this.main_view.find('.startups_descriptions').removeClass('col-lg-8').addClass('col-lg-6');
                this.main_view.find('.startups_financial_info').removeClass('col-lg-4').addClass('col-lg-6');
                this.main_view.find('.ps_main_details').addClass('inline_details');
                this.main_view.find('.ps_main_details .first-detail').addClass('detail-border-right');
                this.main_view.find('.ps_main_details .last-detail').addClass('detail-border-left');
                this.main_view.find('.ps_main_details').addClass('inline_details');
                this.main_view.find('.ps_main_view_gmbh').css('display','block');
                this.main_view.find('.ps_main_progress').css('display','block');
                this.main_view.find('.ps_main_progress div').attr('aria-valuenow', selected_li.attr("data-total-progress")).css('width', selected_li.attr("data-total-progress")+'%');
                this.main_view.find('.ps_main_progress div').html(selected_li.attr("data-total-progress")+"%");
                this.main_view.find('.ps_main_details_goal_and_time').addClass('remove_goal_padding');
                this.main_view.find('.ps_main_details_reserved span').addClass('add_display_block');
                this.main_view.find('.ps_main_details_reserved div').addClass('add_display_inline_block');
                this.main_view.find('.ps_main_details_reserved sup').css('display','inline-block');
               //this.main_view.find('.ps_main_footer_text').css('display','block').html(current_item.attr("data-footer-text"));
                this.main_view.find('.ps_main_view_content').addClass('active- equity_campaign').attr('data-uri', 'https://www.companisto-investments.de/en/investment/ameriaag');
                this.main_view.find('.ps_main_view_content').removeAttr('onClick');
                this.main_view.find('.ps_main_view_title_info').css('display','block');
                this.main_view.find('.ps_main_details_reserved').attr('data-original-title',selected_li.attr("data-tooltip-text1")+' <br />'+selected_li.attr("data-tooltip-text2")+'<br />'+selected_li.attr("data-tooltip-text3"));
                this.main_view.find(".ps_left_time").css('display','none');

                if(selected_li.attr("data-is-ending-soon") == true) {
                    this.main_view.find('.ending_banderole').css('display','block');
                }
                else {
                    this.main_view.find('.ending_banderole').css('display','none');
                }
                if(selected_li.attr("data-is-extended") == true) {
                    this.main_view.find('.extended_banderole').css('display','block');
                }
                else {
                    this.main_view.find('.extended_banderole').css('display','none');
                }


            } else {
                this.main_parent.find('.ps_main_view_holder').addClass('ps_main_view_rest_startups');
                this.circles.find('.ps_circles').addClass('ps_circles_not_main_view');
                this.homepage.find('.button-container').addClass('button_container_not_main_view');

                var url_name    = selected_li.attr("data-name-url");
                var url_startup = 'https://www.companisto.com/en/investment/'+url_name;

                this.main_view.find('.startups_descriptions').removeClass('col-lg-6').addClass('col-lg-8');
                this.main_view.find('.startups_financial_info').removeClass('col-lg-6').addClass('col-lg-4');
                this.main_view.find('.ps_main_details').removeClass('inline_details');
                this.main_view.find('.ps_main_view_gmbh').css('display','none');
                this.main_view.find('.ps_main_progress').css('display','none');
                this.main_view.find('.ps_main_details_goal_and_time').removeClass('remove_goal_padding');
                this.main_view.find('.ps_main_details_reserved span').removeClass('add_display_block');
                this.main_view.find('.ps_main_details_reserved div').removeClass('add_display_inline_block');
                this.main_view.find('.ps_main_details_reserved sup').css('display','none');
                this.main_view.find('.ps_main_view_title_info').css('display','none');
                this.main_view.find('.ps_main_details .first-detail').removeClass('detail-border-right');
                this.main_view.find('.ps_main_details .last-detail').removeClass('detail-border-left');
                this.main_view.find('.ps_main_view_content').removeClass('active- equity_campaign');
                this.main_view.find('.ps_main_view_content').attr('onClick', 'window.location.href = "'+url_startup+'"');


                if(selected_li.attr("data-hide-timeleft") == true){
                    this.main_view.find(".ps_left_time").css('display','none');
                } else {
                    this.main_view.find(".ps_left_time").css('display','inline-block').html("<i class='fa fa-clock-o ps_time_icon' aria-hidden='true' style=''></i>"+" "+selected_li.attr("data-days-left"));
                }


                this.main_view.find('.ps_main_details_reserved').removeAttr("data-original-title");
                this.main_view.find('.ps_main_details_reserved').tooltip("disable").tooltip("hide").css('cursor','pointer');
                this.main_view.find('.ending_banderole').css('display','none');
                this.main_view.find('.extended_banderole').css('display','none');
            }
            this.main_view.attr('data-nr-startup',selected_li.attr("data-counter-startup"));


            this.main_view.find(".ps_main_view_title").html(selected_li.attr("data-name"));
            this.main_view.find(".ps_main_view_img").find("img").attr("src", selected_li.attr("data-img"));
            this.main_view.find(".ps_main_view_logo").find("img").attr("src", selected_li.attr("data-logo"));
            this.main_view.find(".ps_main_view_desc").html(selected_li.attr("data-desc"));
            this.main_view.find(".ps_total_invested").html(selected_li.attr("data-invested"));
            this.main_view.find(".ps_main_invested").html(selected_li.attr("data-text-invested"));
            this.main_view.find(".ps_companists").html(selected_li.attr("data-companists"));
            this.main_view.find(".ps_procent").html(selected_li.attr("data-perc"));
            this.main_view.find(".percentage_or_reserved_text").html(selected_li.attr("data-perc-text"));
            this.main_view.find(".ps_main_view_city").html(selected_li.attr("data-city"));
            this.main_view.find(".ps_goal").html(selected_li.attr("data-goal-text")+": "+selected_li.attr("data-goal"));
            this.main_view.find(".ps_main_wkn_code").html(selected_li.attr("data-wkn-code"));
            this.main_view.find(".ps_main_isin_code").html(selected_li.attr("data-isin-code"));
            this.main_view.find(".ps_main_invested_text").html(selected_li.attr("data-text-invested"));

            this.main_view.find(".ps_main_view_fade").fadeIn(250);
        }
        /********************************************************************************************
        *********************************************************************************************/


        vld_components.ps_slider.prototype.updateData = function(e){
            this.main_view.find(".ps_main_view_fade").hide();
            var total_items  = this.items_container.find("ul li");

            if(total_items.length > 1) {
                var current_item = this.items_container.find("ul li:nth-of-type(2)");
            } else {
                var current_item = this.items_container.find("ul li:nth-of-type(1)");
            }


            /* Check if Ameria is the main startup */

            if(current_item.attr("data-is-ameria") == true) {
                this.main_parent.find('.ps_main_view_holder').removeClass('ps_main_view_rest_startups');
                this.circles.find('.ps_circles').removeClass('ps_circles_not_main_view');
                this.homepage.find('.button-container').removeClass('button_container_not_main_view');

                $('.ps_main_details_reserved').tooltip("enable").tooltip("show").css('cursor','help');

                this.main_view.find('.startups_descriptions').removeClass('col-lg-8').addClass('col-lg-6');
                this.main_view.find('.startups_financial_info').removeClass('col-lg-4').addClass('col-lg-6');
                this.main_view.find('.ps_main_details').addClass('inline_details');
                this.main_view.find('.ps_main_details .first-detail').addClass('detail-border-right');
                this.main_view.find('.ps_main_details .last-detail').addClass('detail-border-left');
                this.main_view.find('.ps_main_details').addClass('inline_details');
                this.main_view.find('.ps_main_view_gmbh').css('display','block');
                this.main_view.find('.ps_main_progress').css('display','block');
                this.main_view.find('.ps_main_progress div').attr('aria-valuenow', current_item.attr("data-total-progress")).css('width', current_item.attr("data-total-progress")+'%');
                this.main_view.find('.ps_main_progress div').html(current_item.attr("data-total-progress")+"%");
                this.main_view.find('.ps_main_details_goal_and_time').addClass('remove_goal_padding');
                this.main_view.find('.ps_main_details_reserved span').addClass('add_display_block');
                this.main_view.find('.ps_main_details_reserved div').addClass('add_display_inline_block');
                this.main_view.find('.ps_main_details_reserved sup').css('display','inline-block');
               //this.main_view.find('.ps_main_footer_text').css('display','block').html(current_item.attr("data-footer-text"));
                this.main_view.find('.ps_main_view_content').addClass('active- equity_campaign').attr('data-uri', 'https://www.companisto-investments.de/en/investment/ameriaag');
                this.main_view.find('.ps_main_view_content').removeAttr('onClick');
                this.main_view.find('.ps_main_view_title_info').css('display','block');
                this.main_view.find('.ps_main_details_reserved').attr('data-original-title',current_item.attr("data-tooltip-text1")+' <br />'+current_item.attr("data-tooltip-text2")+'<br />'+current_item.attr("data-tooltip-text3"));
                this.main_view.find(".ps_left_time").css('display','none');

                if(current_item.attr("data-is-ending-soon") == true) {
                    this.main_view.find('.ending_banderole').css('display','block');
                }
                else {
                    this.main_view.find('.ending_banderole').css('display','none');
                }
                if(current_item.attr("data-is-extended") == true) {
                    this.main_view.find('.extended_banderole').css('display','block');
                }
                else {
                    this.main_view.find('.extended_banderole').css('display','none');
                }


            } else {
                this.main_parent.find('.ps_main_view_holder').addClass('ps_main_view_rest_startups');
                this.circles.find('.ps_circles').addClass('ps_circles_not_main_view');
                this.homepage.find('.button-container').addClass('button_container_not_main_view');

                var url_name    = current_item.attr("data-name-url");
                var url_startup = 'https://www.companisto.com/en/investment/'+url_name;

                this.main_view.find('.startups_descriptions').removeClass('col-lg-6').addClass('col-lg-8');
                this.main_view.find('.startups_financial_info').removeClass('col-lg-6').addClass('col-lg-4');
                this.main_view.find('.ps_main_details').removeClass('inline_details');
                this.main_view.find('.ps_main_view_gmbh').css('display','none');
                this.main_view.find('.ps_main_progress').css('display','none');
                this.main_view.find('.ps_main_details_goal_and_time').removeClass('remove_goal_padding');
                this.main_view.find('.ps_main_details_reserved span').removeClass('add_display_block');
                this.main_view.find('.ps_main_details_reserved div').removeClass('add_display_inline_block');
                this.main_view.find('.ps_main_details_reserved sup').css('display','none');
                this.main_view.find('.ps_main_view_title_info').css('display','none');
                this.main_view.find('.ps_main_details .first-detail').removeClass('detail-border-right');
                this.main_view.find('.ps_main_details .last-detail').removeClass('detail-border-left');
                this.main_view.find('.ps_main_view_content').removeClass('active- equity_campaign');
                this.main_view.find('.ps_main_view_content').attr('onClick', 'window.location.href = "'+url_startup+'"');

                if(current_item.attr("data-hide-timeleft") == true){
                    this.main_view.find(".ps_left_time").css('display','none');
                } else {
                    this.main_view.find(".ps_left_time").css('display','inline-block').html("<i class='fa fa-clock-o ps_time_icon' aria-hidden='true' style=''></i>"+" "+current_item.attr("data-days-left"));
                }

                this.main_view.find('.ps_main_details_reserved').removeAttr("data-original-title");
                this.main_view.find('.ps_main_details_reserved').tooltip("disable").tooltip("hide").css('cursor','pointer');
                this.main_view.find('.ending_banderole').css('display','none');
                this.main_view.find('.extended_banderole').css('display','none');
            }
            this.main_view.attr('data-nr-startup',current_item.attr("data-counter-startup"));


            this.main_view.find(".ps_main_view_title").html(current_item.attr("data-name"));
            this.main_view.find(".ps_main_view_img").find("img").attr("src", current_item.attr("data-img"));
            this.main_view.find(".ps_main_view_logo").find("img").attr("src", current_item.attr("data-logo"));
            this.main_view.find(".ps_main_view_desc").html(current_item.attr("data-desc"));
            this.main_view.find(".ps_total_invested").html(current_item.attr("data-invested"));
            this.main_view.find(".ps_main_invested").html(current_item.attr("data-text-invested"));
            this.main_view.find(".ps_companists").html(current_item.attr("data-companists"));
            this.main_view.find(".ps_procent").html(current_item.attr("data-perc"));
            this.main_view.find(".percentage_or_reserved_text").html(current_item.attr("data-perc-text"));
            this.main_view.find(".ps_main_view_city").html(current_item.attr("data-city"));
            this.main_view.find(".ps_goal").html(current_item.attr("data-goal-text")+": "+current_item.attr("data-goal"));
            this.main_view.find(".ps_main_wkn_code").html(current_item.attr("data-wkn-code"));
            this.main_view.find(".ps_main_isin_code").html(current_item.attr("data-isin-code"));
            this.main_view.find(".ps_main_invested_text").html(current_item.attr("data-text-invested"));

            this.main_view.find(".ps_main_view_fade").fadeIn(250);
        };

        $(function(){
            new vld_components.ps_slider({
                items_container: $("#ps"),
                main_view: $("#ps_main_view"),
                main_parent: $(".ps_main_parent"),
                controls: $("#ps_parent_buttons"),
                circles: $(".ps_parent_circles"),
                homepage: $(".homepage-popular-startups"),
                slide_speed: 5000
            });
        });
    </script>


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
@endsection
