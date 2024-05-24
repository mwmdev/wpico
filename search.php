<?php get_header(); ?>
	<main class="container">
		<?php if ( have_posts() ) { ?>
			<header>
				<h1>
					<?php
					printf( esc_html__( 'Search results for: %s', 'wpico' ), '<span>« ' . get_search_query() . ' »</span>' );
					?>
				</h1>
			</header>
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', 'search' );
			}
			the_posts_navigation();
		} else {
			get_template_part( 'content', 'none' );
		}
		?>
	</main>
<?php get_footer();
