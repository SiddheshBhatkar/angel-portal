@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ADD STANDARD</h4>
          <div id="global_alert" class="" style="display:none;"></div>
          <form action="#" class="form-sample" name="add_standard_form" id="add_standard_form" method="post">
            @csrf
            <p class="card-description">
              Standard Details
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
                  <label class="col-sm-3 col-form-label">Fees (Yearly)&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <input type="text" name="fees" id="fees" class="form-control input-border"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Subjects&nbsp;<label class="mandatory"><sup>*</sup></label></label>
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
                  <label class="col-sm-3 col-form-label">Status&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="subject_status" id="subjectRadios1" value="1">
                        Active
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="subject_status" id="subjectRadios2" value="0">
                        In-Active
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" name="add_standard" id="add_standard" class="btn btn-success mb-2"><i class="fa fa-save" area-hidden="true"></i>&nbsp;Save</button>
            <a href="{{ route('manage-standards') }}" class="btn btn-primary mb-2"><i class="typcn typcn-th-large" area-hidden="true"></i>&nbsp;Manage Standards</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('js/virtual-select.min.js') }}"></script>
<script type="text/javascript">
  
  $(document).ready(function(){

    VirtualSelect.init({ 
      ele: '#subjects' 
    });

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $('#add_standard').click(function(){

      var name     = $('#name').val();
      var subjects = $("#subjects").val();
      var fees     = $("#fees").val();
      var status   = $("input[name='subject_status']:checked").val();


      if((name == '' || name == ' ' || typeof name == 'undefined' || name == null) || (subjects == '' || subjects == ' ' || typeof subjects == 'undefined' || subjects == null) || (fees == '' || fees == ' ' || typeof fees == 'undefined' || fees == null) || (status == '' || status == ' ' || typeof status == 'undefined' || status == null)){

        $('#global_alert').removeClass();
        $('#global_alert').addClass('alert alert-danger');
        $('#global_alert').text('Please fill required fields!');
        $('#global_alert').show();

        setTimeout(function(){

          $('#global_alert').hide();
        },3000);

      }

      if((name != '' && name != ' ' && typeof name != 'undefined' && name != null) && (subjects != '' && subjects != ' ' && typeof subjects != 'undefined' && subjects != null) && (fees != '' || fees != ' ' || typeof fees != 'undefined' || fees != null)  && (status != '' && status != ' ' && typeof status != 'undefined' && status != null)){

        $.ajax({
          url:"{{ route('add-standard') }}",
          type:'post',
          data:{'name':name,'subjects':subjects,'fees':fees,'status':status},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Standard added successfully!');
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