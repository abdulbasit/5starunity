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
                    <p>Are you sure you want to delete this Page ?</p>
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
      <!-- Zero configuration table -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pages Listing</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Updated at</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($page as $pageInfo)
                        <tr>
                          <td>{{$pageInfo->id}}</td>
                          <td>{{$pageInfo->page_name}}</td>
                          <td>{{$pageInfo->page_slug}}</td>
                          <td>{{$pageInfo->page_title}}</td>
                          {{-- <td>{{$pageInfo->page_content}}</td> --}}
                          <td>{{$pageInfo->created_at}}</td>
                          <td>{{$pageInfo->updated_at}}</td>
                          <td>
                              <div class="col-sm-3 col-6">
                                  <div class="btn-group mr-1 mb-1">
                                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      Action
                                      </button>
                                      <div class="dropdown-menu arrow " id="options">
                                          @can('edit', new App\Models\Page)
                                            <a class="dropdown-item" href="{{ route('admin.page.edit',$pageInfo->id) }}"><i class="ft-edit green"></i> Edit </a>
                                          @endcan
                                          @can('delete', new App\Models\Page)
                                            <a data-id="{{$pageInfo->id}}" onclick="deleteFunction({{$pageInfo->id}})"  id="delete" data-toggle="modal" data-backdrop="false" data-target="#info" class="dropdown-item" href="#"><i class="ft-slash red"></i> Delete</a>
                                          @endcan
                                      </div>
                                  </div>
                              </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Updated at</th>
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
    function deleteFunction(id)
    {
        // var id = $(this).attr("data-id");
        $("#yes").attr("delete-id",id);
    }
    // $("#delete").click(function(){
    //     alert('dd');
    //     var id = $(this).attr("data-id");
    //     $("#yes").attr("delete-id",id);
    // });
    $("#yes").click(function(){
        var id = $(this).attr("delete-id");
        window.location.href = "page/delete/"+id;
    });
    $(document).ready( function () {
        $('#usersT').DataTable();
    });
</script>
@endsection
