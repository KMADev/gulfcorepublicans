<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GCRP
 */

get_header(); ?>
    <div class="container">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
    <div class="feat-boxes">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="feat-container news-container">
                        <h2 class="text-center" >Follow us</h2>
                        <?php include(locate_template('template-parts/facebook-news.php')); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feat-container events-container">
                        <h2 class="text-center" >Join us</h2>
                        <?php include(locate_template('template-parts/facebook-events.php')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="email-signup">
        <div class="container">
            <div class="row">
                <?php include(locate_template('template-parts/newsletter-signup.php')); ?>
            </div>
        </div>
    </div>
<?php
get_footer();
