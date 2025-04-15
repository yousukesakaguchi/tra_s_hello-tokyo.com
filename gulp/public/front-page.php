<?php 
/**
* @package WordPress 
* Template Name: トップ
*/
get_header()
?>
<main id="main">
  <section id="fv">
    <div class="contents_inner">
      <p class="fv_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/fv_text.svg" alt="アルファード 保有数 日本交通グループ内 No.1" /></p>
      <div class="fv_player">
        <video class="video-js" id="video" poster="<?php echo get_template_directory_uri(); ?>/assets/img/top/thumbnail.webp" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline"></video>
      </div>
    </div>
  </section>
  <section id="intro">
    <div class="intro-inner">
      <div class="intro_title"><span class="en barlow">HELLO TOKYO</span></div>
      <div class="lead-area">
        <p class="lead">ハロー、<br />想像以上</p>
        <div class="intro_text">
          <p class="text">タクシー業界最大手の日本交通グループに属する株式会社ハロートーキョーは、2003年の創業以来ずっとラグジュアリー路線を走り続けてきました。</p>
          <p class="text">近年は、GO株式会社とコラボした『Go Reserve』のフラッグシップ企業となり、想像以上の成長と進化、そして想像以上の「働き方」を実現しています。</p>
        </div>
      </div>
    </div>
  </section>
  <section class="benefit" id="benefit-1">
    <div class="benefit_inner"><span class="barlow benefit_label">BENEFIT 01</span>
      <h3 class="benefit_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-1-title-1.svg" alt="業界No.1日本交通グループ" /></h3>
      <figure class="benefit_img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-1-fig-1.jpg" /></figure>
      <p class="benefit_lead"><span class="gold">“桜にN”</span>を掲げ<br class="m-sm" />
        <spna class="gold">高品質</spna>を約束します
      </p>
      <p class="benefit_body">高品質なサービスを提供する日本交通の“桜にN”を掲げ、タクシーでありながらハイヤーと同等のサービスを提供し続けています。</p>
    </div>
  </section>
  <section class="benefit" id="benefit-2">
    <div class="benefit_inner"><span class="barlow benefit_label">BENEFIT 02</span>
      <h3 class="benefit_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-2-title-1.svg" alt="アルファード保有数日本交通グループ内No.1" /></h3>
      <figure class="benefit_img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-2-fig-1.jpg" /></figure>
      <p class="benefit_lead">移動にほんの少しの<span class="gold">贅沢感</span>を</p>
      <p class="benefit_body">100%アプリ配車による上質な送迎サービスを提供。おもてなしとは何かを追求し続け「質で日本一」を目指します！</p><a class="m-btn-1 __black benefit_btn" href="<?php echo esc_url( home_url( "/" ) ); ?>about/"><span class="m-btn-1__arrow"><span></span></span><span class="m-btn-1__text">ハロートーキョーについて</span></a>
    </div>
  </section><?php
  	$paged = (int) get_query_var('paged');
  	$args = array(
  		'post_type' => 'post',
  		'paged' => $paged,
  		'posts_per_page' => 3,
  	);
  	$the_query = new WP_Query( $args );
  
  	if( $the_query -> have_posts() ) :
  ?>
  <section id="top_information">
    <div class="contents_inner">
      <div class="top_information_title">
        <h2 class="en _poppins">INFORMATION</h2>
      </div>
      <div class="top_information_list"><?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
        <div class="top_information_item">
          <div class="img"><a href="<?php echo get_permalink(); ?>"><?php if(has_post_thumbnail()): ?><img src="<?php echo the_post_thumbnail_url( "thmbnail" ); ?>" alt="" /><?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg 1x, <?php echo get_template_directory_uri(); ?>/assets/img/news/dummy@2x.jpg 2x" width="260" height="160" alt="" /><?php endif; ?></a></div>
          <div class="textbox">
            <p class="date"><?php echo get_the_date("Y.m.d"); ?></p>
            <p class="title"><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></p>
          </div>
        </div><?php endwhile;?>
      </div>
      <div class="btn_area"><a class="btn_standard" href="<?php echo esc_url( home_url( "/" ) ); ?>news/"><span class="arrow"><span></span></span><span class="text">一覧を見る</span></a></div>
    </div>
  </section><?php endif; ?>
</main><?php get_footer(); ?>