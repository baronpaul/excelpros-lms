@extends('layouts.mainlayout')

@section('content')

@include('includes.nav')

<style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}

.form_wrap {
    width: 100%;
    height: auto;
    padding: 20px;
    border: solid 1px #ddd;
    border-radius: 6px;
}
.mt100 {
    margin-top: 100px;
}
</style>

<div id="page_wrapper" class="pt-50">

    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="page_title text-center">
                    <h1>{{ $exam->exam_title }}</h1>
                </div>

                <div class="page_content">
                    <div class="timer">
                        <div><span id="display" style="color:#000;font-size:15px"></span></div>
                        <div><span id="submitted" style="color:#FF0000;font-size:15px"></span></div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    
                    <div class="alert alert-success hide"></div>
                
                    <div class="row">
                
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form_wrap">
                                <form id="regiration_form" method="post" action="{{ route('test.submit_test') }}">
                                    {{ csrf_field() }}
                                @php
                                    $arrlen = count($questions);  
                                    $i = 0;
                                    while ($i < $arrlen)
                                    {
                                    @endphp
                
                                    @if($i == 0) 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <p>{{ $questions[$i]['question_name'] }}</p>
                                        <div class="form-group">
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="1">{{ $questions[$i]['answer1'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="2">{{ $questions[$i]['answer2'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="3">{{ $questions[$i]['answer3'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="4">{{ $questions[$i]['answer4'] }}</label>
                                            </div>
                                        </div>
                                        <button type="button" class="next btn btn-info">Next</button>
                                    </fieldset>
                                    @elseif($i == $arrlen - 1) 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <p>{{ $questions[$i]['question_name'] }}</p>
                                        <div class="form-group">
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="1">{{ $questions[$i]['answer1'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="2">{{ $questions[$i]['answer2'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="3">{{ $questions[$i]['answer3'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="4">{{ $questions[$i]['answer4'] }}</label>
                                            </div>
                                        </div>
                                        
                                        <button type="button" class="previous btn btn-default">Previous</button>
                                        <button type="submit" class="submit btn btn-success">Submit</button>
                                    </fieldset>
                                    @else 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <p>{{ $questions[$i]['question_name'] }}</p>
                                        <div class="form-group">
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="1">{{ $questions[$i]['answer1'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="2">{{ $questions[$i]['answer2'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="3">{{ $questions[$i]['answer3'] }}</label>
                                            </div>
                                            <div class="radio">
                                            <label><input type="radio" name="{{ $questions[$i]['question_id'] }}" value="4">{{ $questions[$i]['answer4'] }}</label>
                                            </div>
                                        </div>
                                        <button type="button" class="previous btn btn-default">Previous</button>
                                        <button type="button" class="next btn btn-info">Next</button>
                                    </fieldset>
                                    @endif
                                    
                                    @php       
                                    $i++;
                                    }
                                @endphp
                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
$link = '"'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI'].'"';
?>
<script>
var pageUrl = <?php echo $link ?>;
window.open (pageUrl,"mywindow","status=1,toolbar=0");
document.onkeydown = checkKeycode;

function checkKeycode(e) {
    var keycode;
    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;

    // Mozilla firefox
    if ($.browser.mozilla) {
        if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
            if (e.preventDefault)
            {
                e.preventDefault();
                e.stopPropagation();
            }
        }
    } 
    // IE
    else if ($.browser.msie) {
        if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
            window.event.returnValue = false;
            window.event.keyCode = 0;
            window.status = "Refresh is disabled";
        }
    }
}
</script>

<script type="text/javascript">
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});

$("#regiration" ).submit(function(event) {
    jQuery('.alert-success').removeClass('hide').html( "Handler for .submit() called and see console logs for your posted variable" );
    console.log($(this).serialize());
    //event.preventDefault();
});
</script>

<script>
    var div = document.getElementById('display');
    var submitted = document.getElementById('submitted');
  
      function CountDown(duration, display) {
  
              var timer = duration, minutes, seconds;
  
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
  
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
            display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                    if (timer > 0) {
                       --timer;
                    }else{
               clearInterval(interVal)
                        SubmitFunction();
                     }
  
               },1000);
  
        }
  
      function SubmitFunction(){
        submitted.innerHTML="Time is up!";
        //document.getElementById('regiration_form').submit();
  
       }
       CountDown(<?php echo $time_limit * 60 ?>,div);
</script>


</body>

@stop