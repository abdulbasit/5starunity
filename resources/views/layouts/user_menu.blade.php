<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title" id="myModalLabel11">Warning!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you suer you want to delete this product ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-danger" data-dismiss="modal">No</button>
                <button type="button" delete-id="" class="btn btn-success" id="yes">Yes</button>
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
                <img class="img-responsive" width="50" src="{{ URL::to('/') }}/frontend/graphics/icons/avatar-placeholder.png">
            @else
                <img class="img-responsive" width="50" src="{{ URL::to('/') }}/uploads/users/profile_pic/{{$userInfo['user_profile']->profile_picture}}">
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
                <li>
                    <a href="#">
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
</script>
@endsection
