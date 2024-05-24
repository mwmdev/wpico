<?php get_header(); ?>
	<main class="container">
		<?php if ( have_posts() ) { ?>
			<header>
				<?php
				$title = get_the_archive_title();
				$title = preg_replace('/^Archives: /', '', $title);
				echo "<h1>$title</h1>";
				?>
			</header>
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_type() );
			};
			the_posts_navigation();
		} else {
			get_template_part( 'content', 'none' );
		};
		?>
	</main>
<?php get_footer();
