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
                      <h4 class="card-title" id="horz-layout-basic">Create New Category</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal">
                          <div class="form-body">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Parent Category</label>
                              <div class="col-md-9">
                                <select id="state" name="state" class="form-control">
                                    <option value="none" selected="" disabled="">Interested in</option>
                                    <option value="design">design</option>
                                    <option value="development">development</option>
                                    <option value="illustration">illustration</option>
                                    <option value="branding">branding</option>
                                    <option value="video">video</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Category Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" placeholder="Complete Name"  name="name">
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
