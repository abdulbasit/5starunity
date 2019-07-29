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
                      <h4 class="card-title" id="horz-layout-basic">Create New Testimonials</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="/admin/testimonials/update/{{$testimonial->id}}">
                            @csrf
                          <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Name</label>
                                <div class="col-md-9">
                                <input type="text" id="name" class="form-control" placeholder="Complete Name"  name="name" value="{{$testimonial->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Title</label>
                              <div class="col-md-9">
                                  <input type="text" id="title" class="form-control" placeholder="Entring Title"  name="title" value="{{$testimonial->title}}">
                              </div>
                          </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Description</label>
                                <div class="col-md-9">
                                    <textarea required="required" id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description..">{{$testimonial->detail}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                          </div>
                          <div class="form-actions pull-rigth">
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
