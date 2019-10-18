@extends('admin.layouts.apps')
@section('content')
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
<div class="content-wrapper">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title">Warning</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="modalText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <!-- Modal -->
            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
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
                            <h4 class="card-title" id="horz-layout-basic">Edit Product</h4>

                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="/admin/product/update/{{$productInfo->id}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Product Info</h4>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput4">Category</label>
                                            <div class="col-md-9">
                                                <select id="category" name="category" class="form-control">
                                                    @foreach($category as $cat)
                                                        <option {{old('cat_id',$productInfo->cat_id)==$cat->id? 'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput1"> Name</label>
                                            <div class="col-md-9">
                                                <input type="text" required="required" id="name" class="form-control" value="{{$productInfo->pro_name}}" placeholder="Complete Name"
                                                    name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput3">Price</label>
                                            <div class="col-md-6">
                                                <input onchange="check_class()" required="required" type="text" id="price" class="form-control" value="{{$productInfo->pro_price}}" placeholder="Product Price"
                                                    name="price">
                                            </div>
                                            <input type="hidden" id="class_id" name="class_id" value="">
                                            <div class="col-md-3" id="product_class" style="padding-top:10px"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput4">Status</label>
                                            <div class="col-md-9">
                                                <select id="status" name="status" class="form-control">
                                                    <option value="0" {{old('pro_status',$productInfo->pro_status)=="0"? 'selected':''}}>Active</option>
                                                    <option value="1" {{old('pro_status',$productInfo->pro_status)=="1"? 'selected':''}}>InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput4">Image</label>
                                            <div class="col-md-9">
                                                <div class="pull-left">
                                                    <input type="file" name="images[]" id="images" multiple="multiple">
                                                </div>
                                                @foreach($productImgs as $imgs)
                                                <div class="pull-left" id="{{$imgs->id}}">
                                                    <div class="imgDel">
                                                        <a href="#">
                                                    <i onclick="test({{$imgs->id}})" data-toggle="modal" data-backdrop="false" data-target="#info"  class="ft-minus-square"></i>
                                                </a>
                                                    </div>
                                                    <img width="50" src="{{ URL::to('/') }}/uploads/pro_images/{{$imgs->pro_image}}">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="address">Description</label>
                                        <div class="col-md-9">
                                            <textarea id="desc" rows="5" class="form-control" name="desc" placeholder="Provide Complete Description..">{{$productInfo->pro_detail}}
                                </textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-actions pull-right">
                                <button type="button" data-toggle="modal" data-backdrop="false" data-target="#info" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                              <i class="fa fa-check-square-o"></i> Update
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
<script src="{{ asset('app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
<script>
    $("#yes").click(function(){
        window.location.href = "/admin/products"
    });
    $( document ).ready(function() {
        check_class();
    });

    function test(id)
    {
        $("#yes").attr('onclick',"deletePhoto("+id+")")
    }
function deletePhoto(id)
{
    $.ajax({
        method: "POST",
        url: "{{route('admin.product.delete_photo')}}",
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
        $('#product_class').html('Class 1 Product');
        $("#class_id").val(1);
    }
    else if(price >= 1500 && price <= 3999)
    {
        $('#product_class').html('Class 2 Product');
        $("#class_id").val(2);
    }
    else if(price >= 4000 && price <= 7999)
    {
        $('#product_class').html('Class 3 Product');
        $("#class_id").val(3);
    }
    else if(price >= 8000 && price <= 15999)
    {
        $('#product_class').html('Class 4 Product');
        $("#class_id").val(4);
    }
    else
    {
        $('#product_class').html('Class 5 Product');
        $("#class_id").val(5);
    }
}

</script>
@endsection
