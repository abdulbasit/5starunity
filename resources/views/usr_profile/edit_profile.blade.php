@extends('layouts.app')
@section('content')
@section('script')
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
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
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: '{{ __('lables.select_file')}}';
            display: inline-block;
            background: #FFF;
            border: none;
            padding: 0;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff; 
             /* font-weight: 700; */
            font-size: 12pt; 
        }


    </style>
@endsection
<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu')
		<div class="col-md-9 prof">
            <form action="/profile-update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile-content">
                    <div class="row profile-body">
                        <div class="col-lg-9 col-xs-12">
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.first_name')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="name" value="{{$userInfo['user_data']->name}}">
                                </div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.middle_name')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="mname" value="{{$userInfo['user_data']->middle_name}}">
                                </div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.last_name')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <input class="form-control" type="text" name="lname" value="{{$userInfo['user_data']->last_name}}">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Email Address</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" disabled="disabled" name="name" value="{{$userInfo['user_data']->email}}"></div>
                            </div> --}}
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.dob')}} </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="dob" value="{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.country')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <select name="country" id="country" class="form-control " onchange="getCountrySates()">
                                        @foreach($countries as $country)
                                            <option value="{{$country['country']->id}}">{{$country['country']->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        {{-- <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">State</div>
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <select name="sates" id="sates" class="form-control">
                                        @foreach($states as $state)
                                            <option @if($userInfo['user_profile']['state_name']->id==$state->id) selected="selected" @endif value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div> --}}
                        <div class="row rowSpacing">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.city')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <input type="text" name="city" class="form-control" id="city" value="{{$userInfo['user_profile']->city}}">
                            </div>
                        </div>
                        <div class="row rowSpacing">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.postal_code')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{$userInfo['user_profile']->postal_code}}">
                            </div>
                        </div>
                        <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.phone_number')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="contact" id="contact" value="{{$userInfo['user_profile']->user_contact}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.address')}} </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="address" id="address" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.street_number')}} </div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="street" id="street" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.house_number')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input class="form-control" type="text" name="house" id="house" value="{{$userInfo['user_profile']->address}}"></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.identity_proof')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input type="file" multiple="multiple" name="identity_card[]"  id="identity_card" class="custom-file-input form-control" /></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.id_front')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input  type="file" name="identity_card_front"  id="identity_card_front" class="custom-file-input form-control" /></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.id_back')}}</div>
                                <div class="col-lg-8 col-md-6 col-xs-12"><input type="file" name="identity_card_back"  id="identity_card_back" class="custom-file-input form-control" /></div>
                            </div>
                            <div class="row rowSpacing">
                                <div class="col-lg-12 col-md-6 col-xs-12 text-right">
                                    <input type="submit" value="{{ __('lables.update')}}" class="btn btn-primary">
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
