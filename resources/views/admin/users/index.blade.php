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
                <h4 class="card-title">User Listing</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered zero-configuration" id="usersT">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>email</th>
                        <th>Date of birth</th>
                        <th>Status</th>
                        <th>Registered at</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($userData as $i=>$user)
                      <tr>
                        <td>{{$user->name}} {{$user->middle_name}} {{$user->last_name}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{date('d-m-Y ', strtotime($userData[$i]->userProfile->dob))}}</td>
                        <td>
                            @if($user->status=="0" && $user->verification=="")
                               <span class="badge badge-primary"> Active</span>
                            @elseif($user->status=="1")
                            <span class="badge badge-warning ml-1">
                                Verificitaion Pending
                            </span>
                            @elseif($user->verification!="")
                            <span class="badge badge-warning ml-1">
                                Email Verificitaion Pending
                            </span>
                            @else
                            <span class="badge badge-danger">
                                Disabled
                            </span>
                            @endif
                        </td>
                        <td>
                                {{date('d-m-Y H:i:s', strtotime($user->created_at))}}
                        </td>
                        <td>
                            <div class="col-sm-3 col-6">
                                <div class="btn-group mr-1 mb-1">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                    </button>
                                    <div class="dropdown-menu arrow " id="options">
                                        @if($user->status=="1" || $user->status=="2")
                                            <a class="dropdown-item" href="/admin/user/status/{{$user->id}}/0"><i class="fa fa-check"></i> Acitivate </a>
                                        @else
                                            <a class="dropdown-item" href="/admin/user/status/{{$user->id}}/2"><i class="ft-slash red"></i> Block </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('admin.user.documents',$user->id) }}"><i class="ft-file-text green"></i> Documents  </a>
                                    </div>
                                </div>
                            </div>
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
