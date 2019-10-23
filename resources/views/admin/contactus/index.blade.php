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
                <h4 class="card-title">Contact Us
                </h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>betreff</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($contactus_quries as $querieData)
                        <tr>
                            <td>{{$querieData->name}}</td>
                            <td>{{$querieData->email}}</td>
                            <td>{{$querieData->phone}}</td>
                            <td>{{$querieData->betreff}}</td>
                            <td>{{$querieData->msg}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>betreff</th>
                        <th>Message</th>
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
$(document).ready( function () {
    $('#usersT').DataTable();
} );
</script>
@endsection
