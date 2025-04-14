<?php get_header(); ?>


	<main id="main">

		<section id="notfound">
			<div class="contents_inner">
				<p class="main_text">404</p>
				<p class="sub_text">申し訳ございません。<br>ご指定のページは見つかりませんでした。</p>
				<div class="btn_area _reverse">
					<a class="btn_standard btnBack" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<span class="text">TOPページに戻る</span>
					</a>
				</div>
			</div>
		</section>

	</main>

<!-- ▲▲ CONTENTS END ▲▲ -->

<?php get_footer(); ?>
