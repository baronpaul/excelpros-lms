@extends('layouts.mainlayout')

@section('content')

<main>

<style type="text/css">

.mt100 {
    margin-top: 100px;
}
</style>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

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
                        <div id="message"></div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    
                    <div class="alert alert-success hide"></div>
                
                    <div class="row">
                
                        <div class="col-md-12">
                            <div class="form_wrap">
                                <form id="regiration_form" method="post" action="{{ route('test.submit_essay_test') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="comments" value="" id="exam_comment">
                                    <input type="hidden" name="terminated" id="terminated" value="no">
                                    <?php
                                    $arrlen = count($questions);
                                    $a = 0;
                                    while($a < $arrlen) {
                                        echo '<input type="hidden" name="questions['.$a.']" value="'. $questions[$a]['question_id'] .'">';
                                        $a++;
                                    }
                                     
                                    $i = 0;
                                    while ($i < $arrlen)
                                    {
                                    ?>
                
                                    @if($i == 0) 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <div class="question_txt">{!! $questions[$i]['question_name'] !!}</div>
                                        @if($questions[$i]['question_image'] != NULL)
                                        <div class="ques_img">
                                            <img src="{{ asset($questions[$i]['question_image']) }}" />
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <textarea name="{{ $questions[$i]['question_id'] }}" id="" class="text_answers" rows="5"></textarea>
                                        </div>
                                        <button type="button" class="next btn btn-info">Next</button>
                                    </fieldset>
                                    @elseif($i == $arrlen - 1) 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <div class="question_txt">{!! $questions[$i]['question_name'] !!}</div>
                                        @if($questions[$i]['question_image'] != NULL)
                                        <div class="ques_img">
                                            <img src="{{ asset($questions[$i]['question_image']) }}" />
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <textarea name="{{ $questions[$i]['question_id'] }}" class="text_answers" rows="5"></textarea>
                                        </div>
                                        
                                        <button type="button" class="previous btn btn-default">Previous</button>
                                        <button type="button" class="next btn btn-info">Honour Pledge</button>
                                    </fieldset>
                                    @else 
                                    <fieldset>
                                        <h2>Question {{ $i + 1 }}</h2>
                                        <div class="question_txt">{!! $questions[$i]['question_name'] !!}</div>
                                        @if($questions[$i]['question_image'] != NULL)
                                        <div class="ques_img">
                                            <img src="{{ asset($questions[$i]['question_image']) }}" />
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <textarea name="{{ $questions[$i]['question_id'] }}" class="text_answers" rows="5"></textarea>
                                        </div>
                                        <button type="button" class="previous btn btn-default">Previous</button>
                                        <button type="button" class="next btn btn-info">Next</button>
                                    </fieldset>
                                    @endif
                                    
                                    <?php      
                                    $i++;
                                    }
                                ?>

                                <fieldset>
                                    <h2>Honour Pledge</h2>
                                    <p>
                                        On my honor as a Participant of this Training Programme, I conform that I completed this assessment on my own and I have neither given nor received aid.<br>
                                    </p>
                                    <div class="form-group">
                                        <div class="checkbox" id="honour_pledge">
                                            <label>
                                                <input type="checkbox" name="honour_pledge" id="honour_pledge" value="yes" 
                                                onchange="document.getElementById('submit_form_btn').disabled = !this.checked;" >
                                                I confirm.
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="previous btn btn-default">Previous</button>
                                    <button type="submit" class="submit submit_form_btn btn btn-danger" id="submit_form_btn" disabled>Submit</button>
                                </fieldset>
                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
$link = '"'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI'].'"';
?>

</main>

@include('includes.footer')

@include('includes.jsincludes')

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

    var div = document.getElementById('display');
    var submitted = document.getElementById('submitted');
    var comment = document.getElementById("exam_comment");
    var terminated = document.getElementById("terminated");
  
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
                clearInterval(interVal);
                document.getElementById("exam_comment").value = "Time ran out";
                SubmitFunction();
            }

        },1000);

    }

    function SubmitFunction(){
        submitted.innerHTML="Test ends now!";
        document.getElementById('regiration_form').submit();
    }

    CountDown(<?php echo $time_limit * 60 ?>,div);

    var info = document.getElementById("message");
    var tab_switch_count = 0;
    var msg = "Test is running.";

    function start() {
        info.innerHTML = msg;
    }
    window.onload = start;

    $(window).on('blur', function () {
        tab_switch_count++;
        //info.innerHTML = "You have switched tabs " + tab_switch_count + " times";
        if(tab_switch_count < 2) {
            info.innerHTML = "You have switched tabs. Please do not repeat this action.";
        }
        else if(tab_switch_count == 2) {
            info.innerHTML = "You have switched tabs " + tab_switch_count + " times. This is your final warning";
        }
        else if(tab_switch_count >= 3) {
            info.innerHTML = "You have switched tabs far too many times. This test ends now";
            document.getElementById("exam_comment").value = "Switched tabs too many times";
            terminated.value = "yes";
            document.getElementById('regiration_form').submit();
        }
    });
</script>


@stop