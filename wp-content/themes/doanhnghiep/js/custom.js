jQuery(document).ready(function(){
				// SCROLL TO DIV
				jQuery(window).scroll(function(){
					if(jQuery(this).scrollTop()>500){
						jQuery('.scrolltop').addClass('go_scrolltop');
					}
					else{
						jQuery('.scrolltop').removeClass('go_scrolltop');
					}
				});
				jQuery('.scrolltop').click(function (){
					jQuery('html, body').animate({
						scrollTop: jQuery("html").offset().top
					}, 1000);
				}); 
				jQuery('.patronize  ul').slick({
				dots: false,
				infinite: true,
				speed: 300,
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				prevArrow: false,
				nextArrow: false,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
		// MENU MOBILE
		jQuery(".icon_mobile_click").click(function(){
			jQuery(this).fadeOut(300);
			jQuery("#page_wrapper").addClass('page_wrapper_active');
			jQuery("#menu_mobile_full").addClass('menu_show').stop().animate({left: "0px"},260);
			jQuery(".close_menu, .bg_opacity").show();
		});
		jQuery(".close_menu").click(function(){
			jQuery(".icon_mobile_click").fadeIn(300);
			jQuery("#menu_mobile_full").animate({left: "-260px"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery(this).hide();
			jQuery('.bg_opacity').hide();
		});
		jQuery('.bg_opacity').click(function(){
			jQuery("#menu_mobile_full").animate({left: "-260px"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery('.close_menu').hide();
			jQuery(this).hide();
			jQuery('.icon_mobile_click').fadeIn(300);
		});
		jQuery("#menu_mobile_full ul li a").click(function(){
			jQuery(".icon_mobile_click").fadeIn(300);
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
		});
		jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul').slideToggle();
			jQuery(this).siblings().has('ul.sub-menu').find('ul.sub-menu').slideUp();
		}).children('ul').children().click(function(event){event.stopPropagation()});
		jQuery('.mobile-menu ul.menu').children().find('ul.sub-menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).find('ul.sub-menu').slideToggle();
		});
		jQuery('.mobile-menu ul.menu li').has('ul.sub-menu').click(function(event){
			jQuery(this).toggleClass('editBefore_mobile');
		});
		jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').addClass('menu-item-has-children');
		jQuery('.mobile-menu ul.menu li').click(function(){
			$(this).addClass('active').siblings().removeClass('active, editBefore_mobile');
		});
	
		
		// Set the date we're counting down to
		var str_countDown = jQuery('.day_start').text();
		var cv_str_countDown = str_countDown.replace(/[_\W-]+/g, '/');
		var countDownDate = new Date(cv_str_countDown).getTime();
	// Update the count down every 1 second
	var x = setInterval(function() {
  // Get todays date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="demo"
  jQuery("#days").html(days);
  jQuery("#hours").html(hours);
  jQuery("#minutes").html(minutes);
  jQuery("#seconds").html(seconds);
  // If the count down is over, write some text 
  if (distance < 0) {
  	clearInterval(x);
  	document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
	
	var width = jQuery(window).width();
	if(width>1200){
		//jQuery('.host_patronize, .dvi_dtnn').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.cost_exhibiting .panel-layout>.panel-grid ').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.text_video  .panel-layout>.panel-grid>.panel-grid-cell:nth-child(1)').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1.5s"}).addClass("wow animated slideInLeft ");
		jQuery('.text_video  .panel-layout>.panel-grid>.panel-grid-cell:nth-child(2)').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1.5s"}).addClass("wow animated slideInRight ");
		jQuery('.register_banner .container>.col-sm-4:nth-child(1)').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.register_banner .container>.col-sm-4:nth-child(2)').attr({"data-wow-delay" : "0.45s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.register_banner .container>.col-sm-4:nth-child(3)').attr({"data-wow-delay" : "0.6s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(1)').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(2)').attr({"data-wow-delay" : "0.45s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(3)').attr({"data-wow-delay" : "0.6s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(4)').attr({"data-wow-delay" : "0.75s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(5)').attr({"data-wow-delay" : "0.9s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.events_area ul>li:nth-child(6)').attr({"data-wow-delay" : "1.05s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		jQuery('.list_post_index ul>li:nth-child(1)').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.list_post_index ul>li:nth-child(2)').attr({"data-wow-delay" : "0.45s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.list_post_index ul>li:nth-child(3)').attr({"data-wow-delay" : "0.6s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.list_post_index ul>li:nth-child(4)').attr({"data-wow-delay" : "0.75s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.list_post_index ul>li:nth-child(5)').attr({"data-wow-delay" : "0.9s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		jQuery('.list_post_index ul>li:nth-child(6)').attr({"data-wow-delay" : "1.05s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		new WOW().init();
	}
	// if( jQuery('div[class*="events_template"]').length > 0 ) { 
	// 	jQuery('.sidebar, .related_posts , .fb-comments').hide();
	// 	jQuery('.content_left').addClass('full-width');
	// 	console.log(1);
	//  }


	 // SHOP POPUP
			jQuery(" .btn_register, .register_banner .container>.col-sm-4:nth-child(2) .wrap_item_regis_banner").click(function(e){
				jQuery('.popup_order').stop(true,true).fadeIn('300').find('.close_popup').click(function(){jQuery('.popup_order').fadeOut('200');
			});
				jQuery('.popup_order').find('.content_popup').show();
				e.preventDefault();
			});

			jQuery(".register_banner .container>.col-sm-4:nth-child(1) .wrap_item_regis_banner").click(function(e){
				jQuery('.popup_visiter').stop(true,true).fadeIn('300').find('.close_popup').click(function(){jQuery('.popup_visiter').fadeOut('200');
			});
				jQuery('.popup_visiter').find('.content_popup').show();
				e.preventDefault();
			});

		jQuery(document).click(function(event) {
 		 //if you click on anything except the modal itself or the "open modal" link, close the modal
  		if (!jQuery(event.target).closest(`.content_popup, .btn_register, 
  			.register_banner .container>.col-sm-4:nth-child(2) .wrap_item_regis_banner,
  			.register_banner .container>.col-sm-4:nth-child(1) .wrap_item_regis_banner
  			`).length) {
  			jQuery("body").find(".content_popup").hide();
  				jQuery(".popup").fadeOut(300);
  			}
		});



});
