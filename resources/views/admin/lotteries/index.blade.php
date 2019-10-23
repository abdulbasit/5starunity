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
                    <p>Are you sure you want to delete this Lottery ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-danger" data-dismiss="modal">No</button>
                    <button delete-id="" type="button" class="btn btn-success" id="yes">Yes</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="content-body">
      <!-- Zero configuration table -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Lotteries Listing
                <a href="lottery/create" class="btn btn-social pull-right navBtn">
                    <span class="ft-plus"></span>
                    <span class="pl-1 pr-1">Create</span>
                </a>
                </h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Product Name</th>
                        <th>Lot Amount</th>
                        <th>Total Lots</th>
                        <th>One Lot Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($lotteries as $lotData)
                        <tr>
                            <td>
                                <a href="lottery/detail/{{$lotData->id}}">
                                    {{$lotData->name}}
                                </a>
                            </td>
                            <td>
                               {{@$lotData->product->pro_name}}
                            </td>
                            <td>{{$lotData->lot_amount}}</td>
                            <td>{{$lotData->total_lots}}</td>
                            <td>{{$lotData->one_lot_amount}}</td>
                            <td>
                                <div class="col-sm-3 col-6">
                                    <div class="btn-group mr-1 mb-1">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu arrow " id="options">
                                            <a class="dropdown-item" href="{{ route('admin.lottery.edit',$lotData->id) }}"><i class="ft-edit green"></i> Edit </a>
                                            <a data-id="{{$lotData->id}}" id="delete" data-toggle="modal" data-backdrop="false" data-target="#info" class="dropdown-item" href="#"><i class="ft-slash red"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Product Name</th>
                        <th>Lot Amount</th>
                        <th>Total Lots</th>
                        <th>One Lot Amount</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     </div>
  </div>
@endsection
@section('script')
<script>
$("#delete").click(function(){
    var id = $(this).attr('data-id');
    $("#yes").attr('delete-id',id);
});
$("#yes").click(function(){
    var id = $(this).attr('delete-id');
    window.location.href = "lottery/delete/"+id;
});
$(document).ready( function () {
    $('#usersT').DataTable();
} );
</script>
@endsection
