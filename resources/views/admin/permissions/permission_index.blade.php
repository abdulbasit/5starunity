@extends('admin.layouts.apps')

@section('content')
<div class="content-wrapper">
    <div class="content-body">
      <!-- Zero configuration table -->
      <section id="configuration">
        <div class="row">
          
            
          <div class="col-12">
              @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Permissions</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                <form class="form form-horizontal" action="/admin/role/permissions/save" method="post">
                    <input type="hidden" name="role_id" value="{{$role_id}}">
                    @csrf
                  <table class="table table-striped table-bordered ">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Add</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                        <th>List</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permissionsData)
                            <tr>
                                <td>{{$permissionsData->id}}</td>
                                <td>{{$permissionsData->name}}</td>
                                <td>{{$permissionsData->class}}</td>
                                <td><input {{$permissionsData->add?"checked":""}} type="checkbox" name="add_{{$permissionsData->rol_permission_id}}" value="1"></td>
                                <td><input {{old('edit',$permissionsData->edit)=='1'? 'checked':''}} type="checkbox" name="edit_{{$permissionsData->rol_permission_id}}" value="1"></td>
                                <td><input {{old('delete',$permissionsData->delete)==1? 'checked':''}} type="checkbox" name="delete_{{$permissionsData->rol_permission_id}}" value="1"></td>
                                <td><input {{old('view',$permissionsData->view)==1? 'checked':''}} type="checkbox" name="view_{{$permissionsData->rol_permission_id}}" value="1"></td>
                                <td><input {{old('l',$permissionsData->list)==1? 'checked':''}} type="checkbox" name="list_{{$permissionsData->rol_permission_id}}" value="1"></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Add</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                        <th>List</th>
                      </tr>
                    </tfoot>
                  </table>
                    <div class="form-actions pull-right" style="margin-bottom:10px">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
                    <br />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     </div>
  </div>
@endsection

