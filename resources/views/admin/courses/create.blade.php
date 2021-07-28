@extends('admin.layouts.alt_layout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Module</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Add Module
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
              <h3>{{ $training_program->program_name }}</h3>
              <hr>
              <form action="{{ route('admin.courses.store') }}" id="insert_form" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">

                <?php
                    $select_facilitator = '';
                    if(isset($facilitators) && $facilitators != null) {
                    
                      $select_facilitator .= '<select name="facilitator_id[]" class="form-control select_facilitator" required>';

                      foreach($facilitators as $facilitator) {  
                        $select_facilitator .= '<option value="' .$facilitator->id.'">'. $facilitator->name.'</option>';
                      }

                      $select_facilitator .= '</select>';
                    }else { 
                      $select_facilitator .='<p>There are no facilitators on the platform. <a href="">Please create a facilitator profile</a></p>';
                    }

                    $select_day = '';
                    $select_day .= '<select name="day[]" class="form-control select_day">';
                    $duration = $training_program->duration;
                    for( $i=1; $i<=$duration; $i++ ) {
                      $select_day .= '<option value="'. $i .'">'. $i .'</option>';
                    }
                    $select_day .= '</select>';
                  ?>
                

                <div class="table-responsive">
                  
                  <span id="error"></span>
                  
                  <table class="table table-bordered" id="item_table">
                   <tr>
                    <th width="40%">Select Facilitator</th>
                    <th width="40%">Enter Module Name</th>
                    <th width="10%">Day</th>
                    <th width="10%">
                      <button type="button" name="add" class="btn btn-info btn add">Add Field</button>
                    </th>
                   </tr>
                  </table>
                  <div style="margin-top: 20px">
                   <input type="submit" name="submit" class="btn btn-info" value="Create Modules" />
                   
                   <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" 
                    class="btn btn-info btn">Back to Course</a>
                  </div>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

</div> <!--End content-main-->

<footer class="footer-main">
   <?php echo date('Y') ?> &copy; Informed LMS, Powered by <a href="http://averti.com.ng" target="_blank">Averti PM</a>
  </footer>	
  
</div>

</div> <!--/.Main page-container-->

</div>


@include('admin.includes.js_includes')


<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
      }
    });
   
    $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td><?php echo $select_facilitator ?></td>';
      html += '<td><input type="text" name="course_name[]" class="form-control course_name" /></td>';
      html += '<td><?php echo $select_day ?></td>';
      html += '<td><button type="button" name="remove" class="btn btn-info btn remove">Remove</button></td></tr>';
      $('#item_table').append(html);
    });
    
    $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });
    
    $('#insert_form').on('submit', function(event){
      event.preventDefault();
      var error = '';
      $('.select_facilitator').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += "<p>Select Facilitator at "+count+" Row</p>";
        return false;
      }
      count = count + 1;
      });
      
      $('.course_name').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += "<p>Enter Module name at "+count+" Row</p>";
        return false;
      }
      count = count + 1;
      });
      
      $('.select_day').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += "<p>Select day at "+count+" Row</p>";
        return false;
      }
      count = count + 1;
      });
      var form_data = $(this).serialize();
      if(error == '')
      {
        var url = "<?php echo url('/admin/course_modules/store') ?>";
        $.ajax({
          url: url,
          method:"POST",
          data:form_data,
          success:function(data)
          {
            if(data == 'success')
            {
              $('#item_table').find("tr:gt(0)").remove();
              $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
            }
          }
        });
      }
      else
      {
        $('#error').html('<div class="alert alert-danger">'+error+'</div>');
      }
    });
   
  });
</script>


</body>
</html>


@endsection

