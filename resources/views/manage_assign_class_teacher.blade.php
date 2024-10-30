 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Assigned Class-Teacher</h4>
              <a href="{{ route('show-assign-class-teacher') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Assign Class-Teacher
              </button></a>
              <p class="card-description">
                All Assigned Class-Teacher 
              </p><br>
              <div class="table-responsive">
                <table class="table table-striped data-table">
                  <thead>
                    <tr>
                      <th>
                        #ID
                      </th>
                      <th>
                        Standard
                      </th>
                      <th>
                        Classroom
                      </th>
                      <th>
                        Total Students
                      </th>
                      <th>
                        Class-Teacher
                      </th>
                        Status
                      </th>
                      <th>
                        Actions
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
  <!-- The Modal -->
  <div class="modal" id="editAssignTeacherModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Assign Class-Teacher Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="#" class="form-sample" name="edit_assign_class_teacher_form" id="edit_assign_class_teacher_form" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Standard&nbsp;:</label>
                    <div class="col-sm-9">
                      <select id="standard" name="standard" class="form-control form-select col-sm-12 input-border" disabled>
                          <option value="0" selected disabled>--Select--</option>
                      </select>
                      <input type="hidden" name="classroom_id" id="classroom_id" value=""/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Classroom&nbsp;:</label>
                    <div class="col-sm-9">
                      <select id="classroom" name="classroom" toggle="dropdown" class="form-control form-select col-sm-12 input-border" disabled>
                        <option value="0" selected disabled>--Select--</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Teacher&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                    <div class="col-sm-9">
                      <select id="teacher" name="teacher" class="form-control form-select col-sm-12 input-border" required>
                        <option value="0" selected disabled>--Select--</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div id="global_alert" class="" style="display:none;"></div>
              <hr>
              <center>
                <button type="button" name="update_assign_class_teacher" id="update_assign_class_teacher" class="btn mb-2" style="background-color:#DA542F;color:#fff;"><i class="typcn typcn-refresh" style="font-size:20px;" area-hidden="true"></i>&nbsp;Update Teacher</button>
              </center>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="deleteAssignClassTeacherModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Delete Assigned Class-Teacher</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete assigned class-teacher.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="delete_teacher_assignment_id" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="responseModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Message</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="res_text"></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          pageLength: 6,
          ajax: "{{ route('get-assign-class-teachers') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'standard', name: 'standard'},
              {data: 'classroom', name: 'classroom'},
              {data: 'total_students', name: 'total_students'},
              {data: 'class_teacher', name: 'class_teacher'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
          
    });
  </script>
  <script type="text/javascript">

      function capitalizeFirstLetter(string){

        return string.charAt(0).toUpperCase() + string.slice(1);
      }

      function edit_assign_class_teacher(e){

        var classroom_id = e.id;

        $('#classroom_id').attr('value',classroom_id);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('edit-assign-class-teacher') }}",
          type:"post",
          data:{'classroom_id':classroom_id},
          success:function(res){

            let standard_id  = res[0][0].standard;
            let classroom_id = res[0][0].id;
            let teacher_id   = res[0][0].class_teacher;

            let select_standard  = '';
            let select_classroom = '';
            let select_teacher   = '';

            let standard_count  = res[1].length;
            let classroom_count = res[2].length;
            let teacher_count   = res[3].length;

            for(var i =0;i<standard_count;i++){

              if(res[1][i].id == standard_id){

                select_standard += '<option value="'+res[1][i].id+'"  selected>'+res[1][i].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }
            }

            for(var j =0;j<classroom_count;j++){

              if(res[2][j].id == classroom_id){

                select_classroom += '<option value="'+res[2][j].id+'"  selected>'+res[2][j].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }
            }

            for(var k =0;k<teacher_count;k++){

              if(res[3][k].id == teacher_id){

                select_teacher += '<option value="'+res[3][k].id+'"  selected>'+res[3][k].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }else{

                select_teacher += '<option value="'+res[3][k].id+'">'+res[3][k].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }
            }

            $('#standard').html(select_standard);
            $('#classroom').html(select_classroom);
            $('#teacher').html(select_teacher);

            $('#editAssignTeacherModal').modal('show');
          }
        });

      }

      function delete_assigned_teacher(e){

        var teacher_id = e.id;

        $('#delete_teacher_assignment_id').attr('value',teacher_id);

        $('#deleteAssignClassTeacherModal').modal('show');
      }

      $('#delete_teacher_assignment_id').click(function(){

        var classroom_id = $('#delete_teacher_assignment_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('delete-assign-class-teacher') }}",
          type:"post",
          data:{'classroom_id':classroom_id},
          success:function(res){

            if(res == '1'){

              $('#deleteAssignClassTeacherModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Teacher assignment details deleted successfully!');
              $('#responseModal').modal('show');

              setTimeout(function(){
                
                $('#responseModal').modal('hide');
               
                window.location.href = '';
              },3000);

            }else if(res == '0'){

              $('#res_text').text('');
              $('#res_text').text('Error Occured! Please try again');
              $('#responseModal').modal('show');

              setTimeout(function(){
                
                $('#responseModal').modal('hide');
              
              },3000);
            }
        
          }
        });

      });

      $('#update_assign_class_teacher').click(function(){

        var standard  = $('#standard').val();
        var classroom = $('#standard').val();
        var teacher   = $('#teacher').val();

        $.ajax({
          url:"{{ route('update-assign-class-teacher') }}",
          type:'post',
          data:{'standard':standard,'classroom':classroom,'teacher':teacher},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Teacher assignment details updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                $('#editAssignTeacherModal').modal('hide');

                window.location.href = '';
              },3000);

            }else if(res == '0'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-danger');
              $('#global_alert').text('Error Occured! Please try again');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
              },3000);
            }
          }
        });
      });

      $('#standard').change(function(){

      var standard_id = $('#standard').val();

      $.ajax({
        url:"{{ route('get-classroom-id') }}",
        type:'post',
        data:{'standard_id':standard_id},
        success:function(res){

          let select_classroom = '';

          let cls_count = res[0].length;

          for(var i =0;i<cls_count;i++){

                  select_classroom += '<option value="'+res[0][i].id+'">'+res[0][i].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
          }
          
        
          $('#classroom').html('');
          $('#classroom').html(select_classroom);

        }
      })
    })
  </script>
@stop