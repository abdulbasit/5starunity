@extends('admin.layouts.apps')

@section('content')

        <div class="content-wrapper">
          <div class="content-header row">
            {{-- <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Horizontal Forms</h3>
              <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Horizontal Forms</a>
                    </li>
                  </ol>
                </div>
              </div>
            </div> --}}
            {{-- <div class="content-header-right col-md-6 col-12">
              <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                  <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1"
                  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a>
                    <a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a>
                  </div>
                </div>
                <a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="ft-mail"></i></a>
                <a class="btn btn-outline-primary" href="timeline-center.html"><i class="ft-pie-chart"></i></a>
              </div>
            </div> --}}
          </div>
          <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-basic">Create New Product</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" action="/admin/product/save" enctype="multipart/form-data">
                            @csrf
                          <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> Product Info</h4>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1"> Name</label>
                              <div class="col-md-9">
                                <input type="text" id="name" class="form-control" placeholder="Complete Name"  name="name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput3">Price</label>
                              <div class="col-md-9">
                                <input type="text" id="price" class="form-control" placeholder="Product Price" name="price">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4">Status</label>
                              <div class="col-md-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="0" >Active</option>
                                    <option value="1">InActive</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="images[]" id="images" multiple="multiple">
                                </div>
                              </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="address">Description</label>
                              <div class="col-md-9">
                                <textarea id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description.."></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions pull-right">
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
