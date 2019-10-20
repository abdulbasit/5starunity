@extends('admin.layouts.apps')

@section('content')

        <div class="content-wrapper">
          <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                        @endif
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-basic">Create New Admin</h4>
                      
                   
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal" action="/admin/save-admin" method="post">
                          <div class="form-body">
                                @csrf
                            <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">First Name</label>
                              <div class="col-md-9">
                                <input type="text" id="fname" class="form-control" placeholder="Complete Name"  name="fname">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Last Name</label>
                                <div class="col-md-9">
                                  <input type="text" id="lname" class="form-control" placeholder="Complete Name"  name="lname">
                                </div>
                              </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                              <div class="col-md-9">
                                <input type="text" id="email" class="form-control" placeholder="E-mail" name="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4">Password</label>
                              <div class="col-md-7">
                                <input type="password" id="password" class="form-control" placeholder="" name="password"> 
                              </div>
                              <div class="col-md-2"  style="paddin-top:5px">
                                <a onclick="generatePassword()">
                                    <i class="fa fa-cog"></i> Generate
                                </a>
                              </div>
                            </div>
                           </div>
                          <div class="form-actions pull-right">
                            <button type="button" class="btn btn-warning mr-1">
                              <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                              <i class="fa fa-check-square-o"></i> Save
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- // Basic form layout section end -->
          </div>
        </div>

@endsection
@section('script')
<script>
    function generatePassword() {
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        $("#password").attr('type','text');
        $("#password").val(retVal);
        copyToClipboard("#password");
        alert('Password coppied !')
    }
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();
        }
</script>
@endsection
