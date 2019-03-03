@extends('admin.layouts.apps')
@section('style')
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/froala_editor.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/froala_style.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/code_view.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/image_manager.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/image.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/table.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/video.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/image_manager.css')}}">
<link rel="stylesheet" href="{{ asset('app-assets/editor/css/plugins/image.css')}}">
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
                            <p>Are you suer you want to delete this image ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn grey btn-danger" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-success" id="yes">Yes</button>
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
                      <h4 class="card-title" id="horz-layout-basic">Create New Blog</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" method="post" action="/admin/blog/update/{{$blog->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                    <h4 class="form-section">Post Information </h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Blog Title</label>
                                    <div class="col-md-9">
                                    <input type="text" id="title" class="form-control" placeholder="Enter Title"  name="title" value="{{$blog->title}}">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Category</label>
                                    <div class="col-md-9">
                                    <select id="category" name="category" class="form-control">
                                        @foreach($category as $cat)
                                            <option {{old('status',$cat->id)==$blog->cat_id? 'selected':''}} value="{{$cat->id}}"> {{$cat->name}} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Blog Image</label>
                                    <div class="col-md-9">
                                        <div class="pull-left">
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="pull-left" id="{{$blog->id}}">
                                            <img width="50" src="{{ URL::to('/') }}/uploads/blog/{{$blog->post_img}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="address">Description</label>
                                    <div class="col-md-9">
                                        <textarea required="required" id="desc" rows="12" class="form-control" name="desc" placeholder="Provide Complete Description..">{{$blog->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Status</label>
                                    <div class="col-md-9">
                                    <select id="status" name="status" class="form-control">
                                        <option value="0" {{old('pro_status',$blog->status)=="0"? 'selected':''}}> Active </option>
                                        <option value="1" {{old('pro_status',$blog->status)=="1"? 'selected':''}}> Disable </option>
                                    </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-md-3 label-control" for="address">Allow Comments</label>
                                    <div class="col-md-9">
                                        <textarea required="required" id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description.."></textarea>
                                    </div>
                                </div> --}}
                                <h4 class="form-section"> SEO Information </h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="address">Meta Title</label>
                                    <div class="col-md-9">
                                    <input type="text" id="mtitle" class="form-control" placeholder="Enter Meta Title"  name="mtitle" value="{{$blog->seo_title}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="address">Meta Tags</label>
                                    <div class="col-md-9">
                                        <input type="text" id="mtags" class="form-control" placeholder="Enter Meta Tags "  name="mtags" value="{{$blog->seo_meta}}">
                                        <small>Enter here comma (,) seprated tags</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="address">Meta Description</label>
                                    <div class="col-md-9">
                                        <textarea required="required" id="mdesc" rows="5" class="form-control" name="mdesc" placeholder="Provide Meta Description..">{{$blog->seo_meta_des}}</textarea>
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
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/froala_editor.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/froala_editor.min.js')}}" ></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/char_counter.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/code_beautifier.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/code_view.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/colors.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/draggable.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/emoticons.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/entities.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/file.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/font_size.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/font_family.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/fullscreen.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/image.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/image_manager.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/line_breaker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/inline_style.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/link.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/lists.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/paragraph_format.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/paragraph_style.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/quick_insert.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/quote.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/table.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/save.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/url.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('app-assets/editor/js/plugins/video.min.js')}}"></script>
  <script>
    $(function(){
        $('#desc')
        .on('froalaEditor.initialized')
        .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
    });
</script>
<script src="{{ asset('app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
<script>
    function test(id)
    {
        $("#yes").attr('onclick',"deletePhoto("+id+")")
    }
function deletePhoto(id)
{
    $.ajax({
        method: "POST",
        url: "{{route('admin.blog.delete_photo')}}",
        data: { "_token": "{{ csrf_token() }}",id: id }
    })
    .done(function( msg ) {
        $("#"+id).fadeOut();
        $('#info').modal('hide');
    });
}

$("#price").change(function(){
    var price = $(this).val();
    if(price == 0)
    {
        $("#modalText").html('Price must be greater then 0!');
        $("#myModal").modal();
        $(this).val("");
        $(this).focus();
    }
});
</script>
<script>
    $(function() {
      $('#desc').froalaEditor({
          alert('dd');
        // Set the file upload URL.
        imageUploadURL: '/blog/update/image/',

        imageUploadParams: {
          id: 'my_editor'
        }
      })
    });
    // $(function(){
    //     $('#desc').froalaEditor()
    //     .on('froalaEditor.image.beforeUpload', function (e, editor, files) {
    //         if (files.length) {
    //         var reader = new FileReader();
    //         console.log(files)
    //         reader.onload = function (e) {
    //             var result = e.target.result;
    //             editor.image.insert(result, null, null, editor.image.get());
    //         };
    //         reader.readAsDataURL(files[0]);
    //         }

    //         return false;
    //     })
    // });
</script>
@endsection
