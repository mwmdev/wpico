<article>
	<header>
		<?php
		if ( is_search() || is_archive() ) {
			echo '<a href="' . get_permalink() . '">';
		}
		?>
		<h1><?php the_title(); ?></h1>
		<?php
		if ( is_search() || is_archive() ) {
			echo '</a>';
		}
		if ( is_search() || is_archive() || is_single() ) {
			$date_format = get_option( 'date_format' ); ?>
			<time datetime="<?php echo get_the_date( $date_format ); ?>"><?php echo get_the_date(); ?></time>
		<?php } ?>
	</header>
	<?php
	if ( is_search() || is_archive() ) {
		the_excerpt();
	} else {
		the_content();
	}
	?>
	<footer>
		<?php
		if ( is_single() ) {
			$taxonomies = get_object_taxonomies( $post->post_type );
			foreach ( $taxonomies as $taxonomy ) {
				$terms = get_the_terms( $post->ID, $taxonomy );
				if ( ! empty( $terms ) ) {
					echo '<nav>';
					echo "<h4>" . get_taxonomy( $taxonomy )->label . "</h4>";
					echo "<ul>";
					foreach ( $terms as $term ) {
						echo "<li><a href='" . get_term_link( $term ) . "'>" . $term->name . "</a></li>";
					}
					echo "</ul>";
					echo "</nav>";
				}
			}
		}
		?>
	</footer>
</article>
