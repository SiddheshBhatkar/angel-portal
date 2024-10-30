@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ASSIGN CLASS-TEACHER</h4>
          <div id="global_alert" class="" style="display:none;"></div>
            <form action="#" class="form-sample" name="assign_class_teacher_form" id="assign_class_teacher_form" method="post">
            @csrf
            <p class="card-description">
              Class Teacher Assign Details
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Standard&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <select id="standard" name="standard" class="form-control js-example-basic-single col-sm-12 input-border" required>
                        <option value="0" selected disabled>--Select--</option>
                      @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ ucwords($standard->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Classroom&nbsp;<label class="mandatory"><sup>*</sup></label></label>
                  <div class="col-sm-9">
                    <select id="classroom" name="classroom" class="form-control js-example-basic-single col-sm-12 input-border" required>
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
                    <select id="teacher" name="teacher" class="form-control js-example-basic-single col-sm-12 input-border" required>
                      <option value="0" selected disabled>--Select--</option>
                      @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ ucwords($teacher->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" name="add_standard" id="assign_class_teacher" class="btn btn-success mb-2"><i class="fa fa-save" area-hidden="true"></i>&nbsp;Save</button>
            <a href="{{ route('manage-assign-class-teachers') }}" class="btn btn-primary mb-2"><i class="typcn typcn-th-large" area-hidden="true"></i>&nbsp;Manage Assigned Class Teacher</a>
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

    $('#assign_class_teacher').click(function(){
      
      var standard  = $("#standard").val();
      var classroom = $("#classroom").val();
      var teacher   = $("#teacher").val();

      if((standard == '' || standard == ' ' || typeof standard == 'undefined' || standard == null || standard == '--Select--') || (classroom == '' || classroom == ' ' || typeof classroom == 'undefined' || classroom == null || classroom == '--Select--') || (teacher == '' || teacher == ' ' || typeof teacher == 'undefined' || teacher == null || teacher == '--Select--')){

        $('#global_alert').removeClass();
        $('#global_alert').addClass('alert alert-danger');
        $('#global_alert').text('Please fill required fields!');
        $('#global_alert').show();

        setTimeout(function(){
          $('#global_alert').hide();
        },3000);

      }

      if((standard != '' && standard != ' ' && typeof standard != 'undefined' && standard != null && standard != '--Select--') && (classroom != '' && classroom != ' ' && typeof classroom != 'undefined' && classroom != null && classroom != '--Select--') && (teacher != '' && teacher != ' ' && typeof teacher != 'undefined' && teacher != null && teacher != '--Select--')){

        $.ajax({
          url:"{{ route('assign-class-teacher') }}",
          type:'post',
          data:{'standard':standard,'classroom':classroom,'teacher':teacher},
          success:function(res){

            if(res == '1'){

              $('#global_alert').removeClass();
              $('#global_alert').addClass('alert alert-success');
              $('#global_alert').text('Teacher assigned to classroom successfully!');
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
              $('#global_alert').text('This teacher already assigned to this classroom!');
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