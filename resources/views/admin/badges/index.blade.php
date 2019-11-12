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
                    <p>Are you sure you want to delete this Blog ?</p>
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
                <h4 class="card-title">Badges
                  <a href="badge/create" class="btn btn-social pull-right navBtn">
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
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($badge as $key=>$badgeData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$badgeData->name}}</td>
                            <td>
                              {{$badgeData->badge_type}}
                            </td>
                            <td>
                              <a href="/admin/badge/edit/{{$badgeData->id}}">Edit</a> | <a onclick="deleteBadge({{$badgeData->id}})" href="/admin/coopration/edit/{{$badgeData->id}}"  style="color:red">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Options</th>
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
function deleteBadge(id)
{
    alert(id)
    $("#yes").attr('delete-id',id);
    $('#info').modal('show');
}
$("#yes").click(function(){
    var id = $(this).attr('delete-id');
    window.location.href = "/admin/blog/delete/"+id;
})
$(document).ready( function () {
    $('#usersT').DataTable();
} );
</script>
@endsection
