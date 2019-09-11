@extends('admin.layouts.apps')
@section('style')
<style>
.product_class{
    color: #888888;
    width: 100%;
    padding-top: 5px;
    float: left;
    text-align: left;
    font-weight: bold
}
.green
{
    color:#8eea00 !important
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
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
                        <p>Are you suer you want to cancel this ?</p>
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title">Warning</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p id="modalText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="content-body">
    <!-- Basic form layout section start -->
    <section id="horizontal-form-layouts">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="horz-layout-basic">Create New Cuppons</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                <form class="form form-horizontal" method="post" action="/admin/cuppon/update">
                    <input type="hidden" value="{{$cupponDetial->id}}" name="id" >
                    @csrf
                    <div class="form-body">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="name"> Title</label>
                        <div class="col-md-9">
                            <input value="{{$cupponDetial->name}}" required="required" type="text" id="name" class="form-control" placeholder="Cuppon Title"  name="name">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="amount"> Amount</label>
                        <div class="col-md-9">
                            <input value="{{$cupponDetial->price}}"  required="required" type="text" id="amount" class="form-control" placeholder="Cuppon Amount"  name="amount">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="type"> Type</label>
                        <div class="col-md-9">
                            <select name="type" id="type" class="form-control" >
                                <option {{old('type',$cupponDetial->type)=="percentage"? 'selected':''}} value="percentage"> Percentage </option>
                                <option {{old('type',$cupponDetial->type)=="fixed"? 'selected':''}} value="fixed"> fixed </option>
                            </select>    
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="start_date">Start Date</label>
                        <div class="input-group col-md-9">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-calendar-o"></span>
                            </span>
                            </div>
                            <input value="{{\Carbon\Carbon::parse($cupponDetial->start_date)->toFormattedDateString()}}" required="required" type='text' class="form-control pickadate-select-year" placeholder="Select Start Date" id="start_date" name="start_date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="end_date">End Date</label>
                        <div class="input-group col-md-9">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-calendar-o"></span>
                            </span>
                            </div>
                            <input value="{{\Carbon\Carbon::parse($cupponDetial->end_date)->toFormattedDateString()}}" required="required" type='text' class="form-control pickadate-select-year" placeholder="Select End Date" name="end_date" id="end_date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="siteurl"> Website Url</label>
                        <div class="col-md-9">
                        <input value="{{$cupponDetial->reference_website}}" required="required" type="text" id="siteurl" class="form-control" placeholder="http://example.com"  name="siteurl">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="limit">Limit</label>
                        <div class="col-md-9">
                            <input  value="{{$cupponDetial->usage}}"  required="required" type="text" id="limit" class="form-control" placeholder="Enetr limit of usage"  name="limit">
                            <help>How many time can be used</help>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="desc">Description</label>
                        <div class="col-md-9">
                            <textarea name="desc" id="desc" name="desc" class="form-control" rows="10">{{$cupponDetial->description}}</textarea>
                        </div>
                    </div>                                                            
                    <div class="form-actions">
                        <div class="pull-right">
                            <button type="button" data-toggle="modal" data-backdrop="false" data-target="#info" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                        <br />
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- // Basic form layout section end -->
    </div>
</div>
@endsection
@section('script')
@section('script')
  <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/pickers/dateTime/bootstrap-datetime.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"  type="text/javascript"></script>
<script>
$("#start_date").change(function(){
     var date = $(this).val();
     var requested_date = Date.parse(date);
    //  alert(requested_date);
    var today = moment().format('D MMM, YYYY');
    var current_date = Date.parse(today)

    if(requested_date < current_date)
    {
        $("#modalText").html('Start date must be grater than or equal current date!');
        $("#myModal").modal();
        $(this).val(today);
    }
});
$("#end_date").change(function(){
     var date1 = $(this).val();
     var date2 = $("#start_date").val();

     if(date2=="")
     {
        $("#modalText").html('Please select start date first!');
        $("#myModal").modal();
        $(this).val("");
     }
     var end_date = Date.parse(date1);
     var start_date = Date.parse(date2);

    // var current_date = Date.parse(today)
    if(end_date <= start_date)
    {
        $("#modalText").html('End date must be greater than start date!');
        $("#myModal").modal();
        $(this).val(today);
        $("#end_date").val("")
    }
});
</script>
@endsection