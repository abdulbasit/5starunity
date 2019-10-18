@extends('admin.layouts.apps')

@section('content')

        <div class="content-wrapper">
          <div class="content-header row">
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
          </div>
          <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-basic">Website Settings</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" action="/admin/settings/save" enctype="multipart/form-data">
                            @csrf
                          <div class="form-body">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4">Allowed Countries </label>
                              <div class="col-md-9">
                                <select id="country_list" multiple="multiple" style="min-height:200px; overflow-y:scroll; padding:0px" name="country_list[]" class="form-control">
                                  @foreach($country_list as $country)
                                      <option @if(in_array($country->id, $allowedCountries)) selected @endif style="height:30px; padding-top:5px; padding-bottom:10px; padding-left:10px" value="{{$country->id}}" >{{$country->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions pull-right">
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
