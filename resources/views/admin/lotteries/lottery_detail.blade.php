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
                          <span class="text-muted">{{Carbon\Carbon::parse($lotteryInfo->created_at)->toFormattedDateString()}}</span>
                        </li>
                        <li>Updated:
                          <span class="text-muted">{{Carbon\Carbon::parse($lotteryInfo->updated_at)->toFormattedDateString()}}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- project-info -->
                  <div id="project-info" class="card-body row">
                    <div class="project-info-count col-lg-4 col-md-12">
                      <div class="project-info-icon">
                        <h2>{{$totalContestents}}</h2>
                        <div class="project-info-sub-icon">
                          <span class="fa fa-list"></span>
                        </div>
                      </div>
                      <div class="project-info-text pt-1">
                        <h5>Total Lots</h5>
                      </div>
                    </div>
                    <div class="project-info-count col-lg-4 col-md-12">
                        <div class="project-info-icon">
                          <h2>{{$lotterContestnets->count()}}</h2>
                          <div class="project-info-sub-icon">
                            <span class="fa fa-user-o"></span>
                          </div>
                        </div>
                        <div class="project-info-text pt-1">
                          <h5>Lottery Contestants</h5>
                        </div>
                    </div>
                    <div class="project-info-count col-lg-4 col-md-12">
                      <div class="project-info-icon">
                        <h2>{{$lotteryInfo->views}}</h2>
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
                                <?php
                                $total = $lotteryInfo->one_lot_amount*$totalContestents;
                                $progressBar = round($total/$lotteryInfo->lot_amount*100,0);
                                // */100
                                ?>
                            <span class="text-info h3"><?php echo $progressBar ?>%</span>
                          </div>
                          <div class="progress progress-md mt-1 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progressBar ?>%" aria-valuenow="25"
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
                        <p>
                            {{$lotteryInfo->description}}
                        </p>
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
                            <p>
                                    {{$lotteryInfo->product->pro_detail}}
                            </p>
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
                  <h4 class="card-title">Lottery  Contestents</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content">
                  <div class="card-content">
                    <div class="card-body  py-0 px-0">
                      <div class="list-group">
                        @foreach($lotterContestnets as $users)
                        <a href="/admin/user/credit/history/{{$users->user_id}}" class="list-group-item">
                          <div class="media">
                            <div class="media-left pr-1">
                              <span class="avatar avatar-sm avatar-online rounded-circle">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                            </div>
                            <div class="media-body w-100">
                              <h6 class="media-heading mb-0">{{$users->user->name}} {{$users->user->middle_name}} {{$users->user->last_name}}</h6>
                                <p class="font-small-2 mb-0 text-muted"><b>{{$users->totalApplies}}</b>  Lots Purchased</p>
                            </div>
                          </div>
                        </a>
                        @endforeach
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
