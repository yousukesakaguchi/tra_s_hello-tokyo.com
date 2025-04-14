<?php get_header(); ?>


	<main id="main">

		<div id="fv">
			<div class="contents_inner">
				<p class="fv_title">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/fv_text.svg" alt="アルファード 保有数 日本交通グループ内 No.1">
				</p>
				<div class="fv_player">
					<video class="video-js" id="video" poster="<?php echo get_template_directory_uri(); ?>/assets/img/top/thumbnail.webp" autoplay loop muted playsinline></video>
				</div>
			</div>
		</div>


		<section id="top_group">
			<div class="contents_inner">
				<div class="top_group_content">
					<div class="top_group_intro">
						<h2 class="title"><span>“桜にN”を掲げ<br>高品質を約束します</span></h2>
						<div class="intro">
							<p class="intro_text">高品質なサービスを提供する日本交通の“桜にN”を掲げ、タクシーでありながらハイヤーと同等のサービスを提供し続けています。</p>
						</div>
					</div>
					<div class="top_group_img">
						<div class="front_line">
							<div class="front"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_fronttext.svg" alt="業界No.1の"></div>
							<div class="line">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_line.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_line.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/top/group_line@2x.webp 2x" width="835" height="296" alt="">
							</div>
						</div>
						<div class="textbox">
							<div class="_fig"></div>
							<div class="text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_text.svg" alt="日本交通グループ"></div>
							<div class="car">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_car.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/group_car.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/top/group_car@2x.webp 2x" width="380" height="340" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="top_alphard">
			<div class="contents_inner">
				<div class="top_alphard_content">
					<div class="top_alphard_intro">
						<h2 class="title"><span>移動にほんの少しの<br>贅沢感を</span></h2>
						<div class="intro">
							<p class="intro_text">100%アプリ配車による上質な送迎サービスを提供。おもてなしとは何かを追求し続け「質で日本一」を目指します！</p>
						</div>
						<div class="btn_area">
							<a class="btn_standard" href="<?php echo esc_url( home_url( '/' ) ); ?>about/">
								<span class="arrow undefined"><span></span></span><span class="text">ハロートーキョーについて</span>
							</a>
						</div>
					</div>
					<div class="top_alphard_img">
						<div class="_fig"></div>
						<div class="imgbox">
							<div class="bgtext">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/alphard_bgtext.svg" alt="ALPHARD">
							</div>
							<div class="img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/alphard_img.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/alphard_img.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/top/alphard_img@2x.webp 2x" width="575" height="232" alt="">
							</div>
						</div>
						<div class="title">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/alphard_text.svg" alt="アルファード保有数 日本交通グループ内No.1">
						</div>
					</div>
				</div>
			</div>
		</section>


		<section id="top_voice">
			<div class="contents_inner">
				<div class="top_voice_content">
					<div class="top_voice_intro">
						<h2 class="title"><span>ドライバーたちの<br>リアルな日常</span></h2>
						<div class="intro">
							<p class="intro_text">100%日々業務に取り組むドライバーたちに、仕事の面白みや、ハロートーキョーの魅力などを語ってもらいました！</p>
						</div>
						<div class="btn_area">
							<a class="btn_standard" href="<?php echo esc_url( home_url( '/' ) ); ?>voice/">
								<span class="arrow undefined"><span></span></span><span class="text">ドライバーの声を見る</span>
							</a>
						</div>
					</div>
					<div class="top_voice_img">
						<div class="_fig"></div>
						<div class="imgbox">
							<div class="bgtext">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/voice_bgtext.svg" alt="VOICE">
							</div>
							<div class="car">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/voice_img.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/voice_img.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/top/voice_img@2x.webp 2x" width="575" height="232" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<?php
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
				<div class="top_information_list">
					<?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<div class="top_information_item">
						<div class="img">
							<a href="<?php echo get_permalink(); ?>">
							<?php if(has_post_thumbnail()): ?>
								<img src="<?php echo the_post_thumbnail_url( 'thmbnail' ); ?>" alt="">
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg 1x, <?php echo get_template_directory_uri(); ?>/assets/img/news/dummy@2x.jpg 2x" width="260" height="160" alt="">
							<?php endif; ?>
							</a>
						</div>
						<div class="textbox">
							<p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
							<p class="title">
								<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
							</p>
						</div>
					</div>
					<?php endwhile;?>
				</div>
				<div class="btn_area">
					<a class="btn_standard" href="<?php echo esc_url( home_url( '/' ) ); ?>news/">
						<span class="arrow"><span></span></span><span class="text">一覧を見る</span>
					</a>
				</div>
			</div>
		</section>

		<?php endif; ?>


	</main>



<!-- ▲▲ CONTENTS END ▲▲ -->

<?php get_footer(); ?>
