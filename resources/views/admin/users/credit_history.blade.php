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
                <h4 class="card-title">Purchase History</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Balance</th>
                        <th>Previous Balance</th>
                        <th>Available Balance</th>
                        <th>Status</th>
                        <th>Purchased at</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($creditHistoryData as $i=>$credit)
                      <tr>
                        <td>{{$credit->credit}}</td>
                        <td>{{$credit->pre_balance}}</td>
                        <td>{{$credit->total_available_balance}}</td>
                        <td>
                            {{$credit->status}}
                        </td>
                        <td>
                            {{Carbon\Carbon::parse($credit->created_at)->toFormattedDateString()}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Balance</th>
                        <th>Previous Balance</th>
                        <th>Available Balance</th>
                        <th>Status</th>
                        <th>Purchased at</th>
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
