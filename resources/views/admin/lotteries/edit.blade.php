@extends('admin.layouts.apps')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
@section('content')

        <div class="content-wrapper">

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
                        <form class="form form-horizontal" method="post" action="/admin/lottery/update/{{$lottery->id}}">
                            @csrf
                            <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1"> Title</label>
                                <div class="col-md-9">
                                <input type="text" id="name" value="{{$lottery->name}}" class="form-control" placeholder="Lot Title"  name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Parent Category</label>
                              <div class="col-md-9">
                                <select id="pro_id" name="pro_id" class="form-control">
                                    @foreach($products as $product)
                                        <option {{old('pro_status',$product->pro_id)==$lottery->product->id? 'selected':''}}value="{{$product->id}}">{{$product->pro_name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group row" id="price">
                                <label class="col-md-3 label-control" for="projectinput1">Product Price</label>
                                <div class="col-md-6">
                                    <input required="required" type="text" value="{{$lottery->product->pro_price}}" readonly="readonly" id="pro_price" class="form-control" placeholder=""  name="pro_price">
                                </div>
                                <div class="col-md-3">
                                    <input required="required" type="text" id="factor" value="{{$lottery->factor_amount}}" class="form-control" placeholder="Enter factor eg.(2.3)"  name="factor">
                                    <small class="text-muted"  style="position: relative">Enter your factor amount</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Lot Amount</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{$lottery->lot_amount}}" onchange="getAmount()" id="lot_amount" class="form-control" placeholder="Enter Lottery Amount"  name="lot_amount">
                                </div>
                                <div class="col-md-3" style="top:30px; position: relative">
                                    <input type="text" value="{{$lottery->one_lot_amount}}" id="one_lot" class="form-control" placeholder="One Lot Amount.."  name="one_lot_amount" style="border:0px" readonly="readonly">
                                    <small class="text-muted"  style=" position: relative">One lot cost will be.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Total Lots</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{$lottery->total_lots}}" onchange="getAmount()" id="total_lots" class="form-control" placeholder="Total Contestents eg.(10)"  name="total_lots">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Min Lots</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$lottery->min_lot_amount}}" id="min_lot" class="form-control" placeholder="Enter Min Lottery"  name="min_lot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Max Lots</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$lottery->max_lot_amount}}" id="max_lot" class="form-control" placeholder="Enter Max Lottery"  name="max_lot">
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
                                    <input type='text' value="{{$lottery->start_date}}" class="form-control pickadate-select-year" placeholder="Select Start Date" id="start_date" name="start_date" />
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
                                        <input type='text' value="{{$lottery->end_date}}" class="form-control pickadate-select-year" placeholder="Select Start Date" name="end_date" />
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="address">Description</label>
                                <div class="col-md-9">
                                  <textarea id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description..">{{$lottery->description}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
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
function getAmount(){
    var amount = $("#lot_amount").val();
    var totalLots = $("#total_lots").val();
    if(totalLots=="" || amount=="")
        return false;

    var totalLots = amount/totalLots;
    $("#one_lot").val(totalLots.toFixed(2));
}
</script>
@endsection
