<?php get_header(); ?>
	<main class="container">
		<?php
		if ( have_posts() ) {
			if ( is_home() && ! is_front_page() ) {
				?>
				<article>
					<header>
						<h1><?php single_post_title(); ?></h1>
					</header>
					<?php the_content(); ?>
					<footer>
						<?php the_tags(); ?>
					</footer>
				</article>
				<?php
			};
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_type() );
			};
		} else {
			get_template_part( 'content', 'none' );
		};
		?>
	</main>
<?php
get_footer();
