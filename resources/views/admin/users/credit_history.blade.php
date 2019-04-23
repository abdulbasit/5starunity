@extends('admin.layouts.apps')

@section('content')
<div class="content-wrapper">

<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border-radius:0px">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">Transaction Log</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"   style="margin:0px; padding:0px">
                        <div class="col-xl-12"  style="margin:0px; padding:0px">
                            <div class="card" style="box-shadow:none; margin:0px">
                                <div class="card-content" id="logData">
                                    <br />
                                    <h2 class="text-center">Please Waite....</h2>
                                    <br />
                                </div>
                            </div>
                        </div>
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
                <h4 class="card-title">Purchase History</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <div class="pull-right">
                        <label><b>Filter History</b> </label>
                        <select name="historyType" id="historyType" class="form-control" style="margin-bottom:10px">
                            <option value="all" {{old('type',$type)=="all"? 'selected':''}}>All</option>
                            <option value="credit" {{old('type',$type)=="credit"? 'selected':''}}>Credit History</option>
                            <option value="lottery" {{old('type',$type)=="lottery"? 'selected':''}}>Transaction History </option>
                        </select>
                    </div>
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Transaction Type</th>
                        <th>Balance</th>
                        <th>Previous Balance</th>
                        <th>Available Balance</th>
                        <th>Status</th>
                        <th>Purchased at</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($creditHistoryData as $i=>$credit)
                      <tr>
                        <td>
                            @if($credit->credit=="0")
                                <span class="badge badge-warning">
                                    Lottery Purchased
                                </span>
                            @else
                                <span class="badge badge-primary">
                                    Credit Purchased
                                </span>
                            @endif
                        </td>
                        <td>{{$credit->balance}}</td>
                        <td>{{$credit->pre_balance}}</td>
                        <td>{{$credit->total_available_balance}}</td>
                        <td>
                            {{$credit->status}}
                        </td>
                        <td>
                            {{Carbon\Carbon::parse($credit->created_at)->toFormattedDateString()}}
                        </td>
                        <td>
                                @if($credit->credit!="0")
                                    <a style="cursor:pointer" onclick="getTransLog({{$credit->id}})" href="#" data-toggle="modal" data-target="#default" >Details</a>
                                @else
                                    <a href="{{route("admin.user.trans.history",$credit->id)}}">Details</a>
                                @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Transaction Type</th>
                        <th>Balance</th>
                        <th>Previous Balance</th>
                        <th>Available Balance</th>
                        <th>Status</th>
                        <th>Purchased at</th>
                        <th>Details</th>
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
$("#historyType").change(function(){
    var filterType = $(this).children("option:selected").val();
    var usreId = {{$user_id}}
    window.location="/admin/user/credit/filter/history/"+usreId+"/"+filterType;
});
function getTransLog(id)
{

    $("#logData").html('<br /><h2 class="text-center">Please Waite....</h2><br />');
    $.ajax({
        method: "POST",
        url: "/admin/user/trans/log/"+id,
        data: { "_token": "{{ csrf_token() }}",id: id }
    })
    .done(function( msg ) {
        $("#logData").html(msg);
    });
}
$("#usersT").DataTable();
</script>
@endsection
