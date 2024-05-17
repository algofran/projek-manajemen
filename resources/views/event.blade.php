<x-app-layout>
  <div class="row">
    <div class="col-sm-12">

      <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Events</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col"></div>
                <div class="col-auto text-end float-end ms-auto download-grp">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#my_event" href="#" class="btn btn-primary">Add Event <i class="fas fa-plus"></i></a>
              </div>
            </div>
        </div>
  
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="modal fade none-border" id="my_event">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Event</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                                <h5 class="form-title"><span>Event Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event ID <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Name <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Event Date <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                </div>
                            </div>
                           
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary submit-btn">Create event</button>
                        <button type="reset" class="btn btn-danger submit-btn" data-dismiss="modal">Reset</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>