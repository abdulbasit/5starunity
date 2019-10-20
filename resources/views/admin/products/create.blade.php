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
                                <p>Are you sure you want to cancel this ?</p>
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
                                <label class="col-md-3 label-control" for="projectinput4">Category</label>
                                <div class="col-md-9">
                                    <select id="category" name="category" class="form-control">
                                       @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1"> Name</label>
                              <div class="col-md-9">
                                <input type="text" id="name" required="required" class="form-control" placeholder="Complete Name"  name="name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput3">Price</label>
                              <div class="col-md-6">
                                <input type="text" id="price" onchange="check_class()" required="required" class="form-control" placeholder="Product Price" name="price">
                              </div>
                                <input type="hidden" id="class_id" name="class_id" value="">
                              <div class="col-md-3" id="product_class" style="padding-top:10px"></div>
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
<script>
    $("#yes").click(function(){
        window.location.href = "/admin/products"
    });
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
function check_class()
{
    var price = $("#price").val();

    if(price=="" || price < 200)
    {
        $("#price").val("");
        $("#price").css('border','solid 1px red');
        $("#product_class").css('color','red');
        $('#product_class').html('Price must be greater then 200');
        return false;
    }

    $("#price").removeAttr('style');
    $("#product_class").css('color','black');

    if(price>= 200 && price<=1499)
    {
        $('#product_class').html('<strong>Product Class 1</strong>');
        $("#class_id").val(1);
    }
    else if(price >= 1500 && price <= 3999)
    {
        $('#product_class').html('<strong>Product Class 2</strong>');
        $("#class_id").val(2);
    }
    else if(price >= 4000 && price <= 7999)
    {
        $('#product_class').html('<strong>Product Class 3</strong>');
        $("#class_id").val(3);
    }
    else if(price >= 8000 && price <= 15999)
    {
        $('#product_class').html('<strong>Product Class 4</strong>');
        $("#class_id").val(4);
    }
    else
    {
        $('#product_class').html('<strong>Product Class 5 </strong>');
        $("#class_id").val(5);
    }
}
</script>
@endsection
