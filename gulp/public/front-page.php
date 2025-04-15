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
  <section id="intro"></section><?php
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