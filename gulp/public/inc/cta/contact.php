<section class="ft_contact">
	<div class="contents_inner">
		<div class="ft_contact_content">
			<div class="ft_contact_title">
				<p class="en _poppins"><span class="first">C</span>ONTACT</p>
				<h2 class="ja">お問い合わせ</h2>
			</div>
			<div class="ft_contact_intro">
				<?php if(is_page('parttime')): ?>
					<p class="intro_text">GO Crewへの応募を検討中の方は<br>お気軽にお問合せください。</p>
				<?php elseif(is_page('employee')): ?>
					<p class="intro_text">ハイグレードドライバーへの応募を<br>検討中の方はお気軽にお問合せください。</p>
				<?php else: ?>
					<p class="intro_text">ハロートーキョーへのご応募を<br>検討中の方はお気軽にお問合せください。</p>
				<?php endif; ?>
				<?php if(is_page('parttime')): ?>
					<p class="tel"><a class="_poppins" href="tel:0366663160">TEL <span>03-6666-3160</span></a></p>
				<?php else: ?>
					<p class="tel"><a class="_poppins" href="tel:0368087751">TEL <span>03-6808-7751</span></a></p>
				<?php endif; ?>
				<div class="btn_area">
					<a class="btn_standard _white" href="<?php echo esc_url( home_url( '/' ) ); ?>contact/">
						<span class="arrow undefined"><span></span></span><span class="text">お問合せフォーム</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>