<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.ico">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/common/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/common/apple-touch-icon.png" sizes="180x180">
	<meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/common/ogp.png" />

	<?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&amp;family=Noto+Sans+JP:wght@300;400;500;700&amp;family=Noto+Serif+JP:wght@400;700&amp;family=Barlow+Condensed:wght@700&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/base.css">
	<?php get_template_part('inc/css'); ?>

	<?php if( is_home() || is_front_page() || is_page(array('employee','parttime','walfare','voice','voice01','voice02','voice03', 'voice04', 'voice05')) ): ?>
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/new-style.css?v=<?php echo filemtime(get_template_directory() . "/css/new-style.css"); ?>">
	<?php endif; ?>

	<!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-PFLGRFND');</script>
    </script>
    <!-- End Google Tag Manager-->

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFLGRFND" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript)-->


	<div id="wrapper">

		<header id="header">
			<div class="h_container">
				<div class="h_head">
					<div class="h_logo">
						<div class="h_logo_img _top">
							<div class="symbol">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/symbol.svg" alt="">
							</div>
							<?php if(is_home()|| is_front_page()): ?>
								<h1 class="logo">
									<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="HELLO TOKYO"></span>
								</h1>
							<?php else: ?>
								<p class="logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="HELLO TOKYO"></a>
								</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div id="global_nav">
					<div class="global_nav_contents">
						<nav class="global_nav">
							<ul class="global_nav_list">
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>about/"><span>ハロートーキョーについて</span></a>
								</li>
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>employee/"><span>正社員募集</span></a>
								</li>
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>parttime/"><span>パートタイム・副業</span></a>
								</li>
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>voice/"><span>ドライバーの声</span></a>
								</li>
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>walfare/"><span>研修制度／福利厚生</span></a>
								</li>
								<li class="global_nav_item">
									<a class="global_nav_link" href="<?php echo esc_url( home_url( '/' ) ); ?>news/"><span>お知らせ</span></a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div id="global_nav_overlay"></div>
			</div>
			<div id="global_nav_btn">
				<div class="global_nav_border"></div>
				<p class="global_nav_text _poppins">MENU</p>
			</div>
		</header>


