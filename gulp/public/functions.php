<?php


//*******************************************
//      カスタム設定
//*******************************************

// // カスタム投稿タイプ
// require get_template_directory() . '/function/customPost.php';

// // エディター関連
require get_template_directory() . '/function/editor.php';

// // ループ （pre_get_posts）
// require get_template_directory() . '/function/pre_get_posts.php';

// // ページャー
// require get_template_directory() . '/function/pagination.php';

// // WP MW FORM
require get_template_directory() . '/function/validation.php';

//// ページャー
require get_template_directory() . '/function/pagination.php';


// // ACF
// require get_template_directory() . '/function/acf_options.php';


// // //==================================================================================================
// // // ▼▼▼ 自動更新を停止 ▼▼▼
// // //==================================================================================================

add_filter( 'allow_minor_auto_core_updates', '__return_true' );
add_filter( 'allow_major_auto_core_updates', '__return_false' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'auto_update_plugin', '__return_false' );



// //==================================================================================================
// // ▼▼▼ 不要な記述を削除 ▼▼▼
// //==================================================================================================


// head meta 削除
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );

function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );




// 絵文字 削除
function disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );
add_filter( 'emoji_svg_url', '__return_false' );



// Embed 削除
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');



function dequeue_plugins_style() {
	if ( is_home() || is_front_page() ) {
		wp_dequeue_style( array('wp-block-library','wp-block-library-theme') );
	}
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 100 );




function is_parent_slug() {
	global $post;
	if($post !== null &&!is_archive()){
		if ($post->post_parent !== null) {
			$post_data = get_post($post->post_parent);
			return $post_data->post_name;
		}
	}
}

function is_subpage() {
	global $post;

	if (is_page() && $post->post_parent) {
		return true;
	} else {
		return false;
	};
};



function my_remove_post_support() {
	unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
}
add_action('init','my_remove_post_support');


add_filter( 'use_block_editor_for_post_type', 'disable_block_editor', 10, 2 );
function disable_block_editor( $use_block_editor, $post_type ) {
	if ( $post_type === 'job' ) return false;
	return $use_block_editor;
}

// 投稿のアーカイブページを作成する
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'post'; //任意のスラッグ名　←アーカイブページを有効に
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


// カテゴリ選択欄の階層保持
function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
	$args['checked_ontop'] = false;
	return $args;
}
add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );




//--
//  body_class 整理
//----------------------------------------------------

function custom_body_class($slug) {
	if ( is_singular() ) {
		$post_type = get_query_var( 'post_type' );
		if ( is_page() ) {
			$post_type = 'page';
		}
		if ( $post_type && is_post_type_hierarchical( $post_type ) ) {
			global $post;
			$slug[] = esc_attr( $post->post_name );
			if ( $post->ancestors ) {
				$root = $post->ancestors[count($post->ancestors) - 1];
				$root_post = get_post( $root );
				$slug[] = esc_attr( $root_post->post_name );
			}
		}
	}
	return $slug;
}
add_filter('body_class','custom_body_class');



//--
//  投稿画面
//----------------------------------------------------

//  アイキャッチ画像を有効
add_theme_support( 'post-thumbnails' );

// add_image_size('xl', 910, 400, true);
// add_image_size('staff_thumbnail', 150, 150, true);

add_action('init', function() {
	remove_image_size('1536x1536');
	remove_image_size('2048x2048');
	remove_image_size('large');
});

add_image_size('gallery_thumbnail', 150, 150, true);


add_filter( 'big_image_size_threshold', '__return_false' );


function add_posts_columns($columns) {
	$columns['thumbnail'] = 'アイキャッチ';
	return $columns;
}
function add_posts_columns_row($column_name, $post_id) {
	if ( 'thumbnail' == $column_name ) {
		$thumb = get_the_post_thumbnail($post_id, array(100,100), 'thumbnail');
		echo ( $thumb ) ? $thumb : '－';
	}
}
add_filter( 'manage_posts_columns', 'add_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 10, 2 );




//--
//  画像の圧縮率
//----------------------------------------------------

add_filter( 'jpeg_quality', function( $arg ){ return 100; } );



// add_image_size('thumbnail_l', 830, 350, true);

add_filter('redirect_canonical','my_disable_redirect_canonical');
function my_disable_redirect_canonical( $redirect_url ) {
	if ( is_archive() ){
		$subject = $redirect_url;
		$pattern = '/\/page\//'; // URLに「/page/」があるかチェック
		preg_match($pattern, $subject, $matches);

		if ($matches || is_search()){
			//リクエストURLに「/page/」があれば、リダイレクトしない。
			$redirect_url = false;
			return $redirect_url;
		}
	}
}



// --
//  JQuery 読み込まない
// ----------------------------------------------------

function my_delete_local_jquery() {
	// wp_deregister_script('jquery');
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1');
}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

// function my_delete_local_jquery() {
// 	wp_deregister_script('jquery');
// }
// add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );


// [公式] EWWW Image OptimizerのPNG→JPG自動変換を無効化する
define( 'EWWW_IMAGE_OPTIMIZER_DISABLE_AUTOCONVERT', true );


// 外観メニュー
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}







// //==================================================================================================
// // ▼▼▼ 検索をpost_typeによって切り替え ▼▼▼
// //==================================================================================================

add_filter('template_include','custom_search_template');
function custom_search_template($template){
  if ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
    $templates[] = "search-{$post_type}.php";
    $templates[] = 'search.php';
    $template = get_query_template('search',$templates);
  }
  return $template;
}



function empty_search( $query ) {
    if ( $query->is_main_query() && $query->is_search && ! $query->is_admin ) {
      $s = $query->get( 's' );
      $s = str_replace('　',' ', $s );
      $query->set( 's', $s );
    }
}
add_action( 'pre_get_posts', 'empty_search' );




// --
//  404 redirect
// ----------------------------------------------------

// function is404_redirect() {
//     if ( is_404() ) {
//         wp_safe_redirect( home_url( '/' ), 301 );
//         exit();
//     }
// }

// add_action( 'template_redirect', 'is404_redirect' );

function is_mobile(){
	$useragents = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android.*Mobile', // 1.5+ Android *** Only mobile
		'Windows.*Phone', // *** Windows Phone
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
	);
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}



?>