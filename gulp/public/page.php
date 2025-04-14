<?php get_header(); ?>


	<main id="main">

	<?php get_template_part('inc/visual'); ?>

	<?php if ( is_page(array('privacy','site_policy','contact','thanks')) ) : ?>
		<?php get_template_part('inc/breadcrumb'); ?>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php  while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>

	</main>


<?php get_footer(); ?>