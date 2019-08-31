
        <!-- Modal -->
<div class="modal fade text-left" id="pic_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                    <div style="width:200px;height: 200px; border: 1px solid whitesmoke ;text-align: center;position: relative; border-radius:1000px; overflow:hidden" id="image">
                        <img width="100%" height="100%" id="preview_image" src="{{asset('images/noimage.jpg')}}"/>
                         <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                    </div>
                    <p style="margin-top:30px">
                        <a href="javascript:changeProfile()" style="text-decoration: none;">
                            <i class="glyphicon glyphicon-edit"></i> {{ __('lables.change')}}
                        </a>&nbsp;&nbsp;
                        <a href="profile/picture/remove" style="color: red;text-decoration: none; text-transform: lowercase">
                            <i class="glyphicon glyphicon-trash"></i>
                            {{  __('lables.delete')}}
                        </a>
                    </p>
                    <input type="file" id="file" style="display: none"/>
                    <input type="hidden" id="file_name"/>
                </div>
                <div class="col-md-8">
                    <p style="margin-top:10px">
                        <br />
                        Empfohlenes Format für Ihr Profilbild sind 300×300 Pixel, wobei die Upload-Größe max. 4 MB betragen sollte. Es könnten verschiedene Dateiformate wie z. B. JPG, JPEG hochgeladen werden. Wir halten uns offen Profilbilder zu löschen bzw. eine Freischaltung zu untersagen, sollten diese gegen geltendes Recht / unsere Netiquette verstoßen oder beleidigende Darstellungen zeigen.
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            @if($userInfo['user_profile']->profile_picture=="")
                <img class="img-responsive" id="prfl_picture" width="50" src="{{ URL::to('/') }}/frontend/graphics/icons/avatar-placeholder.png">
            @else
                <img class="img-responsive" id="prfl_picture" width="50" src="{{ URL::to('/') }}/uploads/users/profile_pic/{{$userInfo['user_profile']->profile_picture}}">
            @endif
            <div class="change_pic"><a href="#">{{ __('lables.edit_picture')}}</a></div>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name" style="text-transform:capitalize">
                    {{$userInfo['user_data']->name}}
            </div>
        </div>
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="@if($route=='dashboard')active @endif">
                    <a href="{{route('dashboard')}}">
                    <i class="glyphicon glyphicon-home"></i>
                    Dashboard </a>
                </li>
                <li class="@if($route=='profile')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="glyphicon glyphicon-user"></i>
                    {{ __('lables.my_profile')}} </a>
                </li>
                <li class="@if($route=='lotteries')active @endif">
                    <a href="{{route('lottery.user.purchased')}}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    {{ __('lables.my_lots')}} </a>
                </li>
                <li class="@if($route=='promotions')active @endif">
                    <a href="{{route('promotions')}}">
                    <i class="glyphicon glyphicon-cd"></i>
                    {{ __('lables.free_coins')}}</a>
                </li>
                <li class="@if($route=='partner')active @endif">
                    <a href="{{route('partners')}}">
                    <i class="	glyphicon glyphicon-link"></i>
                    {{ __('lables.product_partner')}}</a>
                </li>
                <li class="@if($route=='refer')active @endif">
                    <a href="{{route('user.refer','all')}}">
                        <i class="	glyphicon glyphicon-share"></i>
                        {{ __('lables.invite_friends')}}
                    </a>
                </li>
                <li class="@if($route=='documents_area')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="glyphicon glyphicon-file"></i>
                    {{ __('lables.documents_area')}}</a>
                </li>
                <li class="@if($route=='activities')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    {{ __('lables.activities')}} </a>
                </li>
                <li class="@if($route=='my_contacts')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="	glyphicon glyphicon-education"></i>
                    {{ __('lables.my_contacts')}}</a>
                </li>
                <li class="@if($route=='update-profile') active @endif">
                    @if($userInfo['user_data']->status==0)
                        <a  href="{{route('account-settings')}}">
                        <i class="glyphicon glyphicon-cog"></i>
                        {{ __('lables.settings')}} </a>
                    @endif
                </li>
                <li class="@if($route=='security')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="	glyphicon glyphicon-lock"></i>
                    {{ __('lables.security')}} </a>
                </li>

                {{-- <li  class="@if($route=='wallet')active @endif">
                    @if($userInfo['user_data']->status==0)
                        <a href="{{route('wallet')}}">
                        <i class="glyphicon glyphicon-credit-card"></i>
                        Wallet </a>
                    @endif
                </li> --}}

                <li class="logoutUser">
                    <a style="color:white" href="/logout">
                    <i class="glyphicon glyphicon-log-out"></i>
                    Logout </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
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
