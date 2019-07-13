
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
</style>
<link rel="stylesheet" href="{{ asset('frontend/tags_input/bootstrap-tagsinput.css')}}">
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
                
                @if($userInfo['user_data']->status==0)
                <div class="profile-content">
                        <form action="/send_inivte" method="post">
                            @csrf
                            <div class="row profile-body">
                                <div class="col-lg-10 col-xs-12 profileWraper">
                                    <div class="section-title text-left">Invite Friends</div>
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
                        <div class="section-title text-left">Listings</div>
                        
                        <table class="table table-striped table-bordered">
                           
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Donations</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Team Spenden</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emaailsList as $list)
                                <tr>
                                    <th scope="row">{{$list->id}}</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@section('script')
<script src="{{ asset('frontend/tags_input/bootstrap-tagsinput.min.js')}}"></script>
@endsection

