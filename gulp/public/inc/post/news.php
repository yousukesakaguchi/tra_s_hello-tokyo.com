<div class="news_post">
	<div class="news_post_img">
		<?php
			if ( isset( $args ) && isset( $args['key'] ) ):
		?>
		<?php $key = $args['key']; ?>
		<?php if($key == 'new'): ?>
			<?php
				$days = 14;
				$today = date_i18n('U');
				$entry = get_the_date('U', $post->ID);
				$term = date('U',($today - $entry)) / 86400;
				if( $days > $term ){
					echo '<div class="news_post_new"><span>NEW</span></div>';
				}
			?>
		<?php endif; ?>
		<?php endif; ?>
		<a href="<?php echo get_permalink(); ?>">
			<?php if(has_post_thumbnail()): ?>
				<img src="<?php echo the_post_thumbnail_url('thmbnail'); ?>" alt="">
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news/dummy.jpg 1x, <?php echo get_template_directory_uri(); ?>/assets/img/news/dummy@2x.jpg 2x" width="450" height="336" alt="">
			<?php endif; ?>
		</a>
	</div>
	<div class="news_post_info">
		<p class="news_post_date"><?php echo get_the_date('Y.m.d'); ?></p>
		<p class="news_post_title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
		<div class="news_post_cat">
			<?php
				$taxonomy_slug = 'category';
				$category_terms = wp_get_object_terms($post->ID, $taxonomy_slug);
					if(!empty($category_terms)){
						foreach($category_terms as $category_term){ // タームのループを開始
						echo '<div class="cat"><a href="' . get_category_link( $category_term->term_id ) . '">' . esc_html( $category_term->name ) . '</a></div>';
					}
				}
			?>
		</div>
	</div>
</div>