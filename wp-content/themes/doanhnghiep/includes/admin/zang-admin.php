<div class="zang_sidebar_option  tg_ct_right_admin">
	<?php settings_errors(); ?>
	<?php 
	$day_start = esc_attr(get_option('days_event'));
	$day_end = esc_attr(get_option('day_start'));

	?>

	<form method="post" action="options.php" class="zang-general-form"> 
		<?php settings_fields('zang-settings-groups'); ?>
		<?php do_settings_sections('template_admin_zang');  ?>
		<?php submit_button('Save Changes','primary','btnSubmit'); ?>
	</form>

</div>

