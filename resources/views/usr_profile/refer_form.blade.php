{{-- {{dd('here')}} --}}
@extends('layouts.app')

@section('style')
<style>
.bootstrap-tagsinput .tag
{
   line-height: 30px
}
.bs-docs-example input 
{
    width:100% !important
}
.bootstrap-tagsinput
{
    width:100%
}
.profileTable > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
{
    padding-left:10px !important
}
</style>
<link rel="stylesheet" href="{{ asset('frontend/tags_input/bootstrap-tagsinput.css')}}">
@endsection
@section('script')
<script src="{{ asset('frontend/tags_input/bootstrap-tagsinput.min.js')}}"></script>
<script>
    $("#filter").on('change',function(){
        var filter = $(this).val();
        window.location='/user/refer/'+filter
    });
</script>
@endsection
@section('content')
    <div class="container">
        <div class="row profile">
        <?php @$msg = explode("?",Session::get('message'));
            @$mailsList = explode(",",rtrim($msg[1],","));
        ?>
            @include('../layouts.user_menu')
            <div class="col-md-9 prof" style="margin-top:0px">

                    @if (count($mailsList)>1)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b>Alrady Registered Emails </b><br />
                            @foreach($mailsList as $regEmails)
                                {{$regEmails}} <br />
                            @endforeach
                        </div>
                    @endif

                @if ($msg[0]!="")
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $msg[0] }}
                    </div>
                @endif
                
                @if($userInfo['user_data']->status==0)
                <div class="profile-content">
                        <form action="/send_inivte" method="post">
                            @csrf
                            <div class="row profile-body">
                                <div class="col-lg-12 col-xs-12 profileWraper">
                                    <h3>Invite Friends</h3>
                                    <section id="examples">
                                        <div class="example example_markup">
                                            <div class="bs-docs-example">
                                            <input type="text" name="email_list" value="" data-role="tagsinput" placeholder="Add (,) comma seperated email" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-11 col-lg-10" id="logBtnWrap">
                                                    <div class="pull-right" style="width:100%">
                                                        <div class="col-md-2 col-sm-3 col-xs-4 pull-right" >
                                                            <button type="submit" class="btn btn-primary" style="margin-left:12px; margin-top:10px">
                                                                {{ __('Invite Friends') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            <div class="col-lg-1 col-xs-12 profileWraper"></div>
                        </div>
                    </form>
                    <div class="row">
                        <br />
                        <br />
                        <h3>My Team</h3>
                        <div class="col-xs-12" style="margin-bottom:20px; padding:0px">
                            <select name="filter" id="filter" class="fomr-controle pull-right text-center">
                                <option value="all" @if($filters=='all') selected @endif>All</option>
                                <option value="active" @if($filters=='active') selected @endif>Active</option>
                                <option value="inactive" @if($filters=='inactive') selected @endif>In Active</option>
                            </select>
                        </div>
                        <table class="table table-striped table-bordered"  style="margin:0px; padding:0px">
                           
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Email</th>
                                    @if($filters=='all' || $filters=='active') 
                                        <th scope="col">Spent</th>
                                    @endif
                                    <th scope="col">Status</th>
                                    <th scope="col">Sent Date</th>
                                    <th scope="col">Accept Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach($emaailsList as $list)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$list->email}}</td>
                                    @if($filters=='all' || $filters=='active') 
                                        <td>
                                            {{App\Models\TeamSpend::calculateDonation(@$list->reciver_id,@$list->sender_id)}}
                                        </td>
                                    @endif
                                    <td>
                                        @if($list->verification_code=="")
                                            <span class="green">{{ __('lables.active')}}</span>
                                        @else
                                            <span class="red">{{ __('lables.inactive')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($list->created_at)->toFormattedDateString()}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($list->updated_at)->toFormattedDateString()}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="text-center">
                            <ul class="pagination" style="margin:0px; padding:0px">
                                {{ $emaailsList->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
                @else 
                <div class="alert alert-warning profileWraper">
                    <strong>Warning!</strong> Only verified users can avail this option
                </div>
                      
                @endif
            </div>
        </div>
    </div>
    
@endsection


