<div id="sidebar">
	<div class="widget_column">
		<p class="widget_title _montserrat">CATEFORY</p>
		<ul class="cat_list">
			<?php
				$terms = get_terms('category', array('hide_empty' => true));
			?>
			<?php if($terms):?>
			<?php foreach($terms as $term):?>
				<li class="cat_item">
					<a class="cat_item_link" href="<?php echo get_category_link( $term->term_id )?>">
						<span><?php echo $term->name?></span>
					</a>
				</li>
			<?php endforeach;?>
			<?php endif;?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>
</div>