
        <!-- Modal -->
<div class="modal fade text-left" id="pic_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div style="width:200px;height: 200px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">
                        <img width="100%" height="100%" id="preview_image" src="{{asset('images/noimage.jpg')}}"/>
                        <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                    </div>
                    <p>
                        <a href="javascript:changeProfile()" style="text-decoration: none;">
                            <i class="glyphicon glyphicon-edit"></i> Change
                        </a>&nbsp;&nbsp;
                        {{-- <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                            <i class="glyphicon glyphicon-trash"></i>
                            Remove
                        </a> --}}
                    </p>
                    <input type="file" id="file" style="display: none"/>
                    <input type="hidden" id="file_name"/>
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
            <div class="change_pic"><a href="#">Edit Picture</a></div>
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
                <li class="@if($route=='profile')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="glyphicon glyphicon-home"></i>
                    Overview </a>
                </li>
                <li class="@if($route=='update-profile') active @endif">
                    <a  href="{{route('account-settings')}}">
                    <i class="glyphicon glyphicon-cog"></i>
                    Account Settings </a>
                </li>
                <li  class="@if($route=='wallet')active @endif">
                    <a href="{{route('wallet')}}">
                    <i class="glyphicon glyphicon-credit-card"></i>
                    Wallet </a>
                </li>
                <li>
                    <a href="#">
                    <i class="glyphicon glyphicon-th-list"></i>
                    Purchased Lots </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
