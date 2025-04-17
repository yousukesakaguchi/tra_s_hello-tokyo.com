<?php 
/**
* @package WordPress 
* Template Name: 制作実績 一覧
*/
get_header()
?>
<div id="home" data-barba="container" data-barba-namespace="works">
  <div id="home-content" data-scroll-section="true">
    <section class="l-section" id="works">
      <div class="l-container home-works__container">
        <div class="m-head-1">
          <h2 class="m-head-1__txt"><span class="ja">制作実績</span><span class="en">WORKS</span></h2>
        </div>
        <div id="search">
          <div class="search-tab__content">
            <div class="search-tab__content-item is-active" data-tab="works">
              <div class="search-tab__head"><span class="ja">カテゴリー</span><span class="en">CATEGORY</span></div>
              <div class="search-tab__cat"><?php if( !is_tax() ): ?><a class="search-tab__cat-item is-active">すべてのカテゴリー</a><?php else: ?><a class="search-tab__cat-item" href="<?php echo esc_url( home_url() ); ?>/works/#search">すべてのカテゴリー</a><?php endif; ?><?php $taxonomy = 'works_cat';
$terms = get_terms($taxonomy);
foreach ( $terms as $term ) :
  $term_name = $term->name;
  $term_slug = $term->slug;
  $term_link = get_term_link($term_slug,$taxonomy);
  /* 現在のページがタームページの場合はis-activeを付与 */
  if(is_tax($taxonomy,$term_slug)): ?><a class="search-tab__cat-item is-active" href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a><?php else: ?><a class="search-tab__cat-item" href="<?php echo $term_link; ?>#search"><?php echo $term_name; ?></a><?php endif; ?><?php endforeach;


 ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="m-works-list-1" id="works-list"><?php while (have_posts() ) :
  the_post();
  $post = get_post();
  $post_id = $post->ID;
  $url = get_permalink($post_id);
  $client = SCF::get( 'client', $post_id );
  $work = SCF::get( 'work', $post_id );
  $taxonomy = 'works_cat';
  $terms = get_the_terms($post_id,$taxonomy);
  $eycatch = get_the_post_thumbnail_url($post_id);
 ?>
        <li class="works-list__item m-works-list-1__item"><a class="works-list__link m-works-list-1__link" href="<?php echo $url; ?>">
            <h3 class="content">
              <div class="content-inner"><span class="work"><?php echo $work; ?></span><span class="client"><?php echo $client; ?></span></div>
            </h3>
            <div class="cat">
              <?php //$termsの中身があるかどうかをチェック
if( $terms ):
  foreach( $terms as $term ):
    echo '<span class="cat-item">#'.$term->name.'</span>';
  endforeach;
 ?><?php endif; ?>
            </div>
          </a>
          <div class="works-list__img m-works-list-1__img"><img src="<?php echo $eycatch; ?>" alt="<?php the_title(); ?>" /></div>
        </li><?php endwhile;


 ?>
      </ul>
      <div id="pageNavi"><?php if(function_exists('wp_pagenavi')):
  wp_pagenavi();
endif;


 ?>
      </div>
    </section>
  </div>
</div><?php get_footer(); ?>