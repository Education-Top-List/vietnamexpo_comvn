
<div class="scrolltop">
	<i class="fa fa-angle-up" aria-hidden="true"></i>	
</div>
<footer class="footer">
	<div class="container">
		<div class="host_patronize">
			<div class="row">
				<div class="col-sm-3">
					<div class="host_ft">
						<?php if(get_locale() == 'vi'){?>
							<h4>CHỦ TRÌ VÀ CHỈ ĐẠO</h4>
						<?php } ?>	
						<?php if(get_locale() == 'en_US'){?>
							<h4>HOSTS</h4>
						<?php } ?>	
						<ul>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/chutri1.png"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/chutri2.png"></figure></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="patronize">
						<?php if(get_locale() == 'vi'){?>
							<h4>BẢO TRỢ THÔNG TIN</h4>
						<?php } ?>	
						<?php if(get_locale() == 'en_US'){?>
							<h4>INFORMATION SPONSORS</h4>
						<?php } ?>	
						<ul>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro1.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro2.jpg"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro3.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro4.png"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro5.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro6.jpg"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro7.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro8.jpg"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro9.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro10.jpg"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro11.jpg"></figure></li><li><figure><img src="<?php echo BASE_URL; ?>/images/baotro12.jpg"></figure></li>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/baotro13.jpg"></figure></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="dvi_dtnn">
			<div class="row">
				<div class="col-sm-3">
					<div class="dvi">
						<?php if(get_locale() == 'vi'){?>
							<h4>ĐƠN VỊ TỔ CHỨC</h4>
						<?php } ?>	
						<?php if(get_locale() == 'en_US'){?>
							<h4>ORGANIZER</h4>
						<?php } ?>	
						<ul>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/dvitochuc1.png"></figure></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="dtnn">
						<?php if(get_locale() == 'vi'){?>
							<h4>ĐƠN VỊ TÀI TRỢ</h4>
						<?php } ?>	
						<?php if(get_locale() == 'en_US'){?>
							<h4>VIETNAMEXPO SPONSORS</h4>
						<?php } ?>	
						<ul>
							<li><figure><img src="<?php echo BASE_URL; ?>/images/dvitaitro1.png"></figure></li>
						</ul>
					</div>
				</div>
			</div>		
		</div>
		<div class="ft_custom">
			
			
			<?php if(get_locale() == 'vi'){?>
							<h3>Công ty Cổ phần Quảng cáo và Hội chợ Thương mại Vinexad</h3>
						<?php } ?>	
						<?php if(get_locale() == 'en_US'){?>
							<h3>VIETNAM NATIONAL TRADE FAIR & ADVERTISING COMPANY</h3>
						<?php } ?>	
			<div class="row">
				<?php if(is_active_sidebar('footer1')) :?>
					<?php if(get_locale() == 'vi'){?>
						<div class="footer-widget-area col-sm-6">
							<?php dynamic_sidebar('footer1'); ?>
						</div>
					<?php } ?>	
				<?php endif ?>	

				<?php if(is_active_sidebar('footer_1_en')) :?>
					<?php if(get_locale() == 'en_US'){?>
						<div class="footer-widget-area col-sm-6">
							<?php dynamic_sidebar('footer_1_en'); ?>
						</div>
					<?php } ?>	
				<?php endif ?>	

				<?php if(is_active_sidebar('footer2')) :?>
					<?php if(get_locale() == 'vi'){?>
						<div class="footer-widget-area col-sm-6">
							<?php dynamic_sidebar('footer2'); ?>
						</div>
					<?php } ?>	
				<?php endif ?>	
				
				<?php if(is_active_sidebar('footer_2_en')) :?>
					<?php if(get_locale() == 'en_US'){?>
						<div class="footer-widget-area col-sm-6">
							<?php dynamic_sidebar('footer_2_en'); ?>
						</div>
					<?php } ?>	
				<?php endif ?>	
			
				
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>


<script>      
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1953938748210615',
			xfbml      : true,
			version    : 'v2.6'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));      
</script>

<?php get_template_part('order_fixedf'); ?>
<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>

<div class="popup popup_search ">
	<div class="content_popup">
		<div class="search_header">
			<?php //get_search_form(); ?>
			<form action="" role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
				<div class="search">
					<input type="text" value="" name="s" id="s" placeholder="Tìm kiếm">
					<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
	</div>
	<div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>
</div>


<div class="popup popup_order">

	<div class="content_popup">

		<div class="wrap_content_p">
			<?php if(get_locale() == 'en_US'){?>
				<h2>BOOTH REGISTRATION</h2>
				<?php echo do_shortcode('[contact-form-7 id="233" title="BOOTH REGISTRATION"]'); ?>
			<?php }?>
			<?php if(get_locale() == 'vi'){?>
				<h2>Đăng ký gian hàng</h2>
				<?php echo do_shortcode('[contact-form-7 id="188" title="Form đăng ký gian hàng"]'); ?>
			<?php }?>
			<div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>
			
		</div>

	</div>
</div>


<div class="popup popup_visiter">
	<div class="content_popup">
		<div class="wrap_content_p">
			<?php if(get_locale() == 'vi'){?> 
				<h2>Đăng ký tham quan </h2>
				<?php echo do_shortcode('[contact-form-7 id="189" title="Đăng ký tham quan"]'); ?>
			<?php } ?>
			<?php if(get_locale() == 'en_US'){?> 
				<h2>REGISTRATION VISITORS </h2>
				<?php echo do_shortcode('[contact-form-7 id="234" title="REGISTRATION VISITORS"]'); ?>
			<?php } ?>
			
			<div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>

		</div>

	</div>
</div>

</body>
</html>