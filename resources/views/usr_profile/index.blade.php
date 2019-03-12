@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="img-responsive" width="50" src="{{ URL::to('/') }}/frontend/graphics/icons/avatar-placeholder.png">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>
				</div>
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-credit-card"></i>
							Wallet </a>
						</li>
						<li>
							<a href="#">

							<i class="glyphicon glyphicon-wallet"></i>
							Recent Lots </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 prof">
            <div class="profile-content">
                <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 text-right">Name</div>
                            <div class="col-lg-6 col-xs-12">Abdul Basit</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 text-right">Email Address</div>
                            <div class="col-lg-6 col-xs-12">abdulbasit056@gmail.com</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 text-right">Date of birth</div>
                            <div class="col-lg-6 col-xs-12">12-04-1986</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 text-right">Country</div>
                            <div class="col-lg-6 col-xs-12">Pakistan,Punjab, Lahore 61000</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 text-right">Contact Number</div>
                            <div class="col-lg-6 col-xs-12">+92-301-7794985</div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
