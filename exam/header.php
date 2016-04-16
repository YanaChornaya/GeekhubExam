<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">

		<!--site-header-->
		<header class="site-header">
			<div class="container">
				<?php if (get_theme_mod('logo-img')): ?>
					<h1><a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod('logo-img') ?>" alt="logo"></a></h1>
				<?php endif; ?>
				<?php if (get_theme_mod('phone-header')): ?>
					<span class="fa fa-phone"></span>
					<span class="phone"><?php echo get_theme_mod('phone-header') ?></span>
				<?php endif; ?>
				<nav class="header-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu') );?>
				</nav>
			</div>
		</header>
		<!--/site-header-->


