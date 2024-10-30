 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Students</h4>
              <a href="{{ route('student') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Add Student
              </button></a>
              <p class="card-description">
                All Students 
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
                        Classroom
                      </th>                      
                      <th>
                        Address
                      </th>
                      <th>
                        Contact
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
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
  <div class="modal" id="editStudentModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Student Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="#" class="form-sample" name="edit_student_form" id="edit_student_form" method="post">
              @csrf
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control input-border"/>
                    <input type="hidden" name="student_id" id="student_id" value="" class="form-control input-border"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Standard&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm-12 input-border" name="standard" id="standard"><option value="0">--Select--</option>

                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Classroom&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm-12 input-border" name="classroom" id="classroom" required>
                       <option selected disabled>--Select--</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Admission Date&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input name="admission_date" id="admission_date" type="text" placeholder="YYYY-MM-DD" class="form-control flatpickr-input active" readonly="readonly">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control input-border" placeholder="Write Address" name="address" id="address" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Contact No.&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="contact_no" id="contact_no" class="form-control input-border"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control input-border" name="email" id="email"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Status&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="student_status" id="studentRadios1" value="1">
                        Active
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="student_status" id="studentRadios2" value="0">
                        In-Active
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div id="global_alert" class="" style="display:none;"></div>
              <hr>
              <center>
                <button type="button" name="update_student" id="update_student" class="btn mb-2" style="background-color:#DA542F;color:#fff;"><i class="typcn typcn-refresh" style="font-size:20px;" area-hidden="true"></i>&nbsp;Update Student</button>
              </center>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="deleteStudentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Delete Student</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this student.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="delete_student_id" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="permanentDeleteStudentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Permanent Delete Student</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this student parmanently.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="permanent_delete_student_id" class="btn btn-success">Confirm</button>
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
          ajax: "{{ route('get-students') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},              
              {data: 'standard', name: 'standard'},              
              {data: 'classroom', name: 'classroom'},              
              {data: 'address', name: 'address'},
              {data: 'parental_contact', name: 'contact'},
              {data: 'parental_email', name: 'email'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
          
    });
  </script>
  <script type="text/javascript">

      function capitalizeFirstLetter(string){

        return string.charAt(0).toUpperCase() + string.slice(1);
      }

      function edit_student(e){

        var student_id = e.id;

        $('#student_id').attr('value',student_id);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('edit-student') }}",
          type:"post",
          data:{'student_id':student_id},
          success:function(res){

            $('#name').attr('placeholder',capitalizeFirstLetter(res[0][0].name));
            $('#admission_date').attr('placeholder',res[0][0].admission_date);
            $('#address').attr('placeholder',capitalizeFirstLetter(res[0][0].address));
            $('#contact_no').attr('placeholder',res[0][0].parental_contact);
            $('#email').attr('placeholder',res[0][0].parental_email);

            let standard_id      = res[0][0].standard;
            let classroom_id     = res[0][0].classroom;
            let select_standard  = '';
            let select_classroom = '';

            let standard_count  = res[1].length;
            let classroom_count = res[2].length;

            for(var i =0;i<standard_count;i++){

              if(res[1][i].id == standard_id){

                select_standard += '<option value="'+res[1][i].id+'"  selected>'+res[1][i].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }else{

                select_standard += '<option value="'+res[1][i].id+'">'+res[1][i].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }
            }

            for(var j =0;j<classroom_count;j++){

              if(res[2][j].id == classroom_id){

                select_classroom += '<option value="'+res[2][j].id+'"  selected>'+res[2][j].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }else{

                select_classroom += '<option value="'+res[2][j].id+'">'+res[2][j].name.replace(/(^\w|\s\w)/g, m => m.toUpperCase())+'</option>';
              }
            }

            
            $('#standard').html(select_standard);
            $('#classroom').html(select_classroom);

            if(res[0][0].status == '1'){

              $("#studentRadios1").prop("checked",true);
              $("#studentRadios2").prop("checked",false);

            }else if(res[0][0].status == '0'){

              $("#studentRadios1"). prop("checked",false);
              $("#studentRadios2"). prop("checked",true);

            } 

            $('#editStudentModal').modal('show');

          }
        });

      }

      function delete_student(e){

        var student_id = e.id;

        $('#delete_student_id').attr('value',student_id);

        $('#deleteStudentModal').modal('show');
      }

      function permanent_delete_student(e){

        var student_id = e.id;

        $('#permanent_delete_student_id').attr('value',student_id);

        $('#permanentDeleteStudentModal').modal('show');
      }


      $('#delete_student_id').click(function(){

        var student_id = $('#delete_student_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('delete-student') }}",
          type:"post",
          data:{'student_id':student_id},
          success:function(res){

            if(res == '1'){

              $('#deleteStudentModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Student details deleted successfully!');
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

      $('#permanent_delete_student_id').click(function(){

        var student_id = $('#permanent_delete_student_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('permanent-delete-student') }}",
          type:"post",
          data:{'student_id':student_id},
          success:function(res){

            if(res == '1'){

              $('#permanentDeleteStudentModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Student details deleted permanently!');
              $('#responseModal').modal('show');

              setTimeout(function(){
                
                $('#responseModal').modal('hide');
                
                window.location.href = '';
              },3000);

            }else if(res == '0'){

              $('#permanentDeleteStudentModal').modal('hide');
              
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

      $('#update_student').click(function(){

        $.ajax({
          url:"{{ route('update-student') }}",
          type:'post',
          data:$("#edit_student_form").serialize(),
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Student details updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                $('#editStudentModal').modal('hide');

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

      });
  </script>
@stop