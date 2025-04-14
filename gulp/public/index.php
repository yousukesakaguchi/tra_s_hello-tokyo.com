<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

			<?php  while ( have_posts() ) : the_post(); ?>

		<?php endwhile; ?>
	<?php else: ?>
  <p>記事がありません</p>
	<?php endif; ?>
	<!-- ▲▲ CONTENTS END ▲▲ -->

<?php get_footer(); ?>