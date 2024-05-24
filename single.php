<?php get_header(); ?>
	<main class="container">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_type() );
		}
		?>
	</main>
<?php
get_footer();
