 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Teachers</h4>
              <a href="{{ route('teacher') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Add Teacher
              </button></a>
              <p class="card-description">
                All Teachers 
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
                        Salary
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
  <div class="modal" id="editTeacherModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Teacher Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="#" class="form-sample" name="edit_teacher_form" id="edit_teacher_form" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" id="name" placeholder=""  class="form-control input-border"/>
                      <input type="hidden" name="teacher_id" id="teacher_id" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Salary&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="salary" id="salary" class="form-control input-border"/>
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
                        <input type="radio" class="form-check-input" name="teacher_status" id="teacherRadios1" value="1">
                        Active
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="teacher_status" id="teacherRadios2" value="0">
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
                <button type="button" name="update_teacher" id="update_teacher" class="btn mb-2" style="background-color:#DA542F;color:#fff;"><i class="typcn typcn-refresh" style="font-size:20px;" area-hidden="true"></i>&nbsp;Update Teacher</button>
              </center>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="deleteTeacherModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Delete Teacher</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this teacher.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="delete_teacher_id" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="permanentDeleteTeacherModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Permanent Delete Subject</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this teacher parmanently.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="permanent_delete_teacher_id" class="btn btn-success">Confirm</button>
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
          ajax: "{{ route('get-teachers') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'salary', name: 'salary'},
              {data: 'address', name: 'address'},
              {data: 'contact', name: 'contact'},
              {data: 'email', name: 'email'},
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

      function edit_teacher(e){

        var teacher_id = e.id;

        $('#teacher_id').attr('value',teacher_id);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('edit-teacher') }}",
          type:"post",
          data:{'teacher_id':teacher_id},
          success:function(res){

            $('#name').attr('placeholder',capitalizeFirstLetter(res[0][0].name));
            $('#salary').attr('placeholder',res[0][0].salary);
            $('#address').attr('placeholder',capitalizeFirstLetter(res[0][0].address));
            $('#contact_no').attr('placeholder',res[0][0].contact);
            $('#email').attr('placeholder',res[0][0].email);

            if(res[0][0].status == '1'){

              $("#teacherRadios1").prop("checked",true);
              $("#teacherRadios2").prop("checked",false);

            }else if(res[0][0].status == '0'){

              $("#teacherRadios1"). prop("checked",false);
              $("#teacherRadios2"). prop("checked",true);

            } 

            $('#editTeacherModal').modal('show');

          }
        });

      }

      function delete_teacher(e){

        var teacher_id = e.id;

        $('#delete_teacher_id').attr('value',teacher_id);

        $('#deleteTeacherModal').modal('show');
      }

      function permanent_delete_teacher(e){

        var teacher_id = e.id;

        $('#permanent_delete_teacher_id').attr('value',teacher_id);

        $('#permanentDeleteTeacherModal').modal('show');
      }


      $('#delete_teacher_id').click(function(){

        var teacher_id = $('#delete_teacher_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('delete-teacher') }}",
          type:"post",
          data:{'teacher_id':teacher_id},
          success:function(res){

            if(res == '1'){

              $('#deleteTeacherModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Teacher details deleted successfully!');
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

      $('#permanent_delete_teacher_id').click(function(){

        var teacher_id = $('#permanent_delete_teacher_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('permanent-delete-teacher') }}",
          type:"post",
          data:{'teacher_id':teacher_id},
          success:function(res){

            if(res == '1'){

              $('#permanentDeleteTeacherModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Teacher details deleted permanently!');
              $('#responseModal').modal('show');

              setTimeout(function(){
                
                $('#responseModal').modal('hide');
                
                window.location.href = '';
              },3000);

            }else if(res == '0'){

              $('#permanentDeleteSubjectModal').modal('hide');
              
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

      $('#update_teacher').click(function(){

        $.ajax({
          url:"{{ route('update-teacher') }}",
          type:'post',
          data:$("#edit_teacher_form").serialize(),
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Teacher details updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                $('#editTeacherModal').modal('hide');

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
  </script>
@stop