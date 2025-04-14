<?php
/*
Template Name: お知らせ一覧（アーカイブ）
*/
?>
<?php get_header(); ?>


	<div id="contents">
		<main id="main">

			<?php
				global $wp_query;
				$post_obj = $wp_query->get_queried_object();
				$name = $post_obj->name;
				$slug = $post_obj->slug;
				$date_name = get_query_var('year').'年';
			?>

			<?php if( is_date() ) : ?>
				<?php
					$year =  get_query_var('year');
					$monthnum =  get_query_var('monthnum');
				?>
			<?php endif; ?>

			<?php if( is_category() ) : ?>
				<?php
					$name = $post_obj->name;
					$slug = $post_obj->slug;
				?>
			<?php endif; ?>


			<div id="page_top">
				<div class="contents_inner">
					<div class="page_top_title_en _poppins">
						<p class="second_letter"><span class="first_letter">I</span>NFORMATION</p>
					</div>
					<?php if( is_date() ) : ?>
						<h1 class="page_top_title_ja"><?php echo $date_name; ?></h1>
					<?php elseif( is_category() ) : ?>
						<h1 class="page_top_title_ja"><?php echo $name; ?></h1>
					<?php else: ?>
						<h1 class="page_top_title_ja">お知らせ</h1>
					<?php endif; ?>
				</div>
			</div>

			<?php get_template_part('inc/breadcrumb'); ?>



			<div class="news_layout">
				<div class="layout_inner">
					<div class="content">
						<div id="archive">
							<div class="contents_inner">

								<?php
									$paged = (int) get_query_var('paged');
									$args = array(
										'post_type' => 'post',
										'orderby' => 'modified',
										'posts_per_page' => 2,
									);
									$the_query = new WP_Query( $args );

									if( $the_query -> have_posts() && is_page('news')) :
								?>

								<div class="news_archive _head">
									<?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
										<?php $args = array( 'key' => 'new'); ?>
										<?php get_template_part('inc/post/news', null , $args); ?>
									<?php endwhile;?>
								</div>

								<?php endif; ?>
								<?php wp_reset_postdata(); ?>


								<?php if( is_category() ) : ?>
									<?php
										$paged = (int) get_query_var('paged');
										$args = array(
											'post_type' => 'post',
											'paged' => $paged,
											'posts_per_page' => get_option('posts_per_page'),
											'tax_query' => array(
												array(
													'taxonomy' => 'category',
													'field' => 'slug',
													'terms' => $slug,
												),
											),
										);
										$the_query = new WP_Query( $args );
									?>
								<?php elseif( is_date() ) : ?>
									<?php
										$year = get_query_var('year');
										$paged = (int) get_query_var('paged');
										$args = array(
											'post_type' => 'post',
											'paged' => $paged,
											'posts_per_page' => get_option('posts_per_page'),
											'date_query' => array(
												array(
													'year'  => $year,
												),
											),
										);
										$the_query = new WP_Query( $args );
									?>
								<?php elseif (is_page('news')): ?>
									<?php
										$posts = get_posts( array (
											'post_type' => 'post',
											'orderby' => 'modified',
											'posts_per_page' => 2,
										));
										$post_ids = array();
											foreach ( $posts as $p ) {
											$post_ids[] = $p->ID;
										}
										$not_in = implode(',', $post_ids);
									?>
									<?php
										$paged = (int) get_query_var('paged');
										$args = array(
											'post_type' => 'post',
											'paged' => $paged,
											'posts_per_page' => get_option('posts_per_page'),
											'post__not_in'=> $post_ids,
										);
										$the_query = new WP_Query( $args );
									?>
								<?php else : ?>
									<?php
										$paged = (int) get_query_var('paged');
										$args = array(
											'post_type' => 'post',
											'paged' => $paged,
											'posts_per_page' => get_option('posts_per_page'),
										);
										$the_query = new WP_Query( $args );
									?>
								<?php endif; ?>


								<?php if( $the_query -> have_posts() ) : ?>

								<div class="news_archive">
									<?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
										<?php get_template_part('inc/post/news'); ?>
									<?php endwhile;?>
								</div>

								<?php endif; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
					<div class="side">
						<?php get_template_part('inc/sidebar'); ?>
					</div>
				</div>
			</div>


			<?php if( function_exists("the_pagination") ) the_pagination(); ?>
			<?php wp_reset_postdata(); ?>


		</main>
	</div>



<?php get_footer(); ?>