@extends('admin.layouts.apps')

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
                        <form class="form form-horizontal">
                          <div class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1"> Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" placeholder="Category Name"  name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Parent Category</label>
                              <div class="col-md-9">
                                <select id="state" name="state" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->pro_name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Lot Amount</label>
                                <div class="col-md-9">
                                    <input type="text" id="lot_amount" class="form-control" placeholder="Enter Lottery Amount"  name="lot_amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Min Lots</label>
                                <div class="col-md-9">
                                    <input type="text" id="min_lot" class="form-control" placeholder="Enter Min Lottery"  name="min_lot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Max Lots</label>
                                <div class="col-md-9">
                                    <input type="text" id="max_lot" class="form-control" placeholder="Enter Max Lottery"  name="max_lot">
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
            <!-- // Basic form layout section end -->
          </div>
        </div>

@endsection
