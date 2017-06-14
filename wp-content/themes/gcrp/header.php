<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GCRP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gcrp' ); ?></a>

    <div class="hidden-md-up">
        <div class="collapse navbar-toggleable-sm justify-content-center" id="mobile-nav">
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'mobile-menu',
					'container_class' => 'navbar',
					'container_id'    => 'navbarMobile',
					'menu_class'      => 'navbar-nav justify-content-center text-center',
					'fallback_cb'     => '',
					'menu_id'         => 'mobile-menu',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			); ?>
        </div>
    </div>

    <div id="top">
        <header id="masthead" class="site-header">
            <div class="navbar-static-top navbar-transparent">
                <div class="container">
                    <div class="row justify-content-center d-flex align-items-end">

                        <div class="col-9 col-md-4">
                            <a href="/" class="navbar-brand"><img src="<?php echo get_template_directory_uri().'/img/gcrp-logo.jpg'; ?>" alt="<?php echo get_bloginfo(); ?>" class="img-fluid"></a>
                        </div>
                        <div class="col-3 hidden-md-up">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav">
                                <span class="icon-box">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                        </div>
                        <div class="col-md-6 hidden-sm-down">
                            <div id="mini-nav" class="align-self-end">
		                        <?php wp_nav_menu(
			                        array(
				                        'theme_location'  => 'mini-menu',
				                        'container_class' => 'navbar',
				                        'container_id'    => 'navbarNav',
				                        'menu_class'      => 'navbar-nav mr-auto',
				                        'fallback_cb'     => '',
				                        'menu_id'         => 'mini-menu',
				                        'walker'          => new WP_Bootstrap_Navwalker(),
			                        )
		                        ); ?>
                            </div>
                            <div id="main-nav" class="hidden-md-down">
			                    <?php wp_nav_menu(
				                    array(
					                    'theme_location'  => 'main-menu',
					                    'container_class' => 'navbar',
					                    'container_id'    => 'navbarNavDropdown',
					                    'menu_class'      => 'navbar-nav ml-auto',
					                    'fallback_cb'     => '',
					                    'menu_id'         => 'main-menu',
					                    'walker'          => new WP_Bootstrap_Navwalker(),
				                    )
			                    ); ?>
                            </div>
                        </div>
                        <div class="col-md-2 hidden-sm-down">
                            <div class="secondary-logo">
                                <img src="<?php echo get_template_directory_uri().'/img/min-logo.jpg'; ?>" alt="<?php echo get_bloginfo(); ?>" class="img-fluid">
                            </div>
                        </div>
                        <div id="main-nav" class="hidden-lg-up hidden-sm-down col-12">
		                    <?php wp_nav_menu(
			                    array(
				                    'theme_location'  => 'main-menu',
				                    'container_class' => 'navbar',
				                    'container_id'    => 'navbarNavDropdown',
				                    'menu_class'      => 'navbar-nav ml-auto',
				                    'fallback_cb'     => '',
				                    'menu_id'         => 'main-menu',
				                    'walker'          => new WP_Bootstrap_Navwalker(),
			                    )
		                    ); ?>
                        </div>



                    </div>
                </div>
            </div>
        </header>
    </div>

	<div id="content" class="site-content">
        <div id="mid">
