@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ADD STUDENT</h4>
          <div id="global_alert" class="" style="display:none;"></div>
          <form action="#" class="form-sample" name="add_student_form" id="add_student_form" method="post">
            @csrf
            <p class="card-description">
              Student Details
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control input-border"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Standard&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <select class="form-control js-example-basic-single col-sm-12 input-border" name="standard" id="standard" required>
                      <option value="0" selected>--Select--</option>
                      @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ ucwords($standard->name) }}</option>
                      @endforeach
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
                    <select class="form-control js-example-basic-single col-sm-12 input-border" name="classroom" id="classroom" required>
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
            <button type="button" name="add_student" id="add_student" class="btn btn-success mb-2"><i class="fa fa-save" area-hidden="true"></i>&nbsp;Save</button>
            <a href="{{ route('manage-students') }}" class="btn btn-primary mb-2"><i class="typcn typcn-th-large" area-hidden="true"></i>&nbsp;Manage Students</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $('#add_student').click(function(){

      var name           = $('#name').val();
      var standard       = $("#standard").val();
      var classroom      = $("#classroom").val();
      var admission_date = $("#admission_date").val();
      var address        = $("#address").val();
      var contact_no     = $("#contact_no").val();
      var email          = $("#email").val();
      var status         = $("input[name='student_status']:checked").val();

      if((name == '' || name == ' ' || typeof name == 'undefined' || name == null) || (standard == '' || standard == ' ' || typeof standard == 'undefined' || standard == null || standard == '--Select--') || (classroom == '' || classroom == ' ' || typeof classroom == 'undefined' || classroom == null || classroom == '--Select--') || (admission_date == '' || admission_date == ' ' || typeof admission_date == 'undefined' || admission_date == null) || (address == '' || address == ' ' || typeof address == 'undefined' || address == null) || (contact_no == '' || contact_no == ' ' || typeof contact_no == 'undefined' || contact_no == null) || (email == '' || email == ' ' || typeof email == 'undefined' || email == null) || (status == '' || status == ' ' || typeof status == 'undefined' || status == null)){

        $('#global_alert').removeClass();
        $('#global_alert').addClass('alert alert-danger');
        $('#global_alert').text('Please fill required fields!');
        $('#global_alert').show();

        setTimeout(function(){

          $('#global_alert').hide();
        },3000);

      }

      if((name != '' && name != ' ' && typeof name != 'undefined' && name != null) && (standard != '' && standard != ' ' && typeof standard != 'undefined' && standard != null && standard != '--Select--') && (classroom != '' && classroom != ' ' && typeof classroom != 'undefined' && classroom != null && classroom != '--Select--') && (admission_date != '' && admission_date != ' ' && typeof admission_date != 'undefined' && admission_date != null) && (address != '' && address != ' ' && typeof address != 'undefined' && address != null) && (contact_no != '' && contact_no != ' ' && typeof contact_no != 'undefined' && contact_no != null) && (email != '' && email != ' ' && typeof email != 'undefined' && email != null) && (status != '' && status != ' ' && typeof status != 'undefined' && status != null)){

        $.ajax({
          url:"{{ route('add-student') }}",
          type:'post',
          data:$('#add_student_form').serialize(),
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Student added successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
              },3000);

            }else if(res == '0'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-danger');
              $('#global_alert').text('Error Occured! Please try again');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
              },3000);

            }else if(res == '2'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-warning');
              $('#global_alert').text('Already Exists!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
              },3000);
            }
          }
        })

      }
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
  });
</script>
@stop