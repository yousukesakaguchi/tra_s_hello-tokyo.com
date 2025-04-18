

	<?php if( is_page(array('about','voice','voice01','voice02','voice03', 'voice04', 'voice05'))|| is_404()): ?>
		<?php get_template_part('inc/cta/link_recruit'); ?>
	<?php endif; ?>

	<?php if( is_page(array('about'))|| is_404()): ?>
		<?php get_template_part('inc/cta/tel'); ?>
	<?php endif; ?>

	<?php if( is_page(array('about'))): ?>
		<?php get_template_part('inc/cta/company'); ?>
	<?php endif; ?>

	<?php if( is_404()): ?>
		<?php get_template_part('inc/cta/contact'); ?>
	<?php endif; ?>

	<?php if( is_home() || is_front_page() || is_page(array('walfare','voice','voice01','voice02','voice03', 'voice04', 'voice05'))|| is_404()): ?>
		<?php get_template_part('inc/cta'); ?>
	<?php endif; ?>

	<footer id="footer">
		<div class="contents_inner">
			<div class="f_content">
				<div class="f_nav">
					<ul class="f_nav_list">
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>about/"><span>ハロートーキョーについて</span></a>
						</li>
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>employee/"><span>正社員募集</span></a>
						</li>
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>parttime/"><span>アルバイト・副業</span></a>
						</li>
					</ul>
					<ul class="f_nav_list">
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>voice/"><span>ドライバーの声</span></a>
						</li>
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>walfare/"><span>研修制度／福利厚生</span></a>
						</li>
						<li class="f_nav_item">
							<a class="f_nav_item_link" href="<?php echo esc_url( home_url( '/' ) ); ?>news/"><span>お知らせ</span></a>
						</li>
					</ul>
					<ul class="f_nav_sublist">
						<li class="f_nav_subitem">
							<a class="f_nav_item_sublink" href="<?php echo esc_url( home_url( '/' ) ); ?>privacy/"><span>プライバシーポリシー</span></a>
						</li>
						<li class="f_nav_subitem">
							<a class="f_nav_item_sublink" href="<?php echo esc_url( home_url( '/' ) ); ?>site_policy/"><span>サイトポリシー</span></a>
						</li>
					</ul>
				</div>
				<div class="f_logo">
					<div class="logo">
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="HELLO TOKYO"></span>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js" charset="utf-8"></script>
<?php if( is_page('XXX')): ?>
<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php endif; ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/animation.js"></script>

<?php if( is_home() || is_front_page() || is_page(array('employee','parttime','walfare')) ): ?>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/common.min.js"></script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
