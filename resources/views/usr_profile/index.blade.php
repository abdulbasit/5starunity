
@extends('layouts.app')
@section('content')
@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
.my-card
{
    border:none;
    position: relative;
    top: 35px;
    border-radius: 50%;
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
    width: 75px;
    height: 75px;
    padding: 0px;
    text-align: center;
    padding-top: 22px;
    left: 50%;
    /* box-shadow: 1px 5px 7px #CCC; */
    margin-left: -35px;
    overflow: hidden
}
.spendCircle
{
    width: 170px;
    height: 170px;
    margin:0px;
    padding: 0px
}
.my-card img
{
    width: 65px !important;
    margin-top: -20px
}
.tableRow
{
    margin-top:20px;
    margin-bottom:10px
}
</style>
@endsection
<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu')
		<div class="col-md-9 prof" style="margin-top:0px">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif
            <div class="profile-content">

                    <div id="historyTable">
                            {{-- <h3>Your Lots</h3> --}}
                            <div class="" style="background:none">
                                <div class="row w-100">
                                    <div class="col-md-4">
                                        <div class="card border-info shadow text-info p-3 my-card" >
                                            <img style="width:100%" src="{{ asset('frontend/img/Taler.jpg')}}" alt=""/>
                                        </div>
                                        <div class="card border-info mx-sm-1 p-3 card_stats">
                                            <div style="margin-top: 15px; float: left; width: 100%;">
                                                <div class="text-info text-center col-xs-12">5starUnity-Taler</div>
                                                <div class="text-info text-center col-xs-12">  @if($available_balance){{$available_balance->total_available_balance}} @else 0 @endif</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-info shadow text-info p-3 my-card" >
                                            <img style="width:100%" src="{{ asset('frontend/img/Taler.jpg')}}" alt=""/>
                                        </div>
                                        <div class="card border-info mx-sm-1 p-3 card_stats">
                                            <div style="margin-top: 15px; float: left; width: 100%;">
                                                <div class="text-info text-center col-xs-12">Bonus-Taler</div>
                                                <div class="text-info text-center col-xs-12">{{$purchasedLots->count()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-info shadow text-info p-3 my-card" style="overflow:visible !important" >
                                            <img src="{{ asset('frontend/img/spay.png')}}" alt="" style="    width: 100px !important;
                                            margin: 0px;
                                            margin-left: -15px;
                                            background: white;"/>
                                        </div>
                                        <div class="card border-info mx-sm-1 p-3 card_stats">
                                            <div style="margin-top: 15px; float: left; width: 100%;">
                                                <div class="text-info text-center col-xs-12">
                                                    S-PAY
                                                </div>
                                                <div class="text-info text-center col-xs-12">  {{$spent}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <br />
                 <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12">

                        <br />
                        <div class="row tableRow">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.register_date')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{date('d-m-Y H:i:s', strtotime($userInfo['user_profile']->created_at))}}</div>
                        </div>
                        <div class="row tableRow">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.verification_status')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <strong>
                                    @if($userInfo['user_data']->status==2)
                                        <span class="red">{{ __('lables.inactive')}}</span>
                                    @elseif($userInfo['user_data']->status==1)
                                        <span class="red">{{ __('lables.not_approved')}}</span>
                                    @elseif($userInfo['user_data']->status==3)    
                                        <span class="red">Account delete under process </span>
                                    @else
                                        <span class="green">{{ __('lables.active')}}</span>
                                    @endif
                                </strong>
                            </div>
                        </div>
                        <div class="row tableRow">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.donator_id')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <?php

                                    // echo number_format(00000000000 , 9, ',', '.');
                                    echo sprintf('%09d', Auth::guard('client')->user()->id)?>
                            </div>
                        </div>
                        <div class="row tableRow">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.personal_link')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">

                            </div>
                        </div>
                        <div class="row tableRow">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">{{ __('lables.my_network')}}</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">

                            </div>
                        </div>
                        <br />
                        @if($userInfo['user_data']->status==0)
                        <div class="container">
                            <div class="col-md-2 col-sm-4 c_dist">
                                <a href="wallet">
                                <div class="circle c_nd spendCircle"></div>
                                </a>
                            </div>
                            <div class="col-md-8 col-sm-8 c_dist" style="margin-top:9px">
                                <br />
                                <p>
                                    Wir danken Ihnen für Ihre bisherige Treue, übermittelten Spenden und dafür, <br /> dass Sie gemeinsam mit Vielen unsere Community stärken.
                                </p>
                                <p>
                                        <span style="color:#F9B000"><b>Spenden</b></span> können mit Betätigung des Buttons jederzeit durchgeführt werden.
                                </p>
                            </div>
                        </div>
                        @endif
                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Name</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_data']->name." ".$userInfo['user_data']->middle_name." ".$userInfo['user_data']->last_name}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Email Address</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_data']->email}} @if($userInfo['user_data']->status==0)<a style="font-size:13px; color:blue; text-decoration:underline" href="#" data-toggle="modal" data-target="#myModal" id="change_mail">Change</a>@endif</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Date of birth </div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Country</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']['country_name']->name}}, {{$userInfo['user_profile']->city}}, {{$userInfo['user_profile']->postal_code}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Contact Number</div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']->user_contact}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 pr_heading">Address </div>
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']->address}}</div>
                        </div> --}}
                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
            </div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <form action="#">
    <div class="modal-dialog chane_email_dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <span>
                <strong>Change Email Address</strong>
            </span>
        </div>
        <div class="modal-body" style="margin-top:10px">
            <div class="row">
                <lable>Old Email</lable>
                <input class="form-control" type="text" name="old_email" id="old_email" value="{{$userInfo['user_data']->email}}" readonly="readonly">
            </div>
            <div class="row" style="margin-top:10px">
                <lable>New Email</lable>
                <input class="form-control" type="text" placeholder="Enter new email" name="new_email" id="new_email">
                <p class="text-center"><font size="2">After changing your email you need to verify email to use 5Starunity </font></p>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-lg-8 col-xs-12 " id="mailEror"></div>
                <div class="col-lg-4 col-xs-12">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="change_email()" class="btn btn-primary" >Update</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
var agent_id = $(this).data('id');
$('form').submit(function(event) {
    event.preventDefault();
    $.ajax
    ({
        url: '{{ url('/immage_upload') }}',
        type: 'POST',
        data: {
            "_method": 'POST',
            "image": $('input[name=image]').val()
        },
        success: function(result)
        {
            location.reload();
        },
        error: function(data)
        {
            console.log(data);
        }
    });
});
$(".change_pic").click(function (){
    $("#pic_change").modal('show');
    var prfl_picture = $("#prfl_picture").attr('src');
    $("#preview_image").attr('src',prfl_picture);
});
function changeProfile() {
        $('#file').click();

    }
    $('#file').change(function () {
        if ($(this).val() != '') {
            upload(this);

        }
    });
    function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
        $.ajax({
            url: "{{url('ajax-image-upload')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name').val(data);
                    $('#preview_image').attr('src', '{{asset('uploads/users/profile_pic')}}/' + data);
                }
                $('#loading').css('display', 'none');
                setTimeout(function(){
                    // location.reload();
                },1000);

            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }
    function removeFile() {
        if ($('#file_name').val() != '')
            if (confirm('Are you sure want to remove profile picture?')) {
                $('#loading').css('display', 'block');
                var form_data = new FormData();
                form_data.append('_method', 'DELETE');
                form_data.append('_token', '{{csrf_token()}}');
                $.ajax({
                    url: "ajax-remove-image/" + $('#file_name').val(),
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        $('#file_name').val('');
                        $('#loading').css('display', 'none');
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
    }
function change_email()
{
    var oldEmail = $("#old_email").val();
    var newEmail = $("#new_email").val();
    var verifyMail = ValidateEmail(newEmail,"");
    $("#mailEror").removeClass('error_msg');
    if(oldEmail == newEmail)
    {
        $("#mailEror").addClass('error_msg');
        $("#mailEror").html("Email Already in use !");
        return false;
    }
    if(verifyMail!='error')
    {
        $.ajax({
        method: "POST",
        url: "{{route('change-email')}}",
        data: { "_token": "{{ csrf_token() }}",oldEmail: oldEmail,newEmail:newEmail }
        })
        .done(function( msg ) {
            $("#mailEror").addClass('green');
            $("#mailEror").html("Verification Email sent to your email Address! "+ oldEmail)
            setTimeout(function(){
                $('#myModal').modal('hide');
            },1000);

        });
    }
    else
    {
        $("#mailEror").addClass('error_msg');
        $("#mailEror").html("You have entered an invalid email address!")
    }
}
</script>
@endsection

