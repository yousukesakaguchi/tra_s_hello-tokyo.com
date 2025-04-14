<?php

//--
//   固定ページでPHP読み込み
//----------------------------------------------------

//ここから
//ショートコードを使ったphpファイルの呼び出し方法
function Include_my_php($params = array()) {
  extract(shortcode_atts(array(
      'file' => 'default'
  ), $params));
  ob_start();
  include(get_theme_root() . '/' . get_template() . "/inc/parts/$file.php");
  return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');

//--
//   固定ページでビジュアルエディタを無効
//----------------------------------------------------

//Gutenbergを使用しないページを指定
add_filter('use_block_editor_for_post_type', 'hide_block_editor', 10, 10);
function hide_block_editor($use_block_editor, $post_type)
{
    if ($post_type === 'page') return false; //固定ページ
    if ($post_type === 'main_bnr') return false; //投稿タイプ「main_bnr」
    return $use_block_editor;
}

function disable_visual_editor_in_page(){
    global $typenow;
    if( $typenow == 'page' ){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    } elseif($typenow == 'mw-wp-form'){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    } elseif($typenow == 'wpcf7'){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}
function disable_visual_editor_filter(){
    return false;
}

add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );




//TinyMCE追加用のスタイルを初期化
function custom_editor_settings( $initArray ){
 // WordPress3くらい
 //$initArray['theme_advanced_blockformats'] = 'p,address,pre,code,h3,h4,h5,h6';
 // WordPress4から
 $initArray['block_formats'] = "見出し1=h2;見出し2=h3;見出し3=h4;見出し4=h5;見出し5=h6;";
 return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


function origin_tinymce($initList) {
  $formats = array(
    array(
     'title' => 'ボタン（大）',
     'inline' => 'a',
     'classes' => 'btn_style01',
     'attributes' => array(
        'href' => 'https://sample.net'
      )
    ),
    array(
     'title' => 'ボタン（小）',
     'inline' => 'a',
     'classes' => 'min_btn',
     'attributes' => array(
        'href' => 'https://sample.net'
      )
    ),
    array(
     'title' => 'ボタン（PDF）',
     'inline' => 'a',
     'classes' => 'pdf_btn',
     'attributes' => array(
        'href' => 'https://sample.net'
      )
    ),
    array(
     'title' => 'テキストグループ',
     'block' => 'div',
     'classes' => 'textbox',
    ),
    array(
     'title' => '横並びブロック（画像左）',
     'block' => 'div',
     'classes' => 'col_layout_w300',
    ),
    array(
     'title' => '横並びブロック（画像右）',
     'block' => 'div',
     'classes' => 'col_layout_w300_reverse',
    ),
  );
  $initList['style_formats'] = json_encode($formats);
  return $initList;
}
//TinyMCE Advancedより後に実行されるように、フック番号を明示指定する
add_filter('tiny_mce_before_init', 'origin_tinymce', 30000);



function my_h_style() {
  echo '<style>
  .components-dropdown-menu__menu button:nth-child(1),.components-dropdown-menu__menu button:nth-child(5),
  .components-dropdown-menu__menu button:nth-child(6)
{
    display: none;
}
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_h_style');

//--
//   Pタグ自動生成削除
//----------------------------------------------------

add_action('init', function() {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
});

add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
    global $post;
    $remove_filter = false;

    $arr_types = array('page','wpcf7'); //自動整形を無効にする投稿タイプを記述
    $post_type = get_post_type( $post->ID );
    if (in_array($post_type, $arr_types)) $remove_filter = true;

    if ( $remove_filter ) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }

    return $content;
}


add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');

function wpcf7_autop_return_false() {
  return false;
}


function wpautop_filter_sekou($content) {
    global $post;
    $remove_filter = false;
    $arr_types = array('sekou'); //適用させる投稿タイプを指定
    $post_type = get_post_type( $post->ID );
    if (in_array($post_type, $arr_types)) $remove_filter = true;
    if ( $remove_filter ) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
        remove_filter ('acf_the_content', 'wpautop');
    }
    return $content;
}

add_filter('the_content', 'wpautop_filter_sekou', 9);
add_filter('acf_the_content', 'wpautop_filter_sekou', 9);



//--
//   テキストエディタに改行タグを追加
//----------------------------------------------------

function themes_add_quicktags () {
 if ( wp_script_is( 'quicktags' ) ) {
 $html  = '<script>';
 $html .= 'QTags.addButton( "eg_paragraph", "改行", "<br>","", "br", "Paragraph tag", 1 );';
 $html .= '</script>';

 echo $html;
 }
}
add_action( 'admin_print_footer_scripts', 'themes_add_quicktags' );


//--
//   テンプレートパス置換
//----------------------------------------------------

function replaceImagePath($arg) {
    $template_directory = get_bloginfo('template_directory');
    $content = preg_replace('/(\.\.\/)+assets\/img\//', $template_directory . '/assets/img/', $arg);
    return $content;
}
add_action('the_content', 'replaceImagePath');


function replacePDFPath($arg) {
    $template_directory = get_bloginfo('template_directory');
    $content = preg_replace('/(\.\.\/)+assets\/pdf\//', $template_directory . '/assets/pdf/', $arg);
    return $content;
}
add_action('the_content', 'replacePDFPath');


function replacemoviePath($arg) {
    $template_directory = get_bloginfo('template_directory');
    $content = preg_replace('/(\.\.\/)+assets\/movie\//', $template_directory . '/assets/movie/', $arg);
    return $content;
}
add_action('the_content', 'replacemoviePath');




function replaceImagePath2($arg) {
    $content = str_replace('./assets/img/', '' . get_bloginfo('template_directory') . '/assets/img/', $arg);
    return $content;
}
add_action('the_content', 'replaceImagePath2');


function replacePdfPath2($arg) {
    $content = str_replace('./assets/pdf/', '' . get_bloginfo('template_directory') . '/assets/pdf/', $arg);
    return $content;
}
add_action('the_content', 'replacePdfPath2');


function replacemoviePath2($arg) {
    $content = str_replace('./assets/movie/', '' . get_bloginfo('template_directory') . '/assets/movie/', $arg);
    return $content;
}
add_action('the_content', 'replacemoviePath2');





//--
//   Gutenberg：文字サイズ設定
//----------------------------------------------------
add_theme_support( 'editor-font-sizes', array(
  array(
    'name'      => __( '小', 'themeLangDomain' ),
    'shortName' => __( '小', 'themeLangDomain' ),
    'size'      => 12,
    'slug'      => 'small',
  ),
  array(
    'name'      => __( '中', 'themeLangDomain' ),
    'shortName' => __( '中', 'themeLangDomain' ),
    'size'      => 15,
    'slug'      => 'medium',
  ),
  array(
    'name'      => __( '大', 'themeLangDomain' ),
    'shortName' => __( '大', 'themeLangDomain' ),
    'size'      => 16,
    'slug'      => 'large',
  ),
) );

// --
//   Gutenberg：カスタム文字サイズ削除
// ----------------------------------------------------

add_theme_support( 'disable-custom-font-sizes' );

// --
//   Gutenberg：独自 css 読み込み
// ----------------------------------------------------

add_editor_style( 'editor-style.css' );
add_theme_support( 'editor-styles' );

function add_block_editor_styles() {
    wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );



function add_admin_style(){
    $path_css = get_template_directory_uri().'/wp_admin.css';
    wp_enqueue_style('admin_style', $path_css);
    // $path_js = get_template_directory_uri().'/assets/js/admin.js';
    // wp_enqueue_script('admin_script', $path_js);
}
add_action('admin_enqueue_scripts', 'add_admin_style');



/* エディタースタイルのキャッシュクリア */
function extend_tiny_mce_before_init($mce_init){
    $mce_init['cache_suffix']='v='.time();
    return $mce_init;
}
add_filter('tiny_mce_before_init','extend_tiny_mce_before_init');


//--
//   Gutenberg：デフォルトのブロックエディタースタイルを有効化
//----------------------------------------------------

add_theme_support( 'wp-block-styles' );

//--
//   Gutenberg：ブロックパターンの削除
//----------------------------------------------------

// add_action( 'allowed_block_types_all', 'remove_default_block_pattern' );
// function remove_default_block_pattern() {
//   $patterns = [
//     'core/two-buttons',                  // 2ボタン
//     'core/three-buttons',                // 3つのボタン
//     'core/text-two-columns',             // 2カラムのテキスト
//     'core/text-two-columns-with-images', // 画像を含む2カラムのテキスト
//     'core/text-three-columns-buttons',   // ボタンを含む3カラムのテキスト
//     'core/two-images',                   // 2つ並べて表示された画像
//     'core/large-header',                 // 見出しを含む大きなヘッダー
//     'core/large-header-button',          // 見出しとボタンを含む大きなヘッダー
//     'core/heading-paragraph',            // 見出しと段落
//     'core/quote',                        // 引用
//   ];
//   foreach ( $patterns as $pattern ) {
//     unregister_block_pattern( $pattern );
//   }
// }

//--
//   Gutenberg：ブロックの機能制限
//----------------------------------------------------
//
add_filter( 'allowed_block_types_all', 'custom_allowed_block_types' );
function custom_allowed_block_types( $allowed_block_types_all ) {
  $allowed_block_types_all = array(
    // テキスト
    'core/paragraph',           // 段落
    'core/heading',             // 見出し
    'core/list',                // リスト
    'core/list-item',
    'core/quote',               // 引用
    'core/code',                // ソースコード
    // 'core/freeform',            // クラシック
    'core/preformatted',        // 整形済み
    // 'core/pullquote',           // プルクオート
    'core/table',               // テーブル
    // 'core/verse',               // 詩

    // メディア
    'core/image',               // 画像
    'core/gallery',             // ギャラリー
    'core/audio',               // 音声
    'core/cover',               // カバー
    'core/file',                // ファイル
    'core/media-text',          // メディアと文章
    'core/video',               // 動画

    // デザイン
    'core/columns',             // カラム
    // 'core/more',                // 続きを読む
    // 'core/nextpage',            // ページ区切り
    'core/separator',           // 区切り
    'core/spacer',              // スペーサー
    'core/buttons',              // ボタン

    // ウィジェット
    'core/shortcode',           // ショートコード
    // 'core/archives',            // アーカイブ
    // 'core/categories',          // カテゴリー
    'core/html',                // カスタムHTML
    // 'core/latest-comments',     // 最新のコメント
    // 'core/latest-posts',        // 最新の記事

    // レイアウト要素


    // 埋め込み
    // 'core/embed',               // 埋め込み
    // 'core-embed/twitter',       // Twitter
    // 'core-embed/youtube',       // YouTube
    // 'core-embed/facebook',      // Facebook
    // 'core-embed/instagram',     // Instagram
    // 'core-embed/wordpress',     // WordPress
    // 'core-embed/soundcloud',    // SoundCloud
    // 'core-embed/spotify',       // Spotify
    // 'core-embed/flickr',        // Flickr
    // 'core-embed/vimeo',         // Viemo
    // 'core-embed/animoto',       // Animoto
    // 'core-embed/cloudup',       // Cloudup
    // 'core-embed/collegehumor',  // CollegeHumor
    // 'core-embed/dailymotion',   // Dailymotion
    // 'core-embed/funnyordie',    // Funny or Die
    // 'core-embed/hulu',          // Hulu
    // 'core-embed/imgur',         // Imgur
    // 'core-embed/issuu',         // Issuu
    // 'core-embed/kickstarter',   // Kickstarter
    // 'core-embed/meetup-com',    // Meetup.com
    // 'core-embed/mixcloud',      // Mixcloud
    // 'core-embed/photobucket',   // Photobucket
    // 'core-embed/polldaddy',     // Polldaddy
    // 'core-embed/reddit',        // Reddit
    // 'core-embed/reverbnation',  // ReverbNation
    // 'core-embed/screencast',    // Screencast
    // 'core-embed/scribd',        // Scribd
    // 'core-embed/slideshare',    // Slideshare
    // 'core-embed/smugmug',       // SmugMug
    // 'core-embed/speaker-deck',  // Speaker Deck
    // 'core-embed/ted',           // TED
    // 'core-embed/tumblr',        // Tumblr
    // 'core-embed/videopress',    // VideoPress
    // 'core-embed/wordpress-tv',  // WordPress.tv
    //
    'snow-monkey-blocks/balloon',
    // 再利用ブロック
    'core/block',               // 再利用ブロック
    'lazyblock/midashi',
    'lazyblock/price-table',
    'lazyblock/no-point-title',
    'lazyblock/point-title',
    'lazyblock/description',
    'lazyblock/profile',
    'lazyblock/blue-block',
    'lazyblock/case',
    'lazyblock/faq'
  );
  return $allowed_block_types_all;
}

function my_custom_lazyblock_handlebars_helper ( $handlebars ) {
  $handlebars->registerHelper( 'nl2br', function( $val ) {
    return nl2br($val);
  });
}
add_action( 'lzb/handlebars/object', 'my_custom_lazyblock_handlebars_helper' );


// function custom_editor_font() {
//   wp_enqueue_style( 'custom-editor-font', 'https://fonts.googleapis.com/css?family=Yusei+Magic&display=swap' );
// }
// add_action( 'enqueue_block_editor_assets', 'custom_editor_font' );

//--
//   editor-style.cssのキャッシュクリア
//----------------------------------------------------
// add_action( 'enqueue_block_editor_assets', 'add_block_editor_style' );
// function add_block_editor_style() {
//   wp_enqueue_style( 'block-editor-style', get_theme_file_uri( 'editor-style.css' ) );
// }
?>
