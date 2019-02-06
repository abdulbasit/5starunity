<!DOCTYPE html>
<html  class="loading" data-textdirection="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('app-assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendors/css/charts/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendors/css/extensions/unslider.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}" rel="stylesheet">
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <div id="app">
        <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
          <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item">
                <a class="navbar-brand" href="index.html">
                  <img class="brand-logo" alt="stack admin logo" src="../app-assets/images/logo/stack-logo-light.png">
                  <h2 class="brand-text">Stack</h2>
                </a>
              </li>
              <li class="nav-item d-md-none">
                <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
              </li>
            </ul>
          </div>
          <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
              <ul class="nav navbar-nav mr-auto float-left">
                <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
                  <ul class="mega-dropdown-menu dropdown-menu row">
                    <li class="col-md-2">
                      <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>
                      <div id="mega-menu-carousel-example">
                        <div>
                          <img class="rounded img-fluid mb-1" src="../app-assets/images/slider/slider-2.png"
                          alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                          <p class="news-content">
                            <span class="font-small-2">January 26, 2016</span>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="col-md-3">
                      <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Drill down menu</h6>
                      <ul class="drilldown-menu">
                        <li class="menu-list">
                          <ul>
                            <li>
                              <a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a>
                            </li>
                            <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                              <ul>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-bookmark-o"></i>  Second level</a></li>
                                <li><a href="#"><i class="fa fa-lemon-o"></i> Second level menu</a>
                                  <ul>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart-o"></i>  Third level</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-file-o"></i> Third level</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Third level</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-clock-o"></i> Third level</a></li>
                                  </ul>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-hdd-o"></i> Second level, third link</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-floppy-o"></i> Second level, fourth link</a></li>
                              </ul>
                            </li>
                            <li>
                              <a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color pallet system</a>
                            </li>
                            <li><a class="dropdown-item" href="sk-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                            <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                            <li>
                              <a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="fa fa-life-ring"></i> Customer support center</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list-ul"></i> Accordion</h6>
                      <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                        <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                          <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne"
                            aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                          <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                          aria-expanded="true">
                            <div class="card-content">
                              <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon.
                                Jelly wafer jelly beans. Caramels chocolate cake liquorice
                                cake wafer jelly beans croissant apple pie.</p>
                            </div>
                          </div>
                          <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                            href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                          <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                          aria-expanded="false">
                            <div class="card-content">
                              <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu
                                dessert pie. Tiramisu macaroon muffin jelly marshmallow
                                cake. Pastry oat cake chupa chups.</p>
                            </div>
                          </div>
                          <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                            href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                          <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree"
                          aria-expanded="false">
                            <div class="card-content">
                              <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes
                                lollipop macaroon. Cake dragée jujubes donut chocolate
                                bar chocolate cake cupcake chocolate topping.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="col-md-4">
                      <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope-o"></i> Contact Us</h6>
                      <form class="form form-horizontal">
                        <div class="form-body">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputName1">Name</label>
                            <div class="col-sm-9">
                              <div class="position-relative has-icon-left">
                                <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                                <div class="form-control-position pl-1"><i class="fa fa-user-o"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputEmail1">Email</label>
                            <div class="col-sm-9">
                              <div class="position-relative has-icon-left">
                                <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                                <div class="form-control-position pl-1"><i class="fa fa-envelope-o"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputMessage1">Message</label>
                            <div class="col-sm-9">
                              <div class="position-relative has-icon-left">
                                <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                                <div class="form-control-position pl-1"><i class="fa fa-commenting-o"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12 mb-1">
                              <button class="btn btn-primary float-right" type="button"><i class="fa fa-paper-plane-o"></i> Send</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </li>
                  </ul>
                </li>
                <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                  <div class="search-input">
                    <input class="input" type="text" placeholder="Explore Stack...">
                  </div>
                </li>
              </ul>
              <ul class="nav navbar-nav float-right">
                <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
                  </div>
                </li>
                <li class="dropdown dropdown-notification nav-item">
                  <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                    <span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0">
                        <span class="grey darken-2">Notifications</span>
                        <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                      </h6>
                    </li>
                    <li class="scrollable-container media-list">
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading">You have new order!</h6>
                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading red darken-1">99% Server load</h6>
                            <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading">Complete the task</h6>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading">Generate monthly report</h6>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                            </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-notification nav-item">
                  <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i>
                    <span class="badge badge-pill badge-default badge-warning badge-default badge-up">3</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0">
                        <span class="grey darken-2">Messages</span>
                        <span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                      </h6>
                    </li>
                    <li class="scrollable-container media-list">
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left">
                            <span class="avatar avatar-sm avatar-online rounded-circle">
                              <img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Margaret Govan</h6>
                            <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left">
                            <span class="avatar avatar-sm avatar-busy rounded-circle">
                              <img src="../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Bret Lezama</h6>
                            <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left">
                            <span class="avatar avatar-sm avatar-online rounded-circle">
                              <img src="../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Carie Berra</h6>
                            <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time>
                            </small>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left">
                            <span class="avatar avatar-sm avatar-away rounded-circle">
                              <img src="../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Eric Alsobrook</h6>
                            <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>
                            </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <span class="avatar avatar-online">
                      <img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                    <span class="user-name">John Doe</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                    <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a>
                    <a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                    <a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
      <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
              <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
              data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="dashboard-ecommerce.html">eCommerce</a>
                </li>
                <li class="active"><a class="menu-item" href="dashboard-analytics.html">Analytics</a>
                </li>
                <li><a class="menu-item" href="dashboard-fitness.html">Fitness</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Templates</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Vertical</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="../vertical-modern-menu-template">Modern Menu</a>
                    </li>
                    <li><a class="menu-item" href="../vertical-menu-template">Semi Light</a>
                    </li>
                    <li><a class="menu-item" href="../vertical-menu-template-semi-dark">Semi Dark</a>
                    </li>
                    <li><a class="menu-item" href="../vertical-menu-template-nav-dark">Nav Dark</a>
                    </li>
                    <li><a class="menu-item" href="../vertical-menu-template-light">Light</a>
                    </li>
                    <li><a class="menu-item" href="../vertical-overlay-menu-template">Overlay Menu</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Horizontal</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="../horizontal-menu-template">Classic</a>
                    </li>
                    <li><a class="menu-item" href="../horizontal-menu-template-nav">Nav Dark</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Layouts</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Page Layouts</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="layout-1-column.html">1 column</a>
                    </li>
                    <li><a class="menu-item" href="layout-2-columns.html">2 columns</a>
                    </li>
                    <li><a class="menu-item" href="#">Content Det. Sidebar</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="layout-content-detached-left-sidebar.html">Detached left sidebar</a>
                        </li>
                        <li><a class="menu-item" href="layout-content-detached-left-sticky-sidebar.html">Detached sticky left sidebar</a>
                        </li>
                        <li><a class="menu-item" href="layout-content-detached-right-sidebar.html">Detached right sidebar</a>
                        </li>
                        <li><a class="menu-item" href="layout-content-detached-right-sticky-sidebar.html">Detached sticky right sidebar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="layout-fixed-navbar.html">Fixed navbar</a>
                    </li>
                    <li><a class="menu-item" href="layout-fixed-navigation.html">Fixed navigation</a>
                    </li>
                    <li><a class="menu-item" href="layout-fixed-navbar-navigation.html">Fixed navbar &amp; navigation</a>
                    </li>
                    <li><a class="menu-item" href="layout-fixed-navbar-footer.html">Fixed navbar &amp; footer</a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="layout-fixed.html">Fixed layout</a>
                    </li>
                    <li><a class="menu-item" href="layout-boxed.html">Boxed layout</a>
                    </li>
                    <li><a class="menu-item" href="layout-static.html">Static layout</a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="layout-light.html">Light layout</a>
                    </li>
                    <li><a class="menu-item" href="layout-dark.html">Dark layout</a>
                    </li>
                    <li><a class="menu-item" href="layout-semi-dark.html">Semi dark layout</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Navbars</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="navbar-light.html">Navbar Light</a>
                    </li>
                    <li><a class="menu-item" href="navbar-dark.html">Navbar Dark</a>
                    </li>
                    <li><a class="menu-item" href="navbar-semi-dark.html">Navbar Semi Dark</a>
                    </li>
                    <li><a class="menu-item" href="navbar-brand-center.html">Brand Center</a>
                    </li>
                    <li><a class="menu-item" href="navbar-fixed-top.html">Fixed Top</a>
                    </li>
                    <li><a class="menu-item" href="#">Hide on Scroll</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="navbar-hide-on-scroll-top.html">Hide on Scroll Top</a>
                        </li>
                        <li><a class="menu-item" href="navbar-hide-on-scroll-bottom.html">Hide on Scroll Bottom</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="menu-item" href="navbar-components.html">Navbar Components</a>
                    </li>
                    <li><a class="menu-item" href="navbar-styling.html">Navbar Styling</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Vertical Nav</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="#">Navigation Types</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="../vertical-menu-template">Vertical Menu</a>
                        </li>
                        <li><a class="menu-item" href="../vertical-overlay-menu-template">Vertical Overlay</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-compact-menu.html">Compact Menu</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-fixed.html">Fixed Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-static.html">Static Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-light.html">Navigation Light</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-dark.html">Navigation Dark</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-accordion.html">Accordion Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-collapsible.html">Collapsible Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-flipped.html">Flipped Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-native-scroll.html">Native scroll</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-right-side-icon.html">Right side icons</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-bordered.html">Bordered Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-disabled-link.html">Disabled Navigation</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-styling.html">Navigation Styling</a>
                    </li>
                    <li><a class="menu-item" href="vertical-nav-tags-pills.html">Tags &amp; Pills</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Horizontal Nav</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="#">Navigation Types</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="../horizontal-menu-template">Classic</a>
                        </li>
                        <li><a class="menu-item" href="../horizontal-menu-template-nav">Nav Dark</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Page Headers</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="headers-breadcrumbs-basic.html">Breadcrumbs basic</a>
                    </li>
                    <li><a class="menu-item" href="headers-breadcrumbs-top.html">Breadcrumbs top</a>
                    </li>
                    <li><a class="menu-item" href="headers-breadcrumbs-bottom.html">Breadcrumbs bottom</a>
                    </li>
                    <li><a class="menu-item" href="headers-breadcrumbs-with-button.html">Breadcrumbs with button</a>
                    </li>
                    <li><a class="menu-item" href="headers-breadcrumbs-with-round-button.html">Breadcrumbs with round button 2</a>
                    </li>
                    <li><a class="menu-item" href="headers-breadcrumbs-with-stats.html">Breadcrumbs with stats</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Footers</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="footer-light.html">Footer Light</a>
                    </li>
                    <li><a class="menu-item" href="footer-dark.html">Footer Dark</a>
                    </li>
                    <li><a class="menu-item" href="footer-transparent.html">Footer Transparent</a>
                    </li>
                    <li><a class="menu-item" href="footer-fixed.html">Footer Fixed</a>
                    </li>
                    <li><a class="menu-item" href="footer-components.html">Footer Components</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-zap"></i><span class="menu-title" data-i18n="">Starter kit</span><span class="badge badge badge-danger badge-pill float-right mr-2">New</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-1-column.html">1 column</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-2-columns.html">2 columns</a>
                </li>
                <li><a class="menu-item" href="#">Content Det. Sidebar</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-content-detached-left-sidebar.html">Detached left sidebar</a>
                    </li>
                    <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-content-detached-left-sticky-sidebar.html">Detached sticky left sidebar</a>
                    </li>
                    <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-content-detached-right-sidebar.html">Detached right sidebar</a>
                    </li>
                    <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-content-detached-right-sticky-sidebar.html">Detached sticky right sidebar</a>
                    </li>
                  </ul>
                </li>
                <li class="navigation-divider"></li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-fixed-navbar.html">Fixed navbar</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-fixed-navigation.html">Fixed navigation</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-fixed-navbar-navigation.html">Fixed navbar &amp; navigation</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-fixed-navbar-footer.html">Fixed navbar &amp; footer</a>
                </li>
                <li class="navigation-divider"></li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-fixed.html">Fixed layout</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-boxed.html">Boxed layout</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-static.html">Static layout</a>
                </li>
                <li class="navigation-divider"></li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-light.html">Light layout</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-dark.html">Dark layout</a>
                </li>
                <li><a class="menu-item" href="../starter-kit/ltr/vertical-menu-template-semi-dark/layout-semi-dark.html">Semi dark layout</a>
                </li>
              </ul>
            </li>
            <li class=" navigation-header">
              <span>Apps</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
              data-original-title="Apps"></i>
            </li>
            <li class=" nav-item"><a href="email-application.html"><i class="ft-mail"></i><span class="menu-title" data-i18n="">Email Application</span></a>
            </li>
            <li class=" nav-item"><a href="chat-application.html"><i class="ft-message-square"></i><span class="menu-title" data-i18n="">Chat Application</span></a>
            </li>
            <li class=" nav-item"><a href="project-summary.html"><i class="ft-airplay"></i><span class="menu-title" data-i18n="">Project Summary</span></a>
            </li>
            <li class=" nav-item"><a href="invoice-template.html"><i class="ft-printer"></i><span class="menu-title" data-i18n="">Invoice Template</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-share"></i><span class="menu-title" data-i18n="">Timelines</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="timeline-center.html">Timelines Center</a>
                </li>
                <li><a class="menu-item" href="timeline-horizontal.html">Timelines Horizontal</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-user"></i><span class="menu-title" data-i18n="">Users</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="user-profile.html">Users Profile</a>
                </li>
                <li><a class="menu-item" href="user-cards.html">Users Cards</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-plus-square"></i><span class="menu-title" data-i18n="">Calender</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="full-calender-basic.html">Full Calender Basic</a>
                </li>
                <li><a class="menu-item" href="full-calender-events.html">Full Calender Events</a>
                </li>
                <li><a class="menu-item" href="full-calender-advance.html">Full Calender Advance</a>
                </li>
                <li><a class="menu-item" href="full-calender-extra.html">Full Calender Extra</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-image"></i><span class="menu-title" data-i18n="">Gallery</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="gallery-grid.html">Gallery Grid</a>
                </li>
                <li><a class="menu-item" href="gallery-grid-with-desc.html">Gallery Grid with Desc</a>
                </li>
                <li><a class="menu-item" href="gallery-masonry.html">Masonry Gallery</a>
                </li>
                <li><a class="menu-item" href="gallery-masonry-with-desc.html">Masonry Gallery with Desc</a>
                </li>
                <li><a class="menu-item" href="gallery-hover-effects.html">Hover Effects</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-search"></i><span class="menu-title" data-i18n="">Search</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="search-page.html">Search Page</a>
                </li>
                <li><a class="menu-item" href="search-website.html">Search Website</a>
                </li>
                <li><a class="menu-item" href="search-images.html">Search Images</a>
                </li>
                <li><a class="menu-item" href="search-videos.html">Search Videos</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-unlock"></i><span class="menu-title" data-i18n="">Authentication</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="login-simple.html">Login Simple</a>
                </li>
                <li><a class="menu-item" href="login-with-bg.html">Login with Bg</a>
                </li>
                <li><a class="menu-item" href="login-with-bg-image.html">Login with Bg Image</a>
                </li>
                <li><a class="menu-item" href="register-simple.html">Register Simple</a>
                </li>
                <li><a class="menu-item" href="register-with-bg.html">Register with Bg</a>
                </li>
                <li><a class="menu-item" href="register-with-bg-image.html">Register with Bg Image</a>
                </li>
                <li><a class="menu-item" href="unlock-user.html">Unlock User</a>
                </li>
                <li><a class="menu-item" href="recover-password.html">Recover Password</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-alert-triangle"></i><span class="menu-title" data-i18n="">Error</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="error-400.html">Error 400</a>
                </li>
                <li><a class="menu-item" href="error-401.html">Error 401</a>
                </li>
                <li><a class="menu-item" href="error-403.html">Error 403</a>
                </li>
                <li><a class="menu-item" href="error-404.html">Error 404</a>
                </li>
                <li><a class="menu-item" href="error-500.html">Error 500</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-watch"></i><span class="menu-title" data-i18n="">Coming Soon</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="coming-soon-flat.html">Flat</a>
                </li>
                <li><a class="menu-item" href="coming-soon-bg-image.html">Bg image</a>
                </li>
                <li><a class="menu-item" href="coming-soon-bg-video.html">Bg video</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="under-maintenance.html"><i class="ft-cloud-off"></i><span class="menu-title" data-i18n="">Maintenance</span></a>
            </li>
            <li class=" navigation-header">
              <span>UI</span><i class="ft-droplet ft-minus" data-toggle="tooltip" data-placement="right"
              data-original-title="UI"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-globe"></i><span class="menu-title" data-i18n="">Content</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="content-grid.html">Grid</a>
                </li>
                <li><a class="menu-item" href="content-typography.html">Typography</a>
                </li>
                <li><a class="menu-item" href="content-text-utilities.html">Text utilities</a>
                </li>
                <li><a class="menu-item" href="content-syntax-highlighter.html">Syntax highlighter</a>
                </li>
                <li><a class="menu-item" href="content-helper-classes.html">Helper classes</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-square"></i><span class="menu-title" data-i18n="">Cards</span><span class="badge badge badge-pill badge-success float-right mr-2">Hot</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="card-bootstrap.html">Bootstrap</a>
                </li>
                <li><a class="menu-item" href="card-headings.html">Headings</a>
                </li>
                <li><a class="menu-item" href="card-options.html">Options</a>
                </li>
                <li><a class="menu-item" href="card-actions.html">Action</a>
                </li>
                <li><a class="menu-item" href="card-draggable.html">Draggable</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Advance Cards</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="card-statistics.html">Statistics</a>
                </li>
                <li><a class="menu-item" href="card-weather.html">Weather</a>
                </li>
                <li><a class="menu-item" href="card-charts.html">Charts</a>
                </li>
                <li><a class="menu-item" href="card-maps.html">Maps</a>
                </li>
                <li><a class="menu-item" href="card-social.html">Social</a>
                </li>
                <li><a class="menu-item" href="card-ecommerce.html">E-Commerce</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Color Palette</span><span class="badge badge badge-warning badge-pill float-right mr-2">14</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="color-palette-primary.html">Primary palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-danger.html">Danger palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-success.html">Success palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-warning.html">Warning palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-info.html">Info palette</a>
                </li>
                <li class="navigation-divider"></li>
                <li><a class="menu-item" href="color-palette-red.html">Red palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-pink.html">Pink palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-purple.html">Purple palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-blue.html">Blue palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-cyan.html">Cyan palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-teal.html">Teal palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-yellow.html">Yellow palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-amber.html">Amber palette</a>
                </li>
                <li><a class="menu-item" href="color-palette-blue-grey.html">Blue Grey palette</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-eye"></i><span class="menu-title" data-i18n="">Icons</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="icons-feather.html">Feather</a>
                </li>
                <li><a class="menu-item" href="icons-font-awesome.html">Font Awesome</a>
                </li>
                <li><a class="menu-item" href="icons-simple-line-icons.html">Simple Line Icons</a>
                </li>
                <li><a class="menu-item" href="icons-meteocons.html">Meteocons</a>
                </li>
              </ul>
            </li>
            <li class=" navigation-header">
              <span>Components</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
              data-original-title="Components"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-briefcase"></i><span class="menu-title" data-i18n="">Bootstrap Components</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="component-alerts.html">Alerts</a>
                </li>
                <li><a class="menu-item" href="component-callout.html">Callout</a>
                </li>
                <li><a class="menu-item" href="#">Buttons</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="component-buttons-basic.html">Basic Buttons</a>
                    </li>
                    <li><a class="menu-item" href="component-buttons-extended.html">Extended Buttons</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="component-carousel.html">Carousel</a>
                </li>
                <li><a class="menu-item" href="component-collapse.html">Collapse</a>
                </li>
                <li><a class="menu-item" href="component-dropdowns.html">Dropdowns</a>
                </li>
                <li><a class="menu-item" href="component-list-group.html">List Group</a>
                </li>
                <li><a class="menu-item" href="component-modals.html">Modals</a>
                </li>
                <li><a class="menu-item" href="component-pagination.html">Pagination</a>
                </li>
                <li><a class="menu-item" href="component-navs-component.html">Navs Component</a>
                </li>
                <li><a class="menu-item" href="component-tabs-component.html">Tabs Component</a>
                </li>
                <li><a class="menu-item" href="component-pills-component.html">Pills Component</a>
                </li>
                <li><a class="menu-item" href="component-tooltips.html">Tooltips</a>
                </li>
                <li><a class="menu-item" href="component-popovers.html">Popovers</a>
                </li>
                <li><a class="menu-item" href="component-badges.html">Badges</a>
                </li>
                <li><a class="menu-item" href="component-pill-badges.html">Pill Badges</a>
                </li>
                <li><a class="menu-item" href="component-progress.html">Progress</a>
                </li>
                <li><a class="menu-item" href="component-media-objects.html">Media Objects</a>
                </li>
                <li><a class="menu-item" href="component-scrollable.html">Scrollable</a>
                </li>
                <li><a class="menu-item" href="component-spinners.html">Spinners</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title" data-i18n="">Extra Components</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="ex-component-sweet-alerts.html">Sweet Alerts</a>
                </li>
                <li><a class="menu-item" href="ex-component-ratings.html">Ratings</a>
                </li>
                <li><a class="menu-item" href="ex-component-toastr.html">Toastr</a>
                </li>
                <li><a class="menu-item" href="ex-component-noui-slider.html">NoUI Slider</a>
                </li>
                <li><a class="menu-item" href="ex-component-knob.html">Knob</a>
                </li>
                <li><a class="menu-item" href="ex-component-block-ui.html">Block UI</a>
                </li>
                <li><a class="menu-item" href="ex-component-date-time-picker.html">DateTime Picker</a>
                </li>
                <li><a class="menu-item" href="ex-component-file-uploader-dropzone.html">File Uploader</a>
                </li>
                <li><a class="menu-item" href="ex-component-image-cropper.html">Image Cropper</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="">Forms</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Form Elements</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="form-inputs.html">Form Inputs</a>
                    </li>
                    <li><a class="menu-item" href="form-input-groups.html">Input Groups</a>
                    </li>
                    <li><a class="menu-item" href="form-input-grid.html">Input Grid</a>
                    </li>
                    <li><a class="menu-item" href="form-extended-inputs.html">Extended Inputs</a>
                    </li>
                    <li><a class="menu-item" href="form-checkboxes-radios.html">Checkboxes &amp; Radios</a>
                    </li>
                    <li><a class="menu-item" href="form-switch.html">Switch</a>
                    </li>
                    <li><a class="menu-item" href="form-select2.html">Select2</a>
                    </li>
                    <li><a class="menu-item" href="form-tags-input.html">Tags Input</a>
                    </li>
                    <li><a class="menu-item" href="form-validation.html">Validation</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Form Layouts</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="form-layout-basic.html">Basic Forms</a>
                    </li>
                    <li><a class="menu-item" href="form-layout-horizontal.html">Horizontal Forms</a>
                    </li>
                    <li><a class="menu-item" href="form-layout-hidden-labels.html">Hidden Labels</a>
                    </li>
                    <li><a class="menu-item" href="form-layout-form-actions.html">Form Actions</a>
                    </li>
                    <li><a class="menu-item" href="form-layout-bordered.html">Bordered</a>
                    </li>
                    <li><a class="menu-item" href="form-layout-striped-rows.html">Striped Rows</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="form-dual-listbox.html" data-i18n="nav.form_elements.form_dual_listbox">Dual Listbox</a>
                </li>
                <li><a class="menu-item" href="form-wizard.html">Form Wizard</a>
                </li>
                <li><a class="menu-item" href="form-repeater.html">Form Repeater</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span class="menu-title" data-i18n="">Tables</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Bootstrap Tables</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="table-basic.html">Basic Tables</a>
                    </li>
                    <li><a class="menu-item" href="table-border.html">Table Border</a>
                    </li>
                    <li><a class="menu-item" href="table-sizing.html">Table Sizing</a>
                    </li>
                    <li><a class="menu-item" href="table-styling.html">Table Styling</a>
                    </li>
                    <li><a class="menu-item" href="table-components.html">Table Components</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">DataTables</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="dt-basic-initialization.html">Basic Initialisation</a>
                    </li>
                    <li><a class="menu-item" href="dt-advanced-initialization.html">Advanced initialisation</a>
                    </li>
                    <li><a class="menu-item" href="dt-styling.html">Styling</a>
                    </li>
                    <li><a class="menu-item" href="dt-data-sources.html">Data Sources</a>
                    </li>
                    <li><a class="menu-item" href="dt-api.html">API</a>
                    </li>
                    <li><a class="menu-item" href="#" data-i18n="nav.datatable_extensions.main">DataTables Ext.</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="dt-extensions-autofill.html" data-i18n="nav.datatable_extensions.dt_extensions_autofill">AutoFill</a>
                        </li>
                        <li><a class="menu-item" href="#" data-i18n="nav.datatable_extensions.datatable_buttons.main">Buttons</a>
                          <ul class="menu-content">
                            <li><a class="menu-item" href="dt-extensions-buttons-basic.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_basic">Basic Buttons</a>
                            </li>
                            <li><a class="menu-item" href="dt-extensions-buttons-html-5-data-export.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_html_5_data_export">HTML 5 Data Export</a>
                            </li>
                            <li><a class="menu-item" href="dt-extensions-buttons-flash-data-export.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_flash_data_export">Flash Data Export</a>
                            </li>
                            <li><a class="menu-item" href="dt-extensions-buttons-column-visibility.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_column_visibility">Column Visibility</a>
                            </li>
                            <li><a class="menu-item" href="dt-extensions-buttons-print.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_print">Print</a>
                            </li>
                            <li><a class="menu-item" href="dt-extensions-buttons-api.html"
                              data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_api">API</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-column-reorder.html"
                          data-i18n="nav.datatable_extensions.dt_extensions_column_reorder">Column Reorder</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-fixed-columns.html"
                          data-i18n="nav.datatable_extensions.dt_extensions_fixed_columns">Fixed Columns</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-key-table.html" data-i18n="nav.datatable_extensions.dt_extensions_key_table">Key Table</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-row-reorder.html" data-i18n="nav.datatable_extensions.dt_extensions_row_reorder">Row Reorder</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-select.html" data-i18n="nav.datatable_extensions.dt_extensions_select">Select</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-fix-header.html" data-i18n="nav.datatable_extensions.dt_extensions_fix_header">Fix Header</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-responsive.html" data-i18n="nav.datatable_extensions.dt_extensions_responsive">Responsive</a>
                        </li>
                        <li><a class="menu-item" href="dt-extensions-column-visibility.html"
                          data-i18n="nav.datatable_extensions.dt_extensions_column_visibility">Column Visibility</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="table-jsgrid.html">jsGrid</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Charts</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Echarts</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="echarts-line-area-charts.html">Line &amp; Area charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-bar-column-charts.html">Bar &amp; Column charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-pie-doughnut-charts.html">Pie &amp; Doughnut charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-scatter-charts.html">Scatter charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-radar-chord-charts.html">Radar &amp; Chord charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-funnel-gauges-charts.html">Funnel &amp; Gauges charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-combination-charts.html">Combination charts</a>
                    </li>
                    <li><a class="menu-item" href="echarts-advance-charts.html">Advance charts</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Chartjs</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="chartjs-line-charts.html">Line charts</a>
                    </li>
                    <li><a class="menu-item" href="chartjs-bar-charts.html">Bar charts</a>
                    </li>
                    <li><a class="menu-item" href="chartjs-pie-doughnut-charts.html">Pie &amp; Doughnut charts</a>
                    </li>
                    <li><a class="menu-item" href="chartjs-scatter-charts.html">Scatter charts</a>
                    </li>
                    <li><a class="menu-item" href="chartjs-polar-radar-charts.html">Polar &amp; Radar charts</a>
                    </li>
                    <li><a class="menu-item" href="chartjs-advance-charts.html">Advance charts</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="morris-charts.html">Morris Charts</a>
                </li>
                <li><a class="menu-item" href="#">Flot Charts</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="flot-line-charts.html">Line charts</a>
                    </li>
                    <li><a class="menu-item" href="flot-bar-charts.html">Bar charts</a>
                    </li>
                    <li><a class="menu-item" href="flot-pie-charts.html">Pie charts</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="#">Chartist</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="chartist-line-charts.html">Line charts</a>
                    </li>
                    <li><a class="menu-item" href="chartist-bar-charts.html">Bar charts</a>
                    </li>
                    <li><a class="menu-item" href="chartist-pie-charts.html">Pie charts</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-map"></i><span class="menu-title" data-i18n="">Maps</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">google Maps</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="gmaps-basic-maps.html">Maps</a>
                    </li>
                    <li><a class="menu-item" href="gmaps-services.html">Services</a>
                    </li>
                    <li><a class="menu-item" href="gmaps-overlays.html">Overlays</a>
                    </li>
                    <li><a class="menu-item" href="gmaps-routes.html">Routes</a>
                    </li>
                    <li><a class="menu-item" href="gmaps-utils.html">Utils</a>
                    </li>
                  </ul>
                </li>
                <li><a class="menu-item" href="vector-maps-jvector.html">jVector Map</a>
                </li>
              </ul>
            </li>
            <li class=" navigation-header">
              <span>Others</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
              data-original-title="Others"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-align-left"></i><span class="menu-title" data-i18n="">Menu levels</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="#">Second level</a>
                </li>
                <li><a class="menu-item" href="#">Second level child</a>
                  <ul class="menu-content">
                    <li><a class="menu-item" href="#">Third level</a>
                    </li>
                    <li><a class="menu-item" href="#">Third level child</a>
                      <ul class="menu-content">
                        <li><a class="menu-item" href="#">Fourth level</a>
                        </li>
                        <li><a class="menu-item" href="#">Fourth level</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="changelog.html"><i class="ft-file"></i><span class="menu-title" data-i18n="">Changelog</span><span class="badge badge badge-pill badge-info float-right">3.0</span></a>
            </li>
            <li class="disabled nav-item"><a href="#"><i class="ft-slash"></i><span class="menu-title" data-i18n="">Disabled Menu</span></a>
            </li>
            <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Raise Support</span></a>
            </li>
            <li class=" nav-item">
              <a href="https://pixinvent.com/stack-bootstrap-admin-template/documentation"><i class="ft-folder"></i>
                <span class="menu-title" data-i18n="">Documentation</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/extensions/jquery.knob.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/knob.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"
  type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"
  type="text/javascript"></script>
  <script src="{{ asset('app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-climacon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}" type="text/javascript"></script>
</body>
</html>
