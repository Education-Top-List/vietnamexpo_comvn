<?php
/* 
@package zangTheme
	=================
		ADMIN PAGE
	=================
*/
	function zang_add_admin_page(){
		// Generate zang admin page
		add_menu_page('zang Theme Option','ZQ Framework' , 'manage_options' , 'template_admin_zang', 'zang_theme_create_page', 	get_template_directory_uri() . '/images/setting_icon.png', 110);
		// Generate Sunset Admin Sub pages
		add_submenu_page('template_admin_zang', 'Custom Text Header','Custom Text Header', 'manage_options' , 'template_admin_zang', 'zang_theme_create_page');
		// Activate custom setttings
		add_action('admin_init', 'zang_custom_settings');
	}
	add_action('admin_menu', 'zang_add_admin_page');
	function zang_custom_settings(){
		// Sidebar Options
		register_setting('zang-settings-groups', 'days_event');
		register_setting('zang-settings-groups', 'day_start');
		

		add_settings_section('zang-sidebar-options','Chỉnh sửa ngày sự kiện','zang_sidebar_options','template_admin_zang');
		add_settings_field('address-hd','Khoảng thời gian sự kiện', 'zang_sidebar_daystart','template_admin_zang', 'zang-sidebar-options');
		add_settings_field('phone-hd','Ngày bắt đầu', 'zang_sidebar_dayend','template_admin_zang', 'zang-sidebar-options');
	}

	function zang_sidebar_options(){
		echo '';
	}

	function zang_sidebar_daystart(){
		$days_event = esc_attr(get_option('days_event'));
		echo '<input type="text" class="iptext_adm" name="days_event" value="'.$days_event.'" >';
	}
	function zang_sidebar_dayend(){
		$day_start = esc_attr(get_option('day_start'));
		echo '<input type="date" class="iptext_adm" name="day_start" value="'.$day_start.'" placeholder="" ';
	}

	

	function zang_theme_create_page(){
		require_once(get_template_directory().'/includes/admin/zang-admin.php');
	}

