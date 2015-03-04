<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup(){
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
	array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
	function blankslate_load_scripts(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-slider');
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );

function blankslate_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
	function blankslate_title( $title ) {
	if ( $title == '' ) {
	return '&rarr;';
	} else {
	return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
	function blankslate_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
	function blankslate_widgets_init()
{
register_sidebar( array (
	'name' => __( 'Sidebar Widget Area', 'blankslate' ),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
register_sidebar( array (
	'name' => __( 'Footer One Widget Area', 'blankslate' ),
	'id' => 'footer-col-1',
	'before_widget' => '<div class="col_footer col-md-4 col-sm-4">',
	'after_widget' => "</div>",
	'before_title' => '',
	'after_title' => '',
) );
register_sidebar( array (
	'name' => __( 'Footer Mobile Widget Area', 'blankslate' ),
	'id' => 'footer-col-2',
	'before_widget' => '<div class="row">',
	'after_widget' => "</div>",
	'before_title' => '',
	'after_title' => '',
) );
register_sidebar( array (
	'name' => __( 'Footer Three Widget Area', 'blankslate' ),
	'id' => 'footer-col-3',
	'before_widget' => '<div class="col_footer col-md-4 col-sm-4">',
	'after_widget' => "</div>",
	'before_title' => '',
	'after_title' => '',
) );
register_sidebar( array (
	'name' => __( 'Footer Four Widget Area', 'blankslate' ),
	'id' => 'footer-col-4', 
	'before_widget' => '<div class="col_footer col-md-4 col-sm-4">',
	'after_widget' => "</div>",
	'before_title' => '',
	'after_title' => '',
) );
}
function blankslate_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count ){
	if ( !is_admin() ) {
	global $id;
	$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
	return count( $comments_by_type['comment'] );
	} else {
	return $count;
	}
}

/*
* Creating a function to create our CPT
*/

function slider_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'lico' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'lico' ),
		'menu_name'           => __( 'Slider', 'lico' ),
		'parent_item_colon'   => __( 'Parent Slider', 'lico' ),
		'all_items'           => __( 'All Slider', 'lico' ),
		'view_item'           => __( 'View Slider', 'lico' ),
		'add_new_item'        => __( 'Add New Slider', 'lico' ),
		'add_new'             => __( 'Add New', 'lico' ),
		'edit_item'           => __( 'Edit Slider', 'lico' ),
		'update_item'         => __( 'Update Slider', 'lico' ),
		'search_items'        => __( 'Search Slider', 'lico' ),
		'not_found'           => __( 'Not Found', 'lico' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'lico' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'slider', 'lico' ),
		'description'         => __( 'Slider news and reviews', 'lico' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'slider', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'slider_post_type', 0 );
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
function be_image_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = parse_url( $img_url );
		$file_path = ltrim( $file_path['path'], '/' );
		//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
		
		$orig_size = getimagesize( $file_path );
		
		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	}
	
	$file_info = pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for crop = true but will also work for crop = false if the sizes match)
		if ( file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $new_img_size[0],
					'height' => $new_img_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cached files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop );
		$new_img_size = getimagesize( $new_img_path );
		$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

		// resized output
		$vt_image = array (
			'url' => $new_img,
			'width' => $new_img_size[0],
			'height' => $new_img_size[1]
		);
		
		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}


/**
 * Returns a dynamically resized image
 *
 * Example: be_get_post_thumbnail( $post->ID, 90, 90, true );
 *
 * @param int $post_id
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return string $image 
 */
function be_get_post_thumbnail( $post_id = '', $width = '', $height = '', $crop = false ) {
	$attach_id = get_post_thumbnail_id( $post_id );
	$image = be_image_resize( $attach_id, null, $width, $height, $crop );
	return '<img src="' . $image['url'] . '" />';
}