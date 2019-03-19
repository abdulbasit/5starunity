@extends('layouts.app')
@section('content')
@section('script')
<script>
function getCountrySates()
{
    var country_id = $( "#country option:selected" ).attr('value');
    $.ajax({
        method: "POST",
        url: "ajax/states",
        data: { "_token": "{{ csrf_token() }}",country_id: country_id}
        })
        .done(function( msg ) {
            $("#sates").html(msg);
        });
}
</script>
@endsection
@section('style')
    <style>
        .rowSpacing
        {
            margin-bottom: 10px !important
        }
    </style>
@endsection
<div class="container">

    <div class="row profile">
        @include('../layouts.user_menu')
		<div class="col-md-9 prof">
            <form action="/profile-update" method="POST" >
                @csrf
                <div class="profile-content">
                    <div class="row profile-body">
                        <div class="col-lg-9 col-xs-12">
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">First Name</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="name" value="{{$userInfo['user_data']->name}}">
                                </div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Middle Name</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="mname" value="{{$userInfo['user_data']->middle_name}}">
                                </div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Last Name</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="lname" value="{{$userInfo['user_data']->last_name}}">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Email Address</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" disabled="disabled" name="name" value="{{$userInfo['user_data']->email}}"></div>
                            </div> --}}
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Date of birth </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="dob" value="{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Country</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <select name="country" id="country" class="form-control " onchange="getCountrySates()">
                                        @foreach($countries as $country)
                                            <option value="{{$country['country']->id}}">{{$country['country']->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">State</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <select name="sates" id="sates" class="form-control">
                                        @foreach($states as $state)
                                            <option @if($userInfo['user_profile']['state_name']->id==$state->id) selected="selected" @endif value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row rowSpacing">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">City</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <input type="text" name="city" class="form-control" id="city" value="{{$userInfo['user_profile']->city}}">
                            </div>
                        </div>
                        <div class="row rowSpacing">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Postal Code</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{$userInfo['user_profile']->postal_code}}">
                            </div>
                        </div>
                        <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Contact Number</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="contact" id="contact" value="{{$userInfo['user_profile']->user_contact}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Address </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="address" id="address" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Street </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="street" id="street" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">House Number </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="house" id="house" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-12 col-md-6 col-xs-12 text-right">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-12"></div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>

@endsection
