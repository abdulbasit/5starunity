
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu')
		<div class="col-md-9 prof">
            <div class="profile-content">
                <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Profile Status</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <strong>
                                    @if($userInfo['user_data']->status==2)
                                        <span class="red">Disabled</span>
                                    @else
                                        <span class="green">Acitve</span>
                                    @endif
                                </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Registered Date </div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{date('d-m-Y H:i:s', strtotime($userInfo['user_profile']->created_at))}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Name</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_data']->name}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Email Address</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_data']->email}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Date of birth </div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Country</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']['country_name']->name}},{{$userInfo['user_profile']['state_name']->name}}, {{$userInfo['user_profile']->city}}, {{$userInfo['user_profile']->postal_code}}</div>
                      </div>
                      <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Contact Number</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']->user_contact}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Address </div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']->address}}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
