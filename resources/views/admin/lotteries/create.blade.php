@extends('admin.layouts.apps')
@section('style')
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
                      <h4 class="card-title" id="horz-layout-basic">Create New Lottery</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" action="/admin/lottery/save">
                            @csrf
                            <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1"> Title</label>
                                <div class="col-md-9">
                                    <input required="required" type="text" id="name" class="form-control" placeholder="Lot Title"  name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Product</label>
                              <div class="col-md-9">
                                <select required="required" onchange="getProPrice()" id="pro_id" name="pro_id" class="form-control">
                                    @foreach($products as $product)
                                        <option pro-price="{{$product->pro_price}}" value="{{$product->id}}">{{$product->pro_name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group row" style="display:none" id="price">
                              <label class="col-md-3 label-control" for="projectinput1">Product Price</label>
                              <div class="col-md-6">
                                <input required="required" type="text" readonly="readonly" id="pro_price" class="form-control" placeholder=""  name="pro_price">
                              </div>
                              <div class="col-md-3">
                                  <input required="required" type="text" id="factor" value="" class="form-control" placeholder="Enter factor eg.(2.3)"  name="factor">
                                  <small class="text-muted"  style="position: relative">Enter your factor amount</small>
                              </div>
                            </div>
                            <div class="form-group row" style="margin: 0px">
                                <label class="col-md-3 label-control" for="projectinput1">Lot Amount</label>
                                <div class="col-md-6">
                                    <input required="required" type="text" onchange="getAmount()" id="lot_amount" class="form-control" placeholder="Enter Lottery Amount"  name="lot_amount">
                                </div>
                                <div class="col-md-3" style="top:30px; position: relative">
                                    <input required="required" type="text" id="one_lot" class="form-control" placeholder="One Lot Amount.."  name="one_lot_amount" style="border:0px" readonly="readonly">
                                    <small class="text-muted"  style=" position: relative">One lot cost will be.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Total Lots</label>
                                <div class="col-md-6">
                                    <input required="required" type="text" onchange="getAmount()" id="total_lots" class="form-control" placeholder="Total Contestents eg.(10)"  name="total_lots">
                                </div>
                                <div class="col-md-3">
                                    {{-- <input type="text" id="total_lots" class="form-control" placeholder="Total Lots"  name="total_lots" style="border:0px" readonly="readonly"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Min Lots</label>
                                <div class="col-md-9">
                                    <input required="required" type="text" id="min_lot" class="form-control" placeholder="Enter Min Lottery"  name="min_lot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Max Lots</label>
                                <div class="col-md-9">
                                    <input required="required" type="text" id="max_lot" class="form-control" placeholder="Enter Max Lottery"  name="max_lot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Start Date</label>
                                <div class="input-group col-md-9">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-calendar-o"></span>
                                    </span>
                                    </div>
                                    <input required="required" type='text' class="form-control pickadate-select-year" placeholder="Select Start Date" id="start_date" name="start_date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">End Date</label>
                                <div class="input-group col-md-9">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-calendar-o"></span>
                                    </span>
                                    </div>
                                    <input required="required" type='text' class="form-control pickadate-select-year" placeholder="Select Start Date" name="end_date" id="end_date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="address">Description</label>
                                <div class="col-md-9">
                                  <textarea required="required" id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description.."></textarea>
                                </div>
                              </div>
                          </div>
                          <div class="form-actions">
                            <button type="button" data-toggle="modal" data-backdrop="false" data-target="#info" class="btn btn-warning mr-1">
                              <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                              <i class="fa fa-check-square-o"></i> Save
                            </button>
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
$("#yes").click(function(){
    window.location.href = "/admin/lotteries"
});
function getAmount(){
    var amount = $("#lot_amount").val();
    var totalLots = $("#total_lots").val();
    if(totalLots=="" || amount=="")
        return false;

    var totalLots = amount/totalLots;
    $("#one_lot").val(totalLots.toFixed(0));
}
$("#start_date").change(function(){
     var date = $(this).val();
     var requested_date = Date.parse(date);
    //  alert(requested_date);
    var today = moment().format('D MMM, YYYY');
    var current_date = Date.parse(today)

    if(requested_date < current_date)
    {
        $("#modalText").html('Start date must be grater then or equal to current date!');
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

    var current_date = Date.parse(today)
    if(end_date < start_date)
    {
        $("#modalText").html('End date must be grater then or equal to start date!');
        $("#myModal").modal();
        $(this).val(today);
    }
});

function getProPrice(){
  var option = $('option:selected', "#pro_id").attr('pro-price');
  $("#price").fadeIn(function (){
    $("#pro_price").val(option);
  });
}
$("#factor").change(function(){
  var factor = $(this).val();
  var pro_price = $("#pro_price").val();
  var lotAmount = pro_price*factor;
  $("#lot_amount").val(lotAmount.toFixed(0));
});
$( document ).ready(function() {
    getProPrice();
});
</script>
@endsection
