<?php
/*
Template Name: 記事ページ（お知らせ）
*/
?>

<?php get_header(); ?>

	<div id="contents">
		<main id="main">

			<?php
				$term = get_the_terms($post->ID, 'category');
				$catID = array();
				$term_name = $term[0]->term_name;
				$term_slug  = $term[0]->category_nicename;
				$post_id = get_the_ID();
			?>

			<div class="single_head">
				<div class="contents_inner">
					<p class="date"><?php echo get_the_date( 'Y.m.d' ); ?></p>
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="cat_list">
						<?php
							$taxonomy_slug = 'category';
							$category_terms = wp_get_object_terms($post->ID, $taxonomy_slug);
								if(!empty($category_terms)){
									foreach($category_terms as $category_term){ // タームのループを開始
									echo '<div class="cat"><a href="' . get_term_link( $category_term->slug, $taxonomy_slug) . '" class="cat _' . esc_html( $category_term->slug ) . '">' . esc_html( $category_term->name ) . '</a></div>';
								}
							}
						?>
					</div>
				</div>
			</div>


			<div class="news_layout">
				<div class="layout_inner">
					<div class="content">
						<div id="single">
							<div class="contents_inner">
								<div class="post_body">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="side">
						<?php get_template_part('inc/sidebar'); ?>
					</div>
				</div>
			</div>


			<div class="news_single_bottom">

				<?php
					$prevpost = get_adjacent_post(false, '', true); //前の記事
					$nextpost = get_adjacent_post(false, '', false); //次の記事
					// var_dump( $prevpost, $nextpost );
					if( $prevpost or $nextpost ):
				?>
				<div class="post_bottom_pager">
					<div class="pager_inner">
						<?php if ( $prevpost ): ?>
							<div class="post_bottom_pager_back">
								<a href="<?php echo get_permalink($prevpost->ID); ?>">
									<div class="btn_more _back"><span class="text">前のページ <span class="icon"></span></span></div>
								</a>
							</div>
						<?php endif; ?>
						<div class="post_bottom_pager_center">
							<a class="btn_standard" href="<?php echo esc_url( home_url( '/' ) ); ?>news/"><span class="text">一覧へ戻る</span></a>
						</div>
						<?php if ( $nextpost ): ?>
							<div class="post_bottom_pager_next">
								<a href="<?php echo get_permalink($nextpost->ID); ?>">
									<div class="btn_more _next"><span class="text">次のページ <span class="icon"></span></span></div>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php else: ?>
					<div class="post_bottom_pager _center">
						<div class="pager_inner">
							<div class="post_bottom_pager_center">
								<a class="btn_standard" href="<?php echo esc_url( home_url( '/' ) ); ?>news/"><span class="text">一覧へ戻る</span></a>
							</div>
						</div>
					</div>
				<?php endif; ?>



				<?php $categories = get_the_terms( $post_id, 'category' ); ?>
				<?php
					$paged = (int) get_query_var('paged');
					$args = array(
						'post_type' => 'post',
						'paged' => $paged,
						'posts_per_page' => 3,
						'post__not_in' => array($post_id),
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => $categories[0]->slug,
							),
						),
					);
					$the_query = new WP_Query( $args );
					if( $the_query -> have_posts() ) :
				?>

				<div class="post_related_column">
					<p class="post_related_title"><span>関連記事</span></p>
					<div class="post_related_list">
						<?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<div class="post_related_item">
							<div class="news_post_img">
								<a href="<?php echo get_permalink(); ?>">
									<?php if(has_post_thumbnail()): ?>
										<img src="<?php echo the_post_thumbnail_url('thmbnail'); ?>" alt="">
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg 1x, <?php echo get_template_directory_uri(); ?>/assets/img/news/dummy@2x.jpg 2x" width="450" height="336" alt="">
									<?php endif; ?>
								</a>
							</div>
							<div class="news_post_info">
								<p class="news_post_date"><?php echo get_the_modified_date('Y.m.d'); ?></p>
								<p class="news_post_title">
									<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								</p>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>

				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

			</div>


		</main>
	</div>

<?php get_footer(); ?>
