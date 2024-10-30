 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Classroom</h4>
              <a href="{{ route('classroom') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Add Classroom
              </button></a>
              <p class="card-description">
                All Classrooms 
              </p><br>
              <div class="table-responsive">
                <table class="table table-striped data-table">
                  <thead>
                    <tr>
                      <th>
                        #ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Standard
                      </th>
                      <th>
                        Total Students
                      </th>
                      <th>
                        Status
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- main-panel ends -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          pageLength: 6,
          ajax: "{{ route('get-classroom') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'standard', name: 'standard'},
              {data: 'total_students', name: 'total_students'},
              {data: 'status', name: 'status'},
          ]
      });
          
    });
  </script>
@stop