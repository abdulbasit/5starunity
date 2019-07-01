
        <!-- Modal -->
<div class="modal fade text-left" id="pic_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
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
                <li class="@if($route=='free_coins')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="glyphicon glyphicon-cd"></i>
                    {{ __('lables.free_coins')}}</a>
                </li>
                <li class="@if($route=='partner')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="	glyphicon glyphicon-link"></i>
                    {{ __('lables.product_partner')}}</a>
                </li>
                <li class="@if($route=='invite_friends')active @endif">
                    <a href="{{route('profile')}}">
                    <i class="	glyphicon glyphicon-share"></i>
                    {{ __('lables.invite_friends')}}</a>
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
