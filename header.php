<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<title>
		<?php
		if ( is_front_page() ) {
			bloginfo( 'name' );
		} else {
			wp_title( '' );
		}
		?>
	</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body>
	<header class="container">
		<nav>
			<ul>
				<li>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a><br/>
					<small><?php bloginfo( 'description' ); ?></small>
				</li>
			</ul>
			<?php wp_nav_menu( array( 'menu' => 'Header' ) ); ?>
			<ul>
				<li>
					<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input name="s" type="search" placeholder="Search" />
						<input type="submit" value="Search" />
					</form>
				</li>
			</ul>
		</nav>
	</header>
