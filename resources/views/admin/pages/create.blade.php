@extends('admin.layouts.apps')

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
                      <h4 class="card-title" id="horz-layout-basic">Create New Page</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="/admin/page/save">
                            @csrf
                          <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" placeholder="Page Name"  name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Title</label>
                              <div class="col-md-9">
                                  <input type="text" id="title" class="form-control" placeholder="Page Title"  name="title">
                              </div>
                          </div>
                          <div class="form-group row">
                                <label class="col-md-3 label-control" for="address">Content</label>
                                <div class="col-md-9">
                                    <textarea id="summernote" name="content" placeholder="Page content....."></textarea>
                                    {{-- <textarea required="required" id="desc" rows="12" class="form-control" name="desc" placeholder="Provide Complete Description.."></textarea> --}}
                                </div>
                            </div>
                          </div>
                          <div class="form-actions pull-rigth" >
                              <div class="row" style="float:right">
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 300
    });
</script>
<script>
$("#yes").click(function(){
    window.location.href = "/admin/pages"
});
    $(function(){
          $('#desc').froalaEditor()
            .on('froalaEditor.image.beforeUpload', function (e, editor, files) {
              if (files.length) {
                var reader = new FileReader();
                reader.onload = function (e) {
                  var result = e.target.result;
                  editor.image.insert(result, null, null, editor.image.get());
                  console.log(files);
                };
                // console.log(files[0]);
                reader.readAsDataURL(files[0]);
              }

              return false;
            })
        });



</script>
@endsection
