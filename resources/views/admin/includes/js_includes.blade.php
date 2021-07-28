<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/metisMenu.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/jquery.nicescroll.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('admin_assets/js/toastr.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/summernote.js') }}"></script>

<script src="{{ asset('admin_assets/js/sweetalert.min.js') }}"></script>

<script src="{{ asset('js/bootstrap-show-password.js') }}"></script>

<script src="{{ asset('admin_assets/js/custom.js') }}"></script>


<script type="text/javascript">

  function idleReload() {
      var t;
      window.onload = resetTimer;
      window.onmousemove = resetTimer;
      window.onmousedown = resetTimer;       
      window.ontouchstart = resetTimer; 
      window.onclick = resetTimer;
      window.onkeypress = resetTimer;   
      window.addEventListener('scroll', resetTimer, true); 

      function reloadPage() {
          window.location.reload();
      }

      function resetTimer() {
          clearTimeout(t);
          t = setTimeout(reloadPage, 600000); 
      }
  }
  //idleReload();

  
  function isNumberKey(e){
      var charCode = (e.which) ? e.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      return true;
  }

  $(document).ready(function() {
        
      $('.edit-btn-trigger').on('click', function(e) {        
            $(e.target).closest('.edit-btn-wrap').find('.edit-btn-cont').toggle('show');
      });


      $('#sec_nav').on('click', function(e) {   
          if ($('#sec_nav').hasClass('close_nav')) {
            $('#sec_nav').removeClass('close_nav').addClass('open_nav')
          } 
          else if ($('#sec_nav').hasClass('open_nav')) {
            $('#sec_nav').removeClass('open_nav').addClass('close_nav')
          }    

          $('.sec_sidebar_nav ul').toggle(500);
            
      });

      $(".allow_decimal").on("input", function(evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
        {
          evt.preventDefault();
        }
      });

      $('#select_all').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
      });
    
      $("#add_more").on('click', function(e){
          e.preventDefault();
            var clone = $(".clonedinput").eq(0).clone();
            $("#faculty_wrapper").append(clone);
      });
        
      $("#submit").on('click', function(e){
          e.preventDefault();
            alert($("#faculty_wrapper").serialize());
      });


      $('#summernote').summernote();

      $('#summernote1').summernote();

      $('#summernote2').summernote();

      $('#question_name').summernote({
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


      $('.text_answers').summernote();

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


  $('#password, #password_confirm').password({
      
        placement: 'after',
        message: 'Click here to show/hide password',
        eyeClass: 'fa',
        eyeOpenClass: 'fa-eye',
        eyeCloseClass: 'fa-eye-slash',
        eyeClassPositionInside: false
	
	});
  

  $('.delete_form_btn').on('click', function(e){
  //var name = $(this).data('name');
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
           $(".delete_form").submit();
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

  
</script>


<script type="text/javascript">
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @elseif(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
  @elseif(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
  @elseif(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
  @endif
</script>
