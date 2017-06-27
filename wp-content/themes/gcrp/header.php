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

    <div class="hidden-lg-up">
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
                    <div class="row justify-content-center d-flex align-items-end no-gutters">

                        <div class="col-10 col-sm-9 col-md-6 col-lg-5 align-self-start">
                            <a href="/" class="navbar-brand"><img src="<?php echo get_template_directory_uri().'/img/gcrp-logo.jpg'; ?>" alt="<?php echo get_bloginfo(); ?>" class="img-fluid mt-lg-2"></a>
                        </div>
                        <div class="col-2 col-sm-3 text-center hidden-lg-up">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav">
                                <span class="icon-box">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-7">
                            <div id="mini-nav" class="justify-content-start" >
		                        <?php wp_nav_menu(
			                        array(
				                        'theme_location'  => 'mini-menu',
				                        'container_class' => 'navbar hidden-md-down d-inline-flex',
				                        'container_id'    => 'navbarNav',
				                        'menu_class'      => 'navbar-nav mr-auto mt-5',
				                        'fallback_cb'     => '',
				                        'menu_id'         => 'mini-menu',
				                        'walker'          => new WP_Bootstrap_Navwalker(),
			                        )
		                        ); ?>
                                <div class="secondary-logo hidden-sm-down d-inline-flex float-right">
                                    <img src="<?php echo get_template_directory_uri().'/img/min-logo.jpg'; ?>" alt="<?php echo get_bloginfo(); ?>" class="img-fluid">
                                </div>
                            </div>
                            <div id="main-nav" >
			                    <?php wp_nav_menu(
				                    array(
					                    'theme_location'  => 'main-menu',
					                    'container_class' => 'navbar d-flex ml-auto hidden-md-down',
					                    'container_id'    => 'navbarNavDropdown',
					                    'menu_class'      => 'navbar-nav ml-auto text-left',
					                    'fallback_cb'     => '',
					                    'menu_id'         => 'main-menu',
					                    'walker'          => new WP_Bootstrap_Navwalker(),
				                    )
			                    ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

	<div id="content" class="site-content">
        <div id="mid">
