
<?php if ( is_front_page() || is_home() ) : ?>


<?php elseif( is_page('about')) : ?>
<div id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">A</span>BOUT</p>
				<h1 class="page_visual_title_ja">ハロートーキョーについて</h1>
			</div>
			<div class="page_visual_img">
				<div class="img">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/about/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/about/visual@2x.webp 2x" width="930" height="540" alt="">
				</div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('employee')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">R</span>ECRUIT</p>
				<h1 class="page_visual_title_ja">正社員募集</h1>
				<p class="page_visual_title_sub">100％アプリ配車で<br>ハイグレードな送迎サービス<br>を提供します</p>
			</div>
			<div class="page_visual_img">
				<div class="front">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/employee/visual_front.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/employee/visual_front.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/employee/visual_front@2x.webp 2x" width="980" height="400" alt="">
				</div>
				<div class="img">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/employee/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/employee/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/employee/visual@2x.webp 2x" width="930" height="540" alt="">
				</div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('parttime')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">R</span>ECRUIT</p>
				<h1 class="page_visual_title_ja">アルバイト・副業</h1>
				<p class="page_visual_title_sub">GOアプリ専用ドライバー<br>GO Crew</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img">
					<img class="sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual_sp.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual_sp.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual_sp@2x.webp 2x" width="645" height="674" alt="">
					<img class="pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/parttime/visual@2x.webp 2x" width="645" height="674" alt="">
				</div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('walfare')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">S</span>ystem</p>
				<h1 class="page_visual_title_ja">研修制度／福利厚生</h1>
				<p class="page_visual_title_sub">長く安心して働いてもらうため<br>環境面もハイグレードに</p>
				<div class="intro">
					<p class="intro_text">業界最大手グループの強みを活かして、充実した教育体制と福利厚生を整備しました。<br>一時的な高収入ではなく、安定、安心して働き続けられる環境をつくることこそが使命であると考えています。</p>
				</div>
			</div>
			<div class="page_visual_img w645">
				<div class="img">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/walfare/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/walfare/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/walfare/visual@2x.webp 2x" width="645" height="816" alt="">
				</div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('privacy')) : ?>
<div id="page_top">
	<div class="contents_inner">
		<div class="page_top_title_en _poppins">
			<p class="second_letter"><span class="first_letter">P</span>rivacy policy</p>
		</div>
		<h1 class="page_top_title_ja">プライバシーポリシー</h1>
	</div>
</div>


<?php elseif( is_page('site_policy')) : ?>
<div id="page_top">
	<div class="contents_inner">
		<div class="page_top_title_en _poppins">
			<p class="second_letter"><span class="first_letter">S</span>ite policy</p>
		</div>
		<h1 class="page_top_title_ja">サイトポリシー</h1>
	</div>
</div>


<?php elseif( is_page(array('contact','thanks'))) : ?>
<div id="page_top">
	<div class="contents_inner">
		<div class="page_top_title_en _poppins">
			<p class="second_letter"><span class="first_letter">C</span>ontact</p>
		</div>
		<h1 class="page_top_title_ja">お問い合わせ</h1>
	</div>
</div>


<?php elseif( is_page('voice')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">D</span>RIVER’S<span class="l2">VOICE</span></p>
				<p class="page_visual_title_sub _border">ドライバーの声</p>
			</div>
			<div class="page_visual_img w590">
				<div class="front"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual_front.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual_front.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual_front@2x.webp 2x" width="980" height="400" alt=""></div>
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/index/visual@2x.webp 2x" width="590" height="600" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('voice01')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">V</span>OICE<span class="num">01</span></p>
				<p class="page_visual_title_year _border">2023年入社</p>
				<p class="page_visual_title_name _border">O・M<span>さん</span></p>
				<!-- <p class="page_visual_title_ruby _border">OKITA MIU</p> -->
				<p class="page_visual_title_sub _border">自分もお客様も<br>気持ちよくなれるサービスを</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice01/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice01/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/voice01/visual@2x.webp 2x" width="645" height="816" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('voice02')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">V</span>OICE<span class="num">02</span></p>
				<p class="page_visual_title_year _border">2006年入社</p>
				<p class="page_visual_title_name _border">T・Y<span>さん</span></p>
				<!-- <p class="page_visual_title_ruby _border">TAKIYAMA YUJI</p> -->
				<p class="page_visual_title_sub _border">ドライバー歴が長いからこそ<br>感じる仕事の楽しさと<br>職場環境のよさ</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice02/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice02/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/voice02/visual@2x.webp 2x" width="645" height="816" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('voice03')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">V</span>OICE<span class="num">03</span></p>
				<p class="page_visual_title_year _border">2023年入社</p>
				<p class="page_visual_title_name _border">Y・T<span>さん</span></p>
				<!-- <p class="page_visual_title_ruby _border">YOKOGAWA TAKUMI</p> -->
				<p class="page_visual_title_sub _border">異なる行き先と新たな出会い<br>人も街も変化に富んだ充実の日々</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice03/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice03/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/voice03/visual@2x.webp 2x" width="645" height="816" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('voice04')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">V</span>OICE<span class="num">04</span></p>
				<p class="page_visual_title_year _border">2024年入社</p>
				<p class="page_visual_title_name _border">Y・M<span>さん</span></p>
				<!-- <p class="page_visual_title_ruby _border">YOKOGAWA TAKUMI</p> -->
				<p class="page_visual_title_sub _border">気軽に始めて見つけた、<br>
					ぴったりの仕事<br>
					GO Crew から<br>
					正社員にステップアップ</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice04/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice04/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/voice04/visual@2x.webp 2x" width="645" height="816" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>


<?php elseif( is_page('voice05')) : ?>
<div class="_high" id="page_visual">
	<div class="contents_inner">
		<div class="page_visual_content">
			<div class="page_visual_title">
				<p class="page_visual_title_en _poppins"><span class="first">V</span>OICE<span class="num">05</span></p>
				<p class="page_visual_title_year _border">2023年入社</p>
				<p class="page_visual_title_name _border">K・N<span>さん</span></p>
				<!-- <p class="page_visual_title_ruby _border">YOKOGAWA TAKUMI</p> -->
				<p class="page_visual_title_sub _border">オリンピック競技引退後<br>
					模索したセカンドキャリア</p>
			</div>
			<div class="page_visual_img w645">
				<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice05/visual.webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/voice/voice05/visual.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/img/voice/voice05/visual@2x.webp 2x" width="645" height="816" alt=""></div>
			</div>
		</div>
		<div class="page_visual_line"></div>
	</div>
</div>



<?php endif; ?>
