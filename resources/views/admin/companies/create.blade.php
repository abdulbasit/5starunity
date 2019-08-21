@extends('admin.layouts.apps')
@section('style')
<style>
.fr-box.fr-basic .fr-element
{
    height: 250px;
}
.fr-toolbar
{
    border-top: 5px solid #404E67
}
</style>
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
          <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" action="{{route('admin.company.save')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">Company Information </h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Company Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control" placeholder="Enter Company Name"  name="company" value="">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Maximum No.  of views</label>
                                    <div class="col-md-9">
                                        <input type="text" id="views" class="form-control" placeholder="Enter Views "  name="views" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Add Type </label>
                                    <div class="col-md-9">
                                    <select id="add_type" name="add_type" class="form-control">
                                        <option value="0"> Image </option>
                                        <option value="1"> Video </option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="image">
                                    <label class="col-md-3 label-control" for="projectinput1"> Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group row hidden" id="video">
                                    <label class="col-md-3 label-control" for="projectinput1">Video</label>
                                    <div class="col-md-9">
                                        <input type="text" id="youtube_video" class="form-control" placeholder="Youtube URL "  name="youtube_video" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="duration">Enter Duration (seconds)</label>
                                    <div class="col-md-9">
                                        <input type="text" id="duration" class="form-control" placeholder="Enter Add Duration"  name="duration" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount">Enter amount for total views </label>
                                    <div class="col-md-9">
                                        <input type="text" id="amount" class="form-control" placeholder="Enter per views amount "  name="amount" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount">Number of views allowed </label>
                                    <div class="col-md-9">
                                        <input type="text" id="views_allowed" class="form-control" placeholder="Enter number views attempt"  name="views_allowed" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="amount">Enter amount Per View </label>
                                    <div class="col-md-9">
                                        <input type="text" id="per_view_amount" class="form-control" placeholder="Enter per views amount for user  "  name="per_view_amount" value="">
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
                                <br /><br />
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

<script>
    $("#add_type").on('change',function(){
        var type = $(this).val();
       if(type==0)
       {
            $("#image").removeClass('hidden');
            $("#video").addClass('hidden');
       }
       else{
            $("#image").addClass('hidden');
            $("#video").removeClass('hidden');
       }
    });

    //    $("#youtube_video").on('keyup',function(){
    //     var link = $(this).val();
    //     var videoId = link.split("?v=");

    //     $.ajax({
    //             method: "POST",
    //             url: "{{route('admin.company.video_thumbnail')}}",
    //             data: { "_token": "{{ csrf_token() }}",videoId: videoId[1] }
    //         })
    //         .done(function( msg ) {
               
    //         });
    //    })
</script>


@endsection
