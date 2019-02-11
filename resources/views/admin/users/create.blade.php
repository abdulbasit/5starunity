@extends('admin.layouts.apps')

@section('content')

        <div class="content-wrapper">
          <div class="content-header row">
            {{-- <div class="content-header-left col-md-6 col-12 mb-2">
              <h3 class="content-header-title mb-0">Horizontal Forms</h3>
              <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Horizontal Forms</a>
                    </li>
                  </ol>
                </div>
              </div>
            </div> --}}
            {{-- <div class="content-header-right col-md-6 col-12">
              <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                  <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1"
                  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a>
                    <a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a>
                  </div>
                </div>
                <a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="ft-mail"></i></a>
                <a class="btn btn-outline-primary" href="timeline-center.html"><i class="ft-pie-chart"></i></a>
              </div>
            </div> --}}
          </div>
          <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-basic">Create New User</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <form class="form form-horizontal">
                          <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput1">Complete Name</label>
                              <div class="col-md-9">
                                <input type="text" id="name" class="form-control" placeholder="Complete Name"  name="name">
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
                              <div class="col-md-9">
                                <input type="password" id="password" class="form-control" placeholder="" name="password">
                              </div>
                            </div>
                            <h4 class="form-section"><i class="ft-clipboard"></i> Profile</h4>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput6">Country</label>
                              <div class="col-md-9">
                                <select id="country" name="country" class="form-control">
                                  <option value="none" selected="" disabled="">Interested in</option>
                                  <option value="design">design</option>
                                  <option value="development">development</option>
                                  <option value="illustration">illustration</option>
                                  <option value="branding">branding</option>
                                  <option value="video">video</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">State</label>
                                <div class="col-md-9">
                                    <select id="state" name="state" class="form-control">
                                        <option value="none" selected="" disabled="">Interested in</option>
                                        <option value="design">design</option>
                                        <option value="development">development</option>
                                        <option value="illustration">illustration</option>
                                        <option value="branding">branding</option>
                                        <option value="video">video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="city">City</label>
                                <div class="col-md-9">
                                        <input type="text" id="city" class="form-control" placeholder="" name="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3 label-control" for="postal">Postal Code</label>
                                    <div class="col-md-9">
                                        <input type="text" id="postal" class="form-control" placeholder="" name="postal">
                                    </div>
                                </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control">Select Image</label>
                              <div class="col-md-9">
                                <label id="projectinput8" class="file center-block">
                                  <input type="file" id="file">
                                  <span class="file-custom"></span>
                                </label>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="address">Complete Address</label>
                              <div class="col-md-9">
                                <textarea id="address" rows="5" class="form-control" name="address" placeholder="Provide Complete Address.."></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions">
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
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-colored-controls">User Profile</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <div class="card-text">
                          <p>This is 2-columns horizontal form with labels on left and form
                            controls on right in one line. Add <code>.form-horizontal</code>                        class to the form tag to have horizontal form styling. User
                            can also change the border color and background color of
                            the form control. Add <code>border-*</code> class to change
                            border color and <code>bg-*</code> class to change background
                            color of the form control.</p>
                        </div>
                        <form class="form form-horizontal">
                          <div class="form-body">
                            <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1">Fist Name</label>
                                  <div class="col-md-9">
                                    <input type="text" id="userinput1" class="form-control border-primary" placeholder="First Name"
                                    name="firstname">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput2">Last Name</label>
                                  <div class="col-md-9">
                                    <input type="text" id="userinput2" class="form-control border-primary" placeholder="Last Name"
                                    name="lastname">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput3">Username</label>
                                  <div class="col-md-9">
                                    <input type="text" id="userinput3" class="form-control border-primary" placeholder="Username"
                                    name="username">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput4">Nick Name</label>
                                  <div class="col-md-9">
                                    <input type="text" id="userinput4" class="form-control border-primary" placeholder="Nick Name"
                                    name="nickname">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput5">Email</label>
                                  <div class="col-md-9">
                                    <input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput6">Website</label>
                                  <div class="col-md-9">
                                    <input class="form-control border-primary" type="url" placeholder="http://" id="userinput6">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control">Contact Number</label>
                                  <div class="col-md-9">
                                    <input class="form-control border-primary" type="tel" placeholder="Contact Number"
                                    id="userinput7">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput8">Bio</label>
                                  <div class="col-md-9">
                                    <textarea id="userinput8" rows="6" class="form-control border-primary" name="bio"
                                    placeholder="Bio"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions right">
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
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-icons">Timesheet</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <div class="card-text">
                          <p>Add <code>.form-horizontal</code> class to the form tag to
                            have horizontal form styling. This horizontal form shows
                            the use of icons with form controls. Define the position
                            of the icon using <code>has-icon-left</code> or <code>has-icon-right</code>                        class. Use <code>icon-*</code> class to define the icon for
                            the form control. See Icons sections for the list of icons
                            you can use. </p>
                        </div>
                        <form class="form form-horizontal">
                          <div class="form-body">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput1">Employee Name</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <input type="text" id="timesheetinput1" class="form-control" placeholder="employee name"
                                  name="employeename">
                                  <div class="form-control-position">
                                    <i class="ft-user"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput2">Project Name</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <input type="text" id="timesheetinput2" class="form-control" placeholder="project name"
                                  name="projectname">
                                  <div class="form-control-position">
                                    <i class="fa fa-briefcase"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput3">Date</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <input type="date" id="timesheetinput3" class="form-control" name="date">
                                  <div class="form-control-position">
                                    <i class="ft-message-square"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control">Rate Per Hour</label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Rate Per Hour" aria-label="Amount (to the nearest dollar)"
                                  name="rateperhour">
                                  <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput5">Start Time</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <input type="time" id="timesheetinput5" class="form-control" name="starttime">
                                  <div class="form-control-position">
                                    <i class="ft-clock"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput6">End Time</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <input type="time" id="timesheetinput6" class="form-control" name="endtime">
                                  <div class="form-control-position">
                                    <i class="ft-clock"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="timesheetinput7">Notes</label>
                              <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                  <textarea id="timesheetinput7" rows="5" class="form-control" name="notes" placeholder="notes"></textarea>
                                  <div class="form-control-position">
                                    <i class="ft-file"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions right">
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
              <div class="row justify-content-md-center">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-card-center">Event Registration</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                        <div class="card-text">
                          <p>Add <code>.form-horizontal</code> class to the form tag to
                            have horizontal form styling. This is horizontal form demo
                            with centered card. Here we have used <code>col-md-6 ml-auto</code>                        classes to center the card as its not full width. User can
                            always change those classes according to width and offset
                            requirements.
                          </p>
                        </div>
                        <form class="form form-horizontal">
                          <div class="form-body">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput1">Full Name</label>
                              <div class="col-md-9">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="name" name="fullname">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput2">Title</label>
                              <div class="col-md-9">
                                <input type="text" id="eventRegInput2" class="form-control" placeholder="title" name="title">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput3">Company</label>
                              <div class="col-md-9">
                                <input type="text" id="eventRegInput3" class="form-control" placeholder="company"
                                name="company">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput4">Email</label>
                              <div class="col-md-9">
                                <input type="email" id="eventRegInput4" class="form-control" placeholder="email"
                                name="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput5">Contact Number</label>
                              <div class="col-md-9">
                                <input type="tel" id="eventRegInput5" class="form-control" name="contact" placeholder="contact number">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control">Existing Customer</label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <div class="d-inline-block custom-control custom-radio mr-1">
                                    <input type="radio" name="customer1" class="custom-control-input" checked id="yes">
                                    <label class="custom-control-label" for="yes">Yes</label>
                                  </div>
                                  <div class="d-inline-block custom-control custom-radio">
                                    <input type="radio" name="customer1" class="custom-control-input" id="no">
                                    <label class="custom-control-label" for="no">No</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions center">
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
