@extends('admin.layouts.apps')

@section('content')
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <form class="form form-horizontal" method="post" action="" id="cancel_form">
            <input type="hidden" id="dId" value="">
            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-danger white">
                        <h4 class="modal-title" id="myModalLabel11">Enter Cancel Notes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea name="notes" id="notes" class="form-control" placeholder="Please enter cancel notes....."></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="green" id="notes_msg"></div>
                        <button type="button" class="btn grey btn-danger" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-success" id="yes">Yes</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="content-wrapper">
    <div class="content-body">
      <!-- Zero configuration table -->
      <section id="configuration" >
        <div class="row" >
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">User Documents</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard" style="overflow:auto">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Residence Proof</th>
                        <th>Identity Proof </th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Submited Date</th>
                        <th>Update Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($userDocuments as $documents)
                      <tr>
                        <td>
                            @if($documents->type=='res')
                                Resident Proof
                            @else
                                Identity Proof
                            @endif
                        </td>
                        <td>
                            @if(pathinfo(URL::to('/uploads/users/documents_proofs/'.$documents->res_proof), PATHINFO_EXTENSION)=="xlsx")
                                <i class="fa fa-file-excel-o"></i>
                            @elseif(pathinfo(URL::to('/uploads/users/documents_proofs/'.$documents->res_proof), PATHINFO_EXTENSION)=="docx")
                                <i class="fa fa-file-word-o"></i>
                            @elseif(pathinfo(URL::to('/uploads/users/documents_proofs/'.$documents->res_proof), PATHINFO_EXTENSION)=="pdf")
                                <i class="fa fa-file-pdf-o"></i>
                            @else
                                <i class="fa fa-file-image-o"></i>
                            @endif
                            <a href="{{route('admin.user.documents.download',[$documents->id,'res'])}}">
                                Downoad Document
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.user.documents.download',[$documents->id,'idproof'])}}">
                                Identity Documents
                            </a>
                            {{-- {{$documents->id_front}} --}}

                        </td>
                        <td>
                            @if($documents->status=='1')
                                <span  id="badge_{{$documents->id}}" class="badge badge-danger">Not Approved</span>
                            @else
                                <span id="cancel_badge_{{$documents->id}}" class="badge badge-primary">Approved</span>
                            @endif
                        </td>
                        <td>
                            {{$documents->notes}}
                        </td>
                        <td>
                            {{date('d-m-Y H:i:s', strtotime($documents->created_at))}}
                        </td>
                        <td>
                            <div class="col-sm-3 col-6">
                                <div class="btn-group mr-1 mb-1">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Action
                                    </button>
                                    <div class="dropdown-menu arrow " id="options">
                                        <a class="dropdown-item"  href="{{ route('admin.user.documents.approve',$documents->id) }}"><i class="fa fa-check"></i> Approve</a>
                                        <a class="dropdown-item"  onclick="cancel({{$documents->id}})" class="red" href="#"><i class="fa fa-times"></i>  Cancel</a>
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
                        <th>Residence Proof</th>
                        <th>Identity Proof </th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Submited Date</th>
                        <th>Update Status</th>
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
    $("#yes").click(function (){
       
        $("#notes").attr('readonly');
        var id = $("#dId").val();
        var notes = $("#notes").val();
        
        var formAction = $("#cancel_form").attr('action');
        $("notes").attr("disabled","disabled");
        $.ajax({
            method: "POST",
            url: formAction,
            data: { "_token": "{{ csrf_token() }}", notes:notes }
        }).done(function( msg ) {
            $("notes").removeAttr("disabled")
            $("#notes_msg").html("Canceld! ");
            $('#info').modal('hide');
            setTimeout(function(){
                location.reload();
            },1000);
        });
    });
    function cancel(id)
    {
        $("#dId").val(id);
        $("#cancel_form").attr('action','/admin/user/documents/cancel/'+id)
        $('#info').modal('show');
    }
$("#usersT").DataTable();

</script>
@endsection
