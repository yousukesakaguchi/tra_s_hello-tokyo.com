
<?php if ( is_front_page() || is_home() ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/top.css" media="print" onload="this.media='all'">

<?php elseif ( is_post_type_archive('post') || is_page(array('news')) || is_search() || is_category() ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/news/archive.css" media="print" onload="this.media='all'">

<?php elseif ( is_singular('post') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/news/single.css" media="print" onload="this.media='all'">

<?php elseif( is_page('about') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/about.css" media="print" onload="this.media='all'">

<?php elseif( is_page('employee') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/employee.css" media="print" onload="this.media='all'">

<?php elseif( is_page('parttime') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/parttime.css" media="print" onload="this.media='all'">

<?php elseif( is_page('walfare') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/walfare.css" media="print" onload="this.media='all'">

<?php elseif( is_page('privacy') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/privacy.css" media="print" onload="this.media='all'">

<?php elseif( is_page('site_policy') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/site_policy.css" media="print" onload="this.media='all'">

<?php elseif( is_page(array('contact','thanks')) ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/contact.css" media="print" onload="this.media='all'">

<?php elseif( is_page('voice') ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/voice/index.css?v=20250421" media="print" onload="this.media='all'">

<?php elseif( is_page(array('voice01','voice02','voice03','voice04','voice05')) ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/voice/single.css" media="print" onload="this.media='all'">


<?php elseif( is_404() ) : ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/notfound.css" media="print" onload="this.media='all'">

<?php endif; ?>
