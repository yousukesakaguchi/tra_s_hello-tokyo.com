<?php
	if ( !is_home() && !is_front_page() ) {
		if(function_exists('bcn_display')){
			echo '<div class="breadcrumb _black">';
				echo '<div class="l_inner">';
					echo '<ul vocab="https://schema.org/" typeof="BreadcrumbList" class="list breadcrumb_list">';
						bcn_display();
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		}
	}
?>
