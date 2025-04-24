<?php 
/**
* @package WordPress 
* Template Name: トップ
*/
get_header()
?>
<main id="main">
  <section class="js-header-white is-anim-sec" id="fv">
    <div class="contents_inner">
      <p class="fv_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/fv_text.svg" alt="アルファード 保有数 日本交通グループ内 No.1" /></p>
      <div class="fv_player">
        <video class="video-js" id="video" poster="<?php echo get_template_directory_uri(); ?>/assets/img/top/thumbnail.webp" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline"></video>
      </div>
    </div>
  </section>
  <section class="is-anim-sec" id="intro">
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
  <section class="benefit is-anim-sec" id="benefit-1">
    <div class="benefit_inner"><span class="barlow benefit_label">BENEFIT 01</span>
      <h3 class="benefit_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-1-title-1.svg" alt="業界No.1日本交通グループ" /></h3>
      <figure class="benefit_img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-1-fig-1.jpg" /></figure>
      <p class="benefit_lead"><span class="gold">"桜にN"</span>を掲げ<br class="m-sm" />
        <spna class="gold">高品質</spna>を約束します
      </p>
      <p class="benefit_body">高品質なサービスを提供する日本交通の"桜にN"を掲げ、タクシーでありながらハイヤーと同等のサービスを提供し続けています。</p>
    </div>
  </section>
  <section class="benefit is-anim-sec" id="benefit-2">
    <div class="benefit_inner"><span class="barlow benefit_label">BENEFIT 02</span>
      <h3 class="benefit_title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-2-title-1.svg" alt="アルファード保有数日本交通グループ内No.1" /></h3>
      <figure class="benefit_img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/benefit-2-fig-1.jpg" /></figure>
      <p class="benefit_lead">移動にほんの少しの<span class="gold">贅沢感</span>を</p>
      <p class="benefit_body">100%アプリ配車による上質な送迎サービスを提供。おもてなしとは何かを追求し続け「質で日本一」を目指します！</p><a class="m-btn-1 __black benefit_btn" href="<?php echo esc_url( home_url( "/" ) ); ?>about/"><span class="m-btn-1__arrow"><span></span></span><span class="m-btn-1__text">ハロートーキョーについて</span></a>
    </div>
  </section>
  <section class="is-anim-sec" id="concept">
    <div class="concept_inner">
      <h3 class="concept_title"><span class="title-1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept-title-1.svg" alt="タクシー" /></span><span class="title-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept-title-2.svg" alt="" /></span><span class="title-3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept-title-3.svg" alt="モビリティビジネス" /></span></h3>
      <p class="concept_body">日本交通グループの一員として高品質な移動サービスを追求するハロートーキョーでは、正社員募集はもちろん、アルバイト・副業募集も積極的に展開中。新時代のモビリティビジネスを共に創り上げましょう。</p>
    </div>
  </section>
  <section class="is-anim-sec" id="recruit">
    <div class="recruit_item employee">
      <div class="recruit_item_inner"><span class="recruit_icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/recruit-1-icon-1.png" /></span>
        <h3 class="recruit_title">正社員募集</h3>
        <p class="recruit_body">ラグジュアリー路線をひた走るハロートーキョーで、乗り心地抜群のアルファードに乗務するドライバーとして、安定と安心を手に入れてみませんか？業界TOPクラスの給与水準を用意し、挑戦をお待ちしています。</p><a class="m-btn-1 recruit_btn" href="<?php echo esc_url( home_url( "/" ) ); ?>employee/"><span class="m-btn-1__arrow"><span></span></span><span class="m-btn-1__text">詳しく見る</span></a>
      </div>
    </div>
    <div class="recruit_item parttime">
      <div class="recruit_item_inner"><span class="recruit_icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/recruit-2-icon-1.png" /></span>
        <h3 class="recruit_title">アルバイト・副業</h3>
        <p class="recruit_body">『GO Reserve』のフラッグシップ企業であるハロートーキョーでは、ライフスタイルや本業の「スキマ時間」が活用できる新しい働き方として、アプリ専用車両のドライバー『GO Crew』の募集も行っています。</p><a class="m-btn-1 recruit_btn" href="<?php echo esc_url( home_url( "/" ) ); ?>parttime/"><span class="m-btn-1__arrow"><span></span></span><span class="m-btn-1__text">詳しく見る</span></a>
      </div>
    </div>
  </section>
  <section class="is-anim-sec" id="voice">
    <div class="voice_inner">
      <h3 class="voice_title"><span class="ja">ドライバーの声</span><span class="en barlow">VOICE</span><span class="line"></span></h3>
      <p class="voice_lead">ドライバーたちのリアルな日常</p>
      <p class="voice_body">100%日々業務に取り組むドライバーたちに、仕事の面白みや、ハロートーキョーの魅力などを語ってもらいました！</p><a class="m-btn-1 voice_btn" href="<?php echo esc_url( home_url( "/" ) ); ?>voice/"><span class="m-btn-1__arrow"><span></span></span><span class="m-btn-1__text">ドライバーの声一覧</span></a>
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
  <section class="is-anim-sec" id="top_information">
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