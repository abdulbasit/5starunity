@extends('admin.layouts.apps')

@section('content')
<div class="content-wrapper">
    <div class="content-body">
      <!-- Zero configuration table -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Transaction History </h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Lottery Name</th>
                        <th>Lot Number</th>
                        <th>Lot Amount</th>
                        <th>Status</th>
                        <th>Created at </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($lotterData as $i=>$lottery)
                      <tr>
                        <td>{{$lottery->lottery->name}} </td>
                        <td>{{$lottery->lot_number}}</td>
                        <td>{{$lottery->lottery->one_lot_amount}}</td>
                        <td>
                            @if($lottery->status=="0")
                               <span class="badge badge-primary"> Nill</span>
                            @else
                            <span class="badge badge-danger">
                                Winner
                            </span>
                            @endif
                        </td>
                        <td>
                            {{date('d-m-Y H:i:s', strtotime($lottery->created_at))}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Lottery Name</th>
                        <th>Lottery Number</th>
                        <th>Lot Amount</th>
                        <th>Status</th>
                        <th>Created at </th>
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

$("#usersT").DataTable();
</script>
@endsection
