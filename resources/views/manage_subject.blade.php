 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Subjects</h4>
              <a href="{{ route('subject') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Add Subject
              </button></a>
              <p class="card-description">
                All Subjects 
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
  <div class="modal" id="editSubjectModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Subject Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="#" class="form-sample" name="edit_subject_form" id="edit_subject_form" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" id="name" placeholder=""  class="form-control input-border"/>
                      <input type="hidden" name="subject_id" id="subject_id" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="subject_status" id="subjectRadios1" value="1">
                          In-Stock
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="subject_status" id="subjectRadios2" value="0">
                          Out-Of-Stock
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="global_alert" class="" style="display:none;"></div>
              <hr>
              <center>
                <button type="button" name="update_subject" id="update_subject" class="btn mb-2" style="background-color:#DA542F;color:#fff;"><i class="typcn typcn-refresh" style="font-size:20px;" area-hidden="true"></i>&nbsp;Update Subject</button>
              </center>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="deleteSubjectModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Delete Subject</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this subject.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="delete_subject_id" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="permanentDeleteSubjectModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Permanent Delete Subject</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this subject parmanently.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="permanent_delete_subject_id" class="btn btn-success">Confirm</button>
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
          ajax: "{{ route('get-subjects') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
          
    });
  </script>
  <script type="text/javascript">

      function edit_subject(e){

        var subject_id = e.id;

        $('#subject_id').attr('value',subject_id);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('edit-subject') }}",
          type:"post",
          data:{'subject_id':subject_id},
          success:function(res){

            $('#name').attr('placeholder',res[0][0].name);

            if(res[0][0].status == '1'){

              $("#subjectRadios1"). prop("checked",true);
              $("#subjectRadios2"). prop("checked",false);

            }else if(res[0][0].status == '0'){

              $("#subjectRadios1"). prop("checked",false);
              $("#subjectRadios2"). prop("checked",true);

            } 
          

            $('#editSubjectModal').modal('show');

          }
        });

      }

      function delete_subject(e){

        var subject_id = e.id;

        $('#delete_subject_id').attr('value',subject_id);

        $('#deleteSubjectModal').modal('show');
      }

      function permanent_delete_subject(e){

        var subject_id = e.id;

        $('#permanent_delete_subject_id').attr('value',subject_id);

        $('#permanentDeleteSubjectModal').modal('show');
      }


      $('#delete_subject_id').click(function(){

        var subject_id = $('#delete_subject_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('delete-subject') }}",
          type:"post",
          data:{'subject_id':subject_id},
          success:function(res){

            if(res == '1'){

              $('#deleteSubjectModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Subject deleted successfully!');
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

      $('#permanent_delete_subject_id').click(function(){

        var subject_id = $('#permanent_delete_subject_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('permanent-delete-subject') }}",
          type:"post",
          data:{'subject_id':subject_id},
          success:function(res){

            if(res == '1'){

              $('#permanentDeleteSubjectModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Subject deleted permanently!');
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

      $('#update_subject').click(function(){

        var id     = $('#subject_id').attr('value');
        var name   = $('#name').val();
        var status = $("input[name='subject_status']:checked").val();

        $.ajax({
          url:"{{ route('update-subject') }}",
          type:'post',
          data:{'id':id,'name':name,'status':status},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Subject updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                $('#editSubjectModal').modal('hide');

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