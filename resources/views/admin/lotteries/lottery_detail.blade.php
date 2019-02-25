@extends('admin.layouts.apps')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/project.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
        <div class="content-detached content-left">
          <div class="content-body">
            <section class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-head">
                    <div class="card-header">
                      <h4 class="card-title">Lottery Progress</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="px-1">
                      <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                        <li>Created :
                          <span class="text-muted">01/Feb/2016</span>
                        </li>
                        <li>Updated:
                          <span class="text-muted">01/Oct/2016</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- project-info -->
                  <div id="project-info" class="card-body row">
                    <div class="project-info-count col-lg-6 col-md-12">
                      <div class="project-info-icon">
                        <h2>12</h2>
                        <div class="project-info-sub-icon">
                          <span class="fa fa-user-o"></span>
                        </div>
                      </div>
                      <div class="project-info-text pt-1">
                        <h5>Lottery Contestents</h5>
                      </div>
                    </div>
                    <div class="project-info-count col-lg-6 col-md-12">
                      <div class="project-info-icon">
                        <h2>160</h2>
                        <div class="project-info-sub-icon">
                          <span class="fa fa-eye"></span>
                        </div>
                      </div>
                      <div class="project-info-text pt-1">
                        <h5>Lottery Views</h5>
                      </div>
                    </div>
                  </div>
                  <!-- project-info -->
                  <div class="card-body">
                    <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                      <span>Lottery Progress</span>
                    </div>
                    <div class="row py-2">
                      <div class="col-md-12">
                        <div class="insights px-2">
                          <div>
                            <span class="text-info h3">82%</span>
                          </div>
                          <div class="progress progress-md mt-1 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 82%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Task Progress -->
            <section id="description" class="card">
                    <div class="card-header">
                      <h4 class="card-title">Lottery Description</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="card-text">
                          <p>Image gallery grid with photo-swipe integration. Display images in
                            4-2-1 columns and photo-swipe provides gallery features.</p>
                          <p>Please read the photo-swipe gallery <a href="http://photoswipe.com/documentation/getting-started.html" target="_blank">documentation</a> for usage information.</p>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section id="description" class="card">
                        <div class="card-header">
                          <h4 class="card-title">Product Information </h4>
                          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                          <div class="heading-elements">
                            <ul class="list-inline mb-0">
                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                              <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-content">
                          <div class="card-body">
                            <div class="card-text">
                              <p>Image gallery grid with photo-swipe integration. Display images in
                                4-2-1 columns and photo-swipe provides gallery features.</p>
                              <p>Please read the photo-swipe gallery <a href="http://photoswipe.com/documentation/getting-started.html" target="_blank">documentation</a> for usage information.</p>
                            </div>
                          </div>
                        </div>
                      </section>
          </div>
        </div>
        <div class="sidebar-detached sidebar-right"="">
          <div class="sidebar">
            <div class="project-sidebar-content">
              <!-- Project Users -->
              <div class="card">
                <div class="card-header mb-0">
                  <h4 class="card-title">Lottery  Contestents<span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span></h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content">
                  <div class="card-content">
                    <div class="card-body  py-0 px-0">
                      <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-online rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">Margaret Govan</h6>
                              <p class="font-small-2 mb-0 text-muted">Project Owner</p>
                            </div>
                          </div>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-busy rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">Bret Lezama</h6>
                              <p class="font-small-2 mb-0 text-muted">Project Manager</p>
                            </div>
                          </div>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-online rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">Carie Berra</h6>
                              <p class="font-small-2 mb-0 text-muted">Senior Developer</p>
                            </div>
                          </div>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-away rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">Eric Alsobrook</h6>
                              <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                            </div>
                          </div>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-busy rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">Berra Eric</h6>
                              <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Project Users -->
            </div>
          </div>
        </div>
      </div>
@endsection
