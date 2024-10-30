@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ADD TEACHER</h4>
          <div id="global_alert" class="" style="display:none;"></div>
          <form action="#" class="form-sample" name="add_teacher_form" id="add_teacher_form" method="post">
            @csrf
            <p class="card-description">
              Teacher Details
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
            <button type="button" name="add_teacher" id="add_teacher" class="btn btn-success mb-2"><i class="fa fa-save" area-hidden="true"></i>&nbsp;Save</button>
            <a href="{{ route('manage-teachers') }}" class="btn btn-primary mb-2"><i class="typcn typcn-th-large" area-hidden="true"></i>&nbsp;Manage Teachers</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  
  function isValidIndianNumber(phoneNumber){

    const regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;

    return regex.test(phoneNumber);
  }

  function validateEmail(email) {

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return emailPattern.test(email);
  }

  $(document).ready(function(){

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $('#add_teacher').click(function(){

      var name        = $('#name').val();
      var salary      = $('#salary').val();
      var address     = $('#address').val();
      var contact_no  = $('#contact_no').val();
      var email       = $('#email').val();
      var status      = $("input[name='teacher_status']:checked").val();

      var valid_contact = isValidIndianNumber(contact_no);
      var valid_email   = validateEmail(email);

      if((name == '' || name == ' ' || typeof name == 'undefined' || name == null) || (salary == '' || salary == ' ' || typeof salary == 'undefined' || salary == null) || (address == '' || address == ' ' || typeof address == 'undefined' || address == null) || (contact_no == '' || contact_no == ' ' || typeof contact_no == 'undefined' || contact_no == null || valid_contact == false) || (email == '' || email == ' ' || typeof email == 'undefined' || email == null || valid_email == false) || (status == '' || status == ' ' || typeof status == 'undefined' || status == null)){

        $('#global_alert').removeClass();
        $('#global_alert').addClass('alert alert-danger');
        $('#global_alert').text('Please fill required fields!');
        $('#global_alert').show();

        setTimeout(function(){

          $('#global_alert').hide();
        },3000);

      }

      if((name != '' && name != ' ' && typeof name != 'undefined' && name != null) && (salary != '' && salary != ' ' && typeof salary != 'undefined' && salary != null) && (address != '' && address != ' ' && typeof address != 'undefined' && address != null) && (contact_no != '' && contact_no != ' ' && typeof contact_no != 'undefined' && contact_no != null && valid_contact == true) && (email != '' && email != ' ' && typeof email != 'undefined' && email != null && valid_email == true) && (status != '' && status != ' ' && typeof status != 'undefined' && status != null)){

        $.ajax({
          url:"{{ route('add-teacher') }}",
          type:'post',
          data:$("#add_teacher_form").serialize(),
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Teacher added successfully!');
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
  });
</script>
@stop