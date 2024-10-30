@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">MANAGE PROFILE</h4>
          <div id="global_alert" class="" style="display:none;"></div>
          <form action="#" class="form-sample" name="manage_profile_form" id="manage_profile_form" method="post">
            @csrf
            <p class="card-description">
              Profile Details
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" placeholder= "{{ ucwords($userData[0]->name); }}" class="form-control input-border"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="email" name="email" id="email" placeholder= "{{ $userData[0]->email }}" class="form-control input-border"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="password" name="password" id="password" placeholder="********" class="form-control input-border"/>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" name="update_profile" id="update_profile" class="btn btn-success mb-2"><i class="fa fa-save" area-hidden="true"></i>&nbsp;Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">

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

    $('#update_profile').click(function(){

      var name     = $('#name').val();
      var email    = $("#email").val();
      var password = $("#password").val();

      var valid_email   = validateEmail(email);

      if((name == '' || name == ' ' || typeof name == 'undefined' || name == null) && (email == '' || email == ' ' || typeof email == 'undefined' || email == null || valid_email == false) && (password == '' || password == ' ' || typeof password == 'undefined' || password == null)){

        $('#global_alert').removeClass();
        $('#global_alert').addClass('alert alert-danger');
        $('#global_alert').text('Please fill atleast one field to update info!');
        $('#global_alert').show();

        setTimeout(function(){

          $('#global_alert').hide();
        },3000);

      }

      if((name != '' && name != ' ' && typeof name != 'undefined' && name != null) || (email != '' && email != ' ' && typeof email != 'undefined' && email != null && valid_email == true) || (password != '' && password != ' ' && typeof password != 'undefined' && password != null)){

        $.ajax({
          url:"{{ route('update-profile') }}",
          type:'post',
          data:{'name':name,'email':email,'password':password},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Profile details updated successfully!');
              $('#global_alert').show();

              setTimeout(function(){
                
                $('#global_alert').hide();
                window.location.href = "{{ route('logout-user') }}";
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
        })

      }
    });
  });
</script>
@stop