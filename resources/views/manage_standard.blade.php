 @extends('layouts.app')
@section('content')
 <!-- partial -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Standard</h4>
              <a href="{{ route('standard') }}"><button type="button" class="btn btn-sm btn-success mr-2 float-right">
                <i class="fa fa-plus-square" style="font-size:12px;" area-hidden="true"></i>&nbsp;Add Standard
              </button></a>
              <p class="card-description">
                All Standards 
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
                        Fees
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
  <div class="modal" id="editStandardModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Standard Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="#" class="form-sample" name="edit_standard_form" id="edit_standard_form" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name :</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" id="name" placeholder=""  class="form-control input-border"/>
                      <input type="hidden" name="standard_id" id="standard_id" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fees (Yearly) :</label>
                    <div class="col-sm-9">
                      <input type="text" name="fees" id="fees" placeholder="" class="form-control input-border"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">  
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Subjects:</label>
                    <div class="col-sm-9">
                      <select id="subjects" multiple name="native-select" placeholder="--Select Subject--" data-search="false" data-silent-initial-value-set="true">
                        @foreach($subjects as $subject)
                          <option value="{{ $subject->id }}">{{ ucwords($subject->name) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status :</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="standard_status" id="standardRadios1" value="1">
                          In-Stock
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="standard_status" id="standardRadios2" value="0">
                          Out-Of-Stock
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Subjects:</label>
                    <div class="col-sm-9">
                      <div class="col-sm-4" id="subjects_list">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="global_alert" class="" style="display:none;"></div>
              <hr>
              <center>
                <button type="button" name="update_standard" id="update_standard" class="btn mb-2" style="background-color:#DA542F;color:#fff;"><i class="typcn typcn-refresh" style="font-size:20px;" area-hidden="true"></i>&nbsp;Update Standard</button>
              </center>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="deleteStandardModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Delete Standard</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this standard.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="delete_standard_id" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="permanentDeleteStandardModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="typcn typcn-trash" style="font-size:20px;" area-hidden="true"></i>&nbsp;Permanent Delete Standard</button>
              </center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure? Yes delete this standard parmanently.</p>
        </div>
        <div class="modal-footer">
          <button type="button" name="" id="permanent_delete_standard_id" class="btn btn-success">Confirm</button>
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
  <script src="{{ asset('js/virtual-select.min.js') }}"></script>
  <script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          pageLength: 6,
          ajax: "{{ route('get-standards') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'fees', name: 'fees'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
          
    });
  </script>
  <script type="text/javascript">

      function edit_standard(e){

        var standard_id = e.id;

        $('#standard_id').attr('value',standard_id);

        VirtualSelect.init({ 
          ele: '#subjects' 
        });


        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('edit-standard') }}",
          type:"post",
          data:{'standard_id':standard_id},
          success:function(res){

            $('#name').attr('placeholder',res[0][0].name);
            $('#fees').attr('placeholder',res[0][0].fees);

            var subjects  = JSON.parse(res[0][0].subjects);
            var sub_count = subjects.length;
            var native_select = '';

            for(var i=0;i<sub_count;i++){

              native_select += subjects[i]+',';

            }

            $.ajax({
              url:"{{ route('get-standard-id') }}",
              type:'post',
              data:{'subjects':native_select},
              success:function(res){

                 var sub_len = res.length;
                 var sel_sub = '';

                 for(var i=0;i<sub_len;i++){

                    sel_sub += '<span class="badge badge-secondary mr-2">'+res[i]+'</span>';
                 }
                 
                 $('#subjects_list').html(sel_sub);

              }
            });

            if(res[0][0].status == '1'){

              $("#standardRadios1").prop("checked",true);
              $("#standardRadios2").prop("checked",false);

            }else if(res[0][0].status == '0'){

              $("#standardRadios1").prop("checked",false);
              $("#standardRadios2").prop("checked",true);

            } 
          
            $('#editStandardModal').modal('show');

          }
        });

      }

      function delete_standard(e){

        var standard_id = e.id;

        $('#delete_standard_id').attr('value',standard_id);

        $('#deleteStandardModal').modal('show');
      }

      function permanent_delete_standard(e){

        var standard_id = e.id;

        $('#permanent_delete_standard_id').attr('value',standard_id);

        $('#permanentDeleteStandardModal').modal('show');
      }


      $('#delete_standard_id').click(function(){

        var standard_id = $('#delete_standard_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('delete-standard') }}",
          type:"post",
          data:{'standard_id':standard_id},
          success:function(res){

            if(res == '1'){

              $('#deleteStandardModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Standard deleted successfully!');
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

      $('#permanent_delete_standard_id').click(function(){

        var standard_id = $('#permanent_delete_standard_id').attr('value');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url:"{{ route('permanent-delete-standard') }}",
          type:"post",
          data:{'standard_id':standard_id},
          success:function(res){

            if(res == '1'){

              $('#permanentDeleteStandardModal').modal('hide');

              $('#res_text').text('');
              $('#res_text').text('Standard deleted permanently!');
              $('#responseModal').modal('show');

              setTimeout(function(){
                
                $('#responseModal').modal('hide');
                
                window.location.href = '';
              },3000);

            }else if(res == '0'){

              $('#permanentDeleteStandardModal').modal('hide');
              
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

      $('#update_standard').click(function(){

        var id       = $('#standard_id').attr('value');
        var name     = $('#name').val();
        var fees     = $('#fees').val();
        var subjects = $('#subjects').val();
        var status   = $("input[name='standard_status']:checked").val();

        $.ajax({
          url:"{{ route('update-standard') }}",
          type:'post',
          data:{'id':id,'name':name,'fees':fees,'subjects':subjects,'status':status},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Standard updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                $('#editStandardModal').modal('hide');

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