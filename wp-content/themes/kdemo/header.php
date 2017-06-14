<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KMA_DEMO
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kmaidx' ); ?></a>

    <div id="top">
        <div id="top-top">
            <div class="fluid-container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-md-4 col-lg-3" >
                        <div class="weather-module text-right">
                            <?php if(!is_page(191)){ echo do_shortcode('[getweather days="1" format="mini" location="Port St. Joe, FL"]'); } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header id="masthead" class="site-header">
            <div class="navbar-static-top navbar-transparent">
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <div class="col-9 col-sm-3 col-md-2">
                            <a href="/" class="navbar-brand">KMADemo</a>
                        </div>
                        <div class="col-3 hidden-md-up">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header">
                                <span class="icon-box">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="navbar-collapse navbar-toggleable-md justify-content-end" id="navbar-header">
			                    <?php wp_nav_menu(
				                    array(
					                    'theme_location'  => 'menu-1',
					                    'container_class' => 'navbar-static',
					                    'container_id'    => 'navbarNavDropdown',
					                    'menu_class'      => 'navbar-nav justify-content-end',
					                    'fallback_cb'     => '',
					                    'menu_id'         => 'menu-1',
					                    'walker'          => new WP_Bootstrap_Navwalker(),
				                    )
			                    ); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </header>
        <div id="mast" >
            <?php
                if(is_front_page()){
                    //print(getNewWeather('Mexico Beach, FL'));
                    echo '
                           <div class="jumbotron jumbotron-fluid">
                              <div class="container">
                                <h1>'.get_post_meta($post->ID,'page_information_headline',true).'</h1>
                                <p class="lead">'.$post->post_content.'</p>
                              </div>
                            </div>
                        ';
                }
            ?>
        </div>
    </div>

	<div id="content" class="site-content">
        <div id="mid">
