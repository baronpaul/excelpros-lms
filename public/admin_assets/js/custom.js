
/*Loader*/
 $(window).load(function() {
	$(".loader-item").delay(500).fadeOut();
	$("#pageloader").delay(1000).fadeOut("slow");
	
	});

  /*To do list*/
		
	 $(".list-task li label").click(function() {
            $(this).toggleClass("task-done");
     });

   $(document).ready(function () {
	
	/*Content  height*/	
	function setHeight() {
		windowHeight = $(window).innerHeight()-100;
		$('.content-main').css('min-height', windowHeight);
	};
	setHeight();
	
	$(window).resize(function () {
		setHeight();
	});
	
	   
	$('.sidebar-nav').slimScroll({
	position: 'right',
	color: '#f2f2f2',
	height: '100%',
	railVisible: true,
	alwaysVisible: false
	});
	
		
  });

/*navigation bart*/	
!function($) {
    "use strict";
	
	$('.sidebar-main-toggle').click(function() {
    if ($("body.fixed-top").hasClass("collapse-navbar")) {
		 $('.sidebar-nav').slimScroll({
			destroy:true
		});
		
    $(".sidebar-nav, .slimScrollDiv").css("overflow", "visible").parent().css("overflow", "visible");
	
    }
	
	else {
     $('.sidebar-nav').slimScroll({
	position: 'right',
	height: '100%',
	railVisible: true,
	alwaysVisible: true
	});
}
	
});
	
    $('.navbar-small').on('click', function () {
		if($(window).width() > 991)
		
		{
			 $("body").toggleClass("collapse-navbar");
		}
		else
		{
        $("body").toggleClass("collapse-navbar-show");
		}

    });
  
  $(function(){
 
	  // niceScroll
        $(".scroll").niceScroll({
            cursorcolor : "#000000",
            cursoropacitymax : 0.3,
            cursorwidth : "2px",
            cursorborder : "2px solid transparent",
            cursordragontouch : true, // drag cursor in touch / touchbehavior mode also
            zindex : "10", // change z-index for scrollbar div
            cursorborderradius: "10px",
        });
	
	$(".inbox-scroll-list").niceScroll({styler:"fb",cursorcolor:"#ccc", cursorwidth: '5', cursorborderradius: '0px', background:   '#ccc',     spacebarenabled:false, cursorborder: '2'});
	
	
	$(".chat-scroll-list").niceScroll({styler:"fb",cursorcolor:"#ccc", cursorwidth: '5', cursorborderradius: '0px', background: '#ccc', spacebarenabled:false, cursorborder: '2'});


	function fullheight() {
		windowHeight = $(window).innerHeight();
		$('.full-height').css('min-height', windowHeight);
	};
	fullheight();
	
	$(window).resize(function () {
		fullheight();
	});


	//tooltip
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
	
	// Initialize Popovers
	jQuery('[data-toggle="popover"], .js-popover').popover({
		container: 'body',
		animation: true,
		trigger: 'hover'
	});
	
	/*Left Side Menu*/	
		$('#side-menu').metisMenu();
		
		
		
		
	});
			
		}(window.jQuery);	