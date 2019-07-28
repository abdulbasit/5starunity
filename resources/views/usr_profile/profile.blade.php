
@extends('layouts.app')

@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
.my-card
{
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
    box-shadow: 1px 5px 7px #CCC;
    margin-left: -35px;
    overflow: hidden
}
.table > thead > tr > th
{
    border:0px !important
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
{
    border:0px !important
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
@section('content')
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
               
                 <div class="row profile-body">
                    <div class="col-lg-12 col-xs-12 profileWraper">
                        <p>
                            In diesem Bereich haben Sie die Möglichkeit Ihre Anmeldedaten einzusehen, zu ändern oder eine Löschung Ihres gesamten Accounts vorzumerken; bitte geben Sie nur übereinstimmende  Daten Ihres Ausweisdokuments an.<br />
                            <br />
                            Wir weisen darauf hin, dass nach einer Änderung von Daten zur Sicherheit eine erneute Verifizierung erfolgt – bis zur Bestätigung können diverse Funktionen nur eingeschränkt benutzt werden.
                        </p>
                        <br />
                        <table class="table table-borderless profileTable">
                            <tbody>
                                <tr>
                                    <td align="right">{{ __('lables.first_name')}}</td>
                                    <td>{{$userInfo['user_data']->name}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.middle_name')}}</td>
                                    <td>{{$userInfo['user_data']->middle_name}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.last_name')}}</td>
                                    <td>{{$userInfo['user_data']->last_name}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.email')}}</td>
                                    <td>{{$userInfo['user_data']->email}} @if($userInfo['user_data']->status==0)<a style="font-size:13px; color:blue; text-decoration:underline" href="#" data-toggle="modal" data-target="#myModal" id="change_mail">{{ __('lables.change')}}</a>@endif</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                </tr> -->
                                <tr>
                                    <td align="right">{{ __('lables.dob')}} </td>
                                    <td>{{date('d-m-Y', strtotime($userInfo['user_profile']->dob))}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.street_number')}} </td>
                                    <td>{{$userInfo['user_profile']->street}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.house_number')}} </td>
                                    <td>{{$userInfo['user_profile']->house_number}}</td>
                                </tr>
                                <tr>
                                    <td align="right">{{ __('lables.address2')}}</td>
                                    <td>{{$userInfo['user_profile']->address}}</td>
                                </tr>    
                                <tr>
                                    <td align="right">{{ __('lables.postal_code')}}</td>
                                    <td>{{$userInfo['user_profile']->postal_code}}</td>
                                </tr>  
                                <tr>
                                    <td align="right">{{ __('lables.city')}}</td>
                                    <td>{{$userInfo['user_profile']->city}}</td>
                                </tr>     
                                <tr>
                                    <td align="right">{{ __('lables.country')}}</td>
                                    <td>{{$userInfo['user_profile']['country_name']->name}}</td>
                                </tr>     
                                <tr>
                                    <td align="right">{{ __('lables.phone_number')}}</td>
                                    <td>{{$userInfo['user_profile']->user_contact}}</td>
                                </tr>
                                                           
                            </tbody>
                        </table>
                         <div class="row">
                         <br />
                         @if($userInfo['user_data']->status==0)
                            <div class="col-xs-4">
                                <a class="editProf" style="" href="{{route('account-settings')}}">{{ __('lables.edit_profile')}}</a>
                            </div>  
                            <div class="col-xs-8">
                                    Datenänderung bedarf einer erneuten Verifizierung einschließlich Übermittlung eines Ausweis- bzw. Adressdokuments, welche bis zu 72h benötigt und bis dahin ggf. Funktionen einschränkt.               
                            </div>  
                            @endif
                        </div>
                        
                        <div class="row" style="margin-top:30px">
                                @if($userInfo['user_data']->status==0)
                            <div class="col-xs-4">
                                    <a data-toggle="modal" data-target="#accountDelete" class="deletProf">{{ __('lables.delete_account')}}</a>                                
                            </div>
                            <div class="col-xs-8">
                                Eine Account Löschung wird innerhalb von 72h bestätigt – bitte beachten Sie, dass <span style="color:red; font-weight:bold">keine</span> Wiederherstellung vorgenommen werden kann.  
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
            </div>
		</div>
	</div>
</div>

<!-- Modal -->
@if ($message = Session::get('notice'))

<div class="modal fade" id="accountDeleteNotice" tabindex="-1" role="dialog" aria-labelledby="accountDeleteNoticeLabel" aria-hidden="true">
<form action="#">
    <div class="modal-dialog chane_email_dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <span>
                <strong style="color:#F9B000">Notice!</strong>
            </span>
        </div>
        <div class="modal-body" style="margin-top:10px">
            {{$message}}. From now you are unable to use our services 
        </div>
            <div class="modal-footer">
                <a href="logout" class="btn btn-success">Okay</a>
            </div>
        </div>
    </div>
</div>
@endif
<div class="modal fade" id="accountDelete" tabindex="-1" role="dialog" aria-labelledby="accountDeleteLabel" aria-hidden="true">
<form action="#">
    <div class="modal-dialog chane_email_dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <span>
                <strong>{{ __('messages.delte_account')}}</strong>
            </span>
        </div>
        <div class="modal-body" style="margin-top:10px">
            
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('lables.no')}}</button>
                <button type="button" class="btn btn-success" id="delete_account_btn">{{ __('lables.yes')}}</button>
        </div>
      </div>
    </div>
</div>

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
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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
@if ($message = Session::get('notice'))
$( document ).ready(function() {
    $("#accountDeleteNotice").modal()
});
    
@endif()


$("#delete_account_btn").on('click',function(){
    window.location='profile/delete';
});
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

