<?php 
/**
* @package WordPress 
* Template Name: 制作実績 詳細
*/
get_header()
?> <?php /* この記事の投稿タイプ */
$post_type = get_post_type();
$post_typeName = get_post_type_object($post_type)->name;
//$post_typeNameを大文字に変換
$post_typeName = strtoupper($post_typeName);
/* この記事のタクソノミー */
$taxonomy;
if($post_type == 'works'):
  $taxonomy = 'works_cat';
elseif($post_type == 'topics'):
  $taxonomy = 'topics_cat';
endif;
/* この記事のタクソノミーのターム */
$terms = get_the_terms($post->ID,$taxonomy);

/* アイキャッチ画像 */
$thumbnail_id = get_post_thumbnail_id();
$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'full' );
 ?>
<div id="page-single" data-barba="container" data-barba-namespace="works">
  <div id="article-wrapper">
    <div class="l-container">
      <section class="article-card <?php echo $post_type; ?>"><?php if(have_posts()):
 ?>
        <div class="meta"><span class="type"><?php echo $post_typeName; ?></span>
          <h1 class="title"><?php the_title(); ?></h1><?php if($post_type == 'topics'): ?><span class="date"><?php the_time('Y/m/d'); ?></span><?php endif;
 ?><?php if($terms): ?>
          <ul class="tag"><?php foreach($terms as $term):
  $termName = $term->name; ?>
            <li class="tag-item"><?php echo '#'.$termName; ?></li><?php endforeach;
endif;

 ?>
          </ul>
        </div><?php if( $thumbnail_id ): ?>
        <div class="thumb"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" /></div><?php endif;


 ?><?php if($post_type == 'works'): ?>
        <dl class="project">
          <dt>CLIENT</dt>
          <dd><?php echo SCF::get('client'); ?></dd>
          <dt>WORK</dt>
          <dd><?php echo SCF::get('work'); ?></dd>
        </dl><?php endif;
 ?>
        <article id="article"><?php the_content();


 ?>
        </article><?php endif;



 ?>
      </section>
      <section id="article-nav"><?php if($post_type == 'works'):
  $label = '実績';
elseif($post_type == 'topics'):
  $label = '記事';
endif;
 ?>
        <div class="nav-item"><?php $prev_post = get_previous_post();
if($prev_post): ?><a class="nav-btn prev" href="<?php echo get_permalink($prev_post->ID); ?>">
            ひとつ「前」の<?php echo $label; ?></a><?php endif;
 ?>
        </div>
        <div class="nav-item"><?php $next_post = get_next_post();
if($next_post): ?><a class="nav-btn next" href="<?php echo get_permalink($next_post->ID); ?>">
            ひとつ「次」の<?php echo $label; ?></a><?php endif;

 ?>
        </div>
      </section>
    </div>
  </div>
</div><?php get_footer(); ?>