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
                <h4 class="card-title">Recomandatins Listing</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>Function</th>
                        <th>Company</th>
                        <th>Comments</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($userData as $i=>$user)
                      <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->function}}</td>
                        <td>
                                {{$user->company_name}}
                        </td>
                        <td>
                                {{$user->comments}}
                        </td>
                        <td>
                                {{date('d-m-Y H:i:s', strtotime($user->created_at))}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Full Name</th>
                        <th>email</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Registered at</th>
                        <th>Option</th>
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
