<?php 
/**
* @package WordPress 
* Template Name: アルバイト・副業
*/
get_header()
?>
<main class="parttime" id="main">
  <section class="js-header-white" id="kv">
    <div class="employee-kv_inner">
      <div id="employee-kv_title">
        <h1><span class="employee-kv_title-label">未経験者歓迎</span>
          <p class="employee-kv_title-text">[ ノルマなし ] &amp; [ 流し営業なし ] のハイグレードドライバーへ</p>
        </h1>
        <div class="kv-cross"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/employee/kv-cross-1.svg" /></div>
      </div>
      <h2 id="employee-kv_title-1">
        <picture>
          <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/employee/kv-title-1__sm.svg" /><img src="<?php echo get_template_directory_uri(); ?>/assets/img/employee/kv-title-1__md.svg" alt="高級 アルファード保有台数No.1" />
        </picture>
      </h2>
      <h2 id="employee-kv_title-2">
        <picture>
          <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/employee/kv-title-2__sm.svg" /><img src="<?php echo get_template_directory_uri(); ?>/assets/img/employee/kv-title-2__md.svg" alt="高給 独自の給与制度&amp;還元率" />
        </picture>
      </h2>
    </div>
    <div class="employee-kv_bg"></div>
  </section>
  <section class="js-header-white" id="employee_advantages">
    <div class="employee_advantages_inner">
      <div class="employee_head employee_advantages_head">
        <h3 class="ja">働くメリット</h3><span class="en barlow">ADVANTAGES</span><span class="line"></span>
      </div>
      <div class="employee_advantages_blk">
        <p class="employee_advantages_lead">最高級の車で<br />最上級の安定を</p>
        <div class="employee_advantages_text">
          <p class="employee_advantages_body">VIP送迎に強みを持つ事業者として独自路線の成長を遂げてきたハロートーキョーでは、<span class="gold">従来のタクシー会社に対するイメージを一新。</span></p>
          <p class="employee_advantages_body">100％アプリ配車でハイグレードな送迎サービスを提供する会社ならではのメリットがいくつもあります。</p>
        </div>
      </div>
      <ul class="employee_advantages_list">
        <li class="employee_advantages_item _item-1"><span class="label barlow"><span class="num">01</span><span class="point">POINT</span></span>
          <div class="employee_advantages_item_content"><span class="title">100％アプリ配車だから</span><span class="highlight">流し営業ゼロ</span></div>
        </li>
        <li class="employee_advantages_item _item-2"><span class="label barlow"><span class="num">02</span><span class="point">POINT</span></span>
          <div class="employee_advantages_item_content"><span class="title">自分らしく働ける</span><span class="highlight">ノルマ／集客なし</span></div>
        </li>
        <li class="employee_advantages_item _item-3"><span class="label barlow"><span class="num">03</span><span class="point">POINT</span></span>
          <div class="employee_advantages_item_content"><span class="title">しっかり休める</span><span class="highlight">年間休日209回以上</span></div>
        </li>
        <li class="employee_advantages_item _item-4"><span class="label barlow"><span class="num">04</span><span class="point">POINT</span></span>
          <div class="employee_advantages_item_content"><span class="title">保証給</span><span class="highlight">435万円／年</span><span class="note">※1年目</span></div>
        </li>
      </ul>
    </div>
  </section>
</main><?php get_footer(); ?>