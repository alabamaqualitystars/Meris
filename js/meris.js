 jQuery(document).ready(function(){
    jQuery("form.contact-form").submit(function(){
	var Name    = jQuery(this).find("input#contact-name").val();
	var Email   = jQuery(this).find("input#contact-email").val();
	var Message = jQuery(this).find("textarea#contact-msg").val();
	var     obj = jQuery(this);
    jQuery('.fa-spinner').remove();
	jQuery(this).find("#loading").append('<i class="fa fa-spinner fa-2 fa-spin"></i>');
	
	 jQuery.ajax({
				 type:"POST",
				 dataType:"json",
				 url:meris_params.ajaxurl,
				 data:"contact-name="+Name+"&contact-email="+Email+"&contact-msg="+Message+"&action=meris_contact",
				 success:function(data){
					 if(data.error==0){
						   obj.find("#loading").html(data.msg);	
						  }
				obj.find('.fa-spinner').remove();
				obj[0].reset();
				return false;
				},
				error:function(){
					obj.find("#loading").html("Error.");
					obj.find('.fa-spinner').remove();
					return false;
					}});
	 return false;
	 });
				
	//
	jQuery(".slogan-wrapper").parents(".col-md-12").css({"padding":0});
	//
		jQuery(".site-nav-toggle").click(function(){
				jQuery(".site-nav").toggle();
			});
	
			jQuery(".site-search-toggle").click(function(){
				jQuery(".search-form").toggle();
			
		});
	//testimonial
	jQuery('.testimonial-wrapper').carousel();
	
	// carousel
	 var owl = jQuery("#meris-carousel");

      owl.owlCarousel({
      items : owl.data("num"), // items num above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });



/* ------------------------------------------------------------------------ */
/*  sticky header             	  								  	    */
/* ------------------------------------------------------------------------ */
	 // sticky header resizing control
	jQuery(window).on('resize', function() {
										 
	  if (jQuery(".site-nav").length) {
	  if (jQuery(window).width() > 919) {
	  jQuery(".site-nav").show();
	  } else {
	  jQuery(".site-nav").hide();
	  }
	  }
	
		if(jQuery(".sticky-header").length ) {
			if(jQuery(window).width() < 765) {
				jQuery('body.admin-bar header.sticky-header').css('top', '46px');
			} else {
				jQuery('body.admin-bar header.sticky-header').css('top', '32px');
			}
		}
	});
	
	jQuery( window ).scroll(function() {
	if( jQuery( 'header.sticky-header' ).length ) {
		var scrollTop    = jQuery(window).scrollTop();
		var headerHeight = jQuery( 'header.sticky-header' ).outerHeight();
	if(jQuery(".slider-above-header").length){
			headerHeight = headerHeight + jQuery(".slider-above-header").outerHeight();
			}
	  if(jQuery("body.admin-bar").length){
		if(jQuery(window).width() < 765) {
				headerHeight = headerHeight+46;
				jQuery('body.admin-bar header.sticky-header').css('top', '46px');
			} else {
				headerHeight = headerHeight+23;
				jQuery('body.admin-bar header.sticky-header').css('top', '32px');
			}
			
	  }
	  else{
		  jQuery('body header.sticky-header').css('top', '0');
		  }
	  
	  if(scrollTop>=jQuery( 'header.theme-header' ).outerHeight()-headerHeight){
		  jQuery( 'header.sticky-header' ).show();
		  }else{
		  jQuery( 'header.sticky-header' ).hide();
			  }
		
	   }
	});
/* ------------------------------------------------------------------------ */
/*  video background            	  								  	    */
/* ------------------------------------------------------------------------ */
if(jQuery('.homepage-video-background').length){
	  var videoLoop = true;
	   if(video_background.loop === "false"){
		   videoLoop = false;
		   }
/* jQuery('.homepage-video-background').videoBG({
		mp4:video_background.mp4,
		ogv:video_background.ogv,
		webm:video_background.webm,
		poster:video_background.poster,
		loop:videoLoop,
		scale:true,
		zIndex:0
	});
 
 jQuery(".homepage-video-background").height( jQuery(".homepage-video-background > .videoBG_wrapper").height());*/
 
       var BV;
       var BV = new jQuery.BigVideo({
				useFlashForFirefox:false,
				forceAutoplay:true,
				controls:false,
				doLoop:videoLoop,
			});
			BV.init();
			if (Modernizr.touch) {
				BV.show(video_background.poster);
			} else {
				BV.show(
				[
        { type: "video/mp4",  src: video_background.mp4 },
        { type: "video/webm", src: video_background.webm },
        { type: "video/ogg",  src: video_background.ogv }
    ],{ambient:videoLoop});
	BV.getPlayer().volume(10);
	BV.getPlayer().on("durationchange",function(){jQuery("#big-video-wrap").fadeIn();});
			}
			
			
}
	////
	
 });
 
 if(typeof meris_js_var !== 'undefined' && typeof meris_js_var.global_color !== 'undefined'){
 less.modifyVars({
        '@color-main': meris_js_var.global_color
    });
   }