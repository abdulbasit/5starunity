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
<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu') 
		<div class="col-md-9 prof">
            <div class="profile-content">
                <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Name</div>
                            <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="name" value="{{$userInfo['user_data']->name}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Email Address</div>
                            <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" disabled="disabled" name="name" value="{{$userInfo['user_data']->email}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Date of birth </div>
                            <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="name" value="{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Country</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <select name="country" id="country" class="form-control " onchange="getCountrySates()">
                                    @foreach($countries as $country)
                                        <option value="{{$country['country']->id}}">{{$country['country']->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">State</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <select name="sates" id="sates" class="form-control">
                                    @foreach($states as $state)
                                        <option @if($userInfo['user_profile']['state_name']->id==$state->id) selected="selected" @endif value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">City</div>
                        <div class="col-lg-8 col-md-6 col-xs-12">
                            <input type="text" name="city" class="form-control" id="city" value="{{$userInfo['user_profile']->city}}">`
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Postal Code</div>
                        <div class="col-lg-8 col-md-6 col-xs-12">
                            <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{$userInfo['user_profile']->postal_code}}">
                        </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Contact Number</div>
                            <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="contact" id="contact" value="{{$userInfo['user_profile']->user_contact}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Address </div>
                            <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="address" id="address" value="{{$userInfo['user_profile']->address}}"></div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
