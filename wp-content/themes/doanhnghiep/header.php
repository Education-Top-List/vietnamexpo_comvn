<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/images/favicon.ico">

	<?php $url_site =  get_site_url('null','/wp-content/themes/doanhnghiep', 'http');  ?>
	<!-- css -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
	<?php wp_head(); ?>
	<meta property="fb:app_id" content="1953938748210615">
	<meta property="fb:app_admins" content="1993613924220223">
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=1953938748210615&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body <?php body_class() ?>>

	<div class="bg_opacity"></div>

	<?php if ( wp_is_mobile() ) { ?>
		<div id="menu_mobile_full">
			<nav class="mobile-menu">
				<p class="close_menu"><span><i class="fa fa-times" aria-hidden="true"></i></span></p>
				<?php 
				$args = array('theme_location' => 'menu_mobile');
				?>
				<?php wp_nav_menu($args);?>
			</nav>
		</div>
	<?php }?>

	<header class="header">
		<div class="banner">
			<div class="top_header">
				<div class="container">
					<div class="nav_logo">
						<div class="logo_text">
							<a href="<?php echo home_url(); ?>"><strong>VIETNAM</strong> EXPO </a>
						</div>
						<nav class="nav nav_primary">
						<?php 
						$args = array('theme_location' => 'primary');
						?>
						<?php wp_nav_menu($args); ?>
					</nav>
					</div>
					
					<div class="tg_language">
						<ul class="site-lang">
							<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
						</ul>
					</div>
				</div>
				<span class="icon_mobile_click" ><i class="fa fa-bars" aria-hidden="true"></i></span>
			</div>
			<?php if(is_front_page() && !is_home()){ ?>
			<div class="wrap_ct_header">
				<div class="col-sm-6">
					<div class="logo_site">
						<?php 
						if(has_custom_logo()){
							the_custom_logo();
						}
						else { ?> 
							<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
						<?php } ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="title_countdown">
						<?php if(get_locale() == 'en_US'){?> <h3>SAVE THE DATE!</h3>
					<?php }  else if(get_locale() == 'vi'){ ?><h3>Thời gian diễn ra sự kiện</h3> <?php } ?>
					
					<?php if(get_option('days_event')){ ?>
					<p><?php echo get_option('days_event'); ?></p>
					<?php }?>
					
					<?php if(get_option('day_start')){ ?>
					<span class="day_start"><?php echo get_option('day_start'); ?></span>
					<?php } ?>
				</div>
				<ul class="tg_countdown">
					<?php if(get_locale() == 'vi'){?> 
						<li><strong id="days"></strong><span>Ngày</span></li>
						<li><strong id="hours"></strong><span>Giờ</span></li>
						<li><strong id="minutes"></strong><span>Phút</span></li>
						<li><strong id="seconds"></strong><span>Giây</span></li>
					<?php }  else if(get_locale() == 'en_US'){ ?>
						<li><strong id="days"></strong><span>Days</span></li>
						<li><strong id="hours"></strong><span>Hours</span></li>
						<li><strong id="minutes"></strong><span>Minutes</span></li>
						<li><strong id="seconds"></strong><span>Seconds</span></li>
					<?php  } ?>
				</ul>
			</div>
		</div>
		<div class="register_banner">
			<div class="container">
				<div class="col-sm-4">
					<div class="wrap_item_regis_banner">
						<div class="textwidget">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							<?php if(get_locale() == 'en_US'){?> <h4>visitor pre registration</h4>
						<?php }  else if(get_locale() == 'vi'){ ?><h4>Đăng ký tham quan</h4> <?php } ?>
						<a href="#">Đăng ký tham quan</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="wrap_item_regis_banner">
					<div class="textwidget">
						<i class="fa fa-archive" aria-hidden="true"></i>
						<?php if(get_locale() == 'en_US'){?> <h4>Book a stand</h4>
					<?php }  else if(get_locale() == 'vi'){ ?><h4>Đăng ký gian hàng</h4> <?php } ?>
					<a href="#">Đăng ký gian hàng</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="wrap_item_regis_banner">
				<div class="textwidget">
					<i class="fa fa-cloud-download" aria-hidden="true"></i>
					<?php if(get_locale() == 'en_US'){?> 
						<h4>download brochure</h4>
						<a href="<?php echo home_url(); ?>/download-brochure/"></a>
					<?php }  else if(get_locale() == 'vi'){ ?>
						<h4>Tải xuống tài liệu</h4> 
						<a href="<?php echo home_url(); ?>/tai-lieu-trien-lam/"></a>
					<?php } ?>
				
			</div>
		</div>
	</div>
</div>
</div>
<?php }  ?>
	
</header>







