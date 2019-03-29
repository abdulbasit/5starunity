
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row profile">
        @include('../layouts.user_menu')
		<div class="col-md-9 prof">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif
            <div class="profile-content">
                <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12">
                        <div class="row text-right">
                            <a href="{{route('account-settings')}}">Edit Profile</a>
                        </div>
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
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_data']->name." ".$userInfo['user_data']->middle_name." ".$userInfo['user_data']->last_name}}</div>
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
                            <div class="col-lg-8 col-md-6 col-xs-12">{{$userInfo['user_profile']['country_name']->name}}, {{$userInfo['user_profile']->city}}, {{$userInfo['user_profile']->postal_code}}</div>
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
                    location.reload();
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
</script>
@endsection

