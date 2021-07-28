
function IEdetection() { 
  var ua = window.navigator.userAgent; 
  
  var msie = ua.indexOf('MSIE '); 
  var trident = ua.indexOf('Trident/');
  var edge = ua.indexOf('Edge/'); 

  if (msie > 0 || trident > 0 || edge > 0) { 
      // IE 10 or older, return version number 
      alert('You are using an outdated browser. Please upgrade your browser to a newer and compatible browser to get the best experience from this platform.'); 
  } 
  else {
      //alert('It is NOT InternetExplorer. Happy Browsing');
  }
  
} 

IEdetection(); 

$(document).ready(function() {
    $('#summernote').summernote();
  
    $('#summernote1').summernote();
  
    $('#summernote2').summernote();
  
    $('.text_answers').summernote({
      height: 200,
      minHeight: 200,              
      maxHeight: 600,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      insertTableMaxSize: {
        col: 20,
        row: 20
      },
    });
});
  
$(function() {
    $('#register').submit(function(e) {
        var verified = grecaptcha.getResponse();

        if(varified.lenght === 0) {
            e.preventDefault();
        }
    });
          
});

$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});

$('#password, #password_confirm, #password-confirm').password({
      
      placement: 'after',
      message: 'Click here to show/hide password',
      eyeClass: 'fa',
      eyeOpenClass: 'fa-eye',
      eyeCloseClass: 'fa-eye-slash',
      eyeClassPositionInside: false

});

$('.delete_form_btn').on('click', function(e){
    //var name = $(this).data('name');
    var form = $(this).parent();
    var form_id = $(this).parent().attr("id");
      e.preventDefault();
      swal({
          title: "Careful!",
          text: "Are you sure you want to delete",
          icon: "warning",
          dangerMode: true,
          buttons: {
            cancel: "Exit",
            confirm: "Confirm",
          },
      })
      .then ((willDelete) => {
          if (willDelete) {
              $(form).submit();
              //alert('form with id '+form_id+' was submitted');
          }
      });
});

$('.confirm_form_btn').on('click', function(e){
    //var name = $(this).data('name');
      e.preventDefault();
      swal({
          title: "Careful!",
          text: "Are you sure you want to update records",
          icon: "warning",
          dangerMode: true,
          buttons: {
            cancel: "Exit",
            confirm: "Confirm",
          },
      })
      .then ((willDelete) => {
          if (willDelete) {
              $(".confirm_form").submit();
          }
      });
});

$('.deactivate_form_btn').on('click', function(e){
    //var name = $(this).data('name');
      e.preventDefault();
      swal({
          title: "Careful!",
          text: "Are you sure you want to suspend this account",
          icon: "warning",
          dangerMode: true,
          buttons: {
            cancel: "Exit",
            confirm: "Confirm",
          },
      })
      .then ((willDelete) => {
          if (willDelete) {
              $(".deactivate_form").submit();
          }
      });
});

$('.submit_form_btn').on('click', function(e){
    //var name = $(this).data('name');
    e.preventDefault();
    swal({
        title: "Careful!",
        text: "Are you sure you want to submit the test",
        icon: "warning",
        dangerMode: true,
        buttons: {
          cancel: "Exit",
          confirm: "Confirm",
        },
    })
    .then ((willDelete) => {
        if (willDelete) {
            $("#regiration_form").submit();
        }
    });
});

$('.nav_trigger').on('click', function(){
  console.log('nav was clicked');
  $('.nav ul').slideToggle(500);
});



/*
function isIE() {
  ua = navigator.userAgent;
  var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
  
  return is_ie; 
}
if (isIE()){
    
}else{
    alert('It is NOT InternetExplorer. Happy Browsing');
}
*/