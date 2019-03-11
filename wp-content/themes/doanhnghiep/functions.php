<?php
include get_template_directory().'/includes/admin/function-admin.php';
function zingvn_resources(){
	wp_enqueue_style ('style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts','zingvn_resources');

	// Navigation menus 
register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'menu_mobile' => __('Mobile Menu')
));

	// Get top ancestor id
function get_top_ancestor_id(){
	global $post;
	if($post->post_parent){
		$ancestors= array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}	
	return $post->ID;
}

	// Does page have children ? 
function has_children(){
	global $post;
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
}

	// Customize excerpt word count length
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

	// ADD FEATURED IMAGE SUPPORT
function featured_images_setup(){
	add_theme_support('post-thumbnails');
  add_image_size( 'thumbnail',300, 250, true ); //thumbnail
    add_image_size( 'medium', 600, 400, true ); //medium
    add_image_size( 'large', 1200, 800, true ); //large
}
add_action('after_setup_theme','featured_images_setup');

	// ADD POST FORMAT SUPPORT
add_theme_support('post-formats',array('aside','gallery','link'));

	// ADD OUR WIDGETS LOCATION
function our_widget_inits(){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget_area">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer area 1',
		'id' => 'footer1',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer area 2',
		'id' => 'footer2',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

  register_sidebar(array(
    'name' => 'Footer area 1 EN',
    'id' => 'footer_1_en',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Footer area 2 EN',
    'id' => 'footer_2_en',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

}
add_action('widgets_init','our_widget_inits');




/** Filter & Hook In Widget Before Post Content .*/
function before_post_widget() {


	if ( is_home() && is_active_sidebar( 'sidebar1' ) ) { 
		dynamic_sidebar('sidebar1', array(
			'before' => '<div class="before-post">',
			'after' => '</div>',
		) );      
	}

}

add_action( 'woo_loop_before', 'before_post_widget' );


// ADD THEME CUSTOM LOGO
add_theme_support( 'custom-logo' );


//  ADD BREADCRUMB
  function the_breadcrumb() {
 
  if (!is_front_page()) {
    echo '<li><a href="';
    echo home_url();
    echo '">';
    if(get_locale() == 'en_US'){
    echo 'Home ';
    }
    else{
      echo 'Trang chủ';
    }
    echo "</a><li>";
    if (is_category() || is_single()) {
      echo '';
      the_category(' ');
      if (is_single()) {
        echo "<li>";
        the_title();
        echo '</li>';
      }
    } elseif (is_page()) {
      echo '';
      echo the_title();
      echo '';
    } elseif (is_home()) {
      echo wp_title('');
    }
  }
  elseif (is_tag()) {single_tag_title();}
  elseif (is_day()) {echo"Archive for "; the_time('F jS, Y'); echo'';}
  elseif (is_month()) {echo"Archive for "; the_time('F, Y'); echo'';}
  elseif (is_year()) {echo"Archive for "; the_time('Y'); echo'';}
  elseif (is_author()) {echo"Author Archive"; echo'';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives"; echo'';}
  elseif (is_search()) {echo"Search Results"; echo'';}
 
}
//  END BREADCRUMB

/*
 *  DUPLICATE POST IN  ADMIN. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Nhân bản</a>';
  }
  return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

// duplicate page
//add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);


/**
 * URL SITE
 */
define('BASE_URL', get_site_url('null','/wp-content/themes/doanhnghiep', 'http'));




// PRIOTITY SINGLE-PRODUCT THAN SINGLE.PHP
function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}


 


// ADD BUTTON ADD TO CARD AJAX
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );



// REMOVE WOOCOMERCE SHIPPING FIELDS
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');





// REMOVE CSS WP_HEAD
//xoa header

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

add_action( 'woocommerce_product_thumbnails', 'bbloomer_custom_action', 10 );
 
function bbloomer_custom_action() {
echo 'TEST';
}

// CHANGE EDITOR TO OLD VERSION
add_filter('use_block_editor_for_post', '__return_false');


// HIDE UPDATE PLUGIN
function filter_plugin_updates( $value ) {
    unset( $value->response['siteorigin-panels/siteorigin-panels.php'] );
    unset( $value->response['black-studio-tinymce-widget/black-studio-tinymce-widget.php'] );
    unset( $value->response['regenerate-thumbnails/regenerate-thumbnails.php'] );
    unset( $value->response['sassy-social-share/sassy-social-share.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );


// ADD FIGURE TAG FOR IMG POST    
function fb_unautop_4_img( $content )
{ 
    $content = preg_replace( 
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', 
        '<figure>$1</figure>', 
        $content 
    ); 
    return $content; 
} 
add_filter( 'the_content', 'fb_unautop_4_img', 99 );




/**
 * ADD INPUT ADD CLASS TO WIDGET
 *
 */
function kc_widget_form_extend( $instance, $widget ) {
  if ( !isset($instance['classes']) )
    $instance['classes'] = null;

    $row .= "Class:\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][classes]' id='widget-{$widget->id_base}-{$widget->number}-classes' class='widefat' value='{$instance['classes']}'/>\n";
    $row .= "</p>\n";

    echo $row;
  return $instance;
}
add_filter('widget_form_callback', 'kc_widget_form_extend', 10, 2);function kc_widget_update( $instance, $new_instance ) {
  $instance['classes'] = $new_instance['classes'];
return $instance;
}
add_filter( 'widget_update_callback', 'kc_widget_update', 10, 2 );
function kc_dynamic_sidebar_params( $params ) {
  global $wp_registered_widgets;
  $widget_id    = $params[0]['widget_id'];
  $widget_obj    = $wp_registered_widgets[$widget_id];
  $widget_opt    = get_option($widget_obj['callback'][0]->option_name);
  $widget_num    = $widget_obj['params'][0]['number'];

  if ( isset($widget_opt[$widget_num]['classes']) && !empty($widget_opt[$widget_num]['classes']) )
    $params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$widget_opt[$widget_num]['classes']} ", $params[0]['before_widget'], 1 );
  return $params;
}
add_filter( 'dynamic_sidebar_params', 'kc_dynamic_sidebar_params' );


//SHOW POST COUNT VIEWS 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
        return "1";
    }
    return $count.'';
}
// END SHOW POST COUNT VIEWS

?>





