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
require(wp_normalize_path(get_template_directory() . '/facebook/FaceBookEvents.php'));

$events = new FaceBookEvents();
$results = $events->fetch(30);
$now = time();

$pastevents = array();
$upcomingevents = array();

foreach ($results->data as $result) {
	$start = strtotime($result->start_time);
	$end = strtotime($result->end_time);
	$hasPassed = ($now > $end);

	if($hasPassed){
		$pastevents[] = $result;
	}else{
		$upcomingevents[] = $result;
    }
}

get_header(); ?>
    <div class="container">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; ?>

                <div class="facebook-events">
		            <?php
                    if(count($upcomingevents) < 1) {
                        echo '<p>There are currently no upcoming events. Check back soon for information about our next community event or class.</p><br><br>';
                    }else{
	                    foreach ( $upcomingevents as $result ) {
		                    $start     = strtotime( $result->start_time );
		                    $end       = strtotime( $result->end_time );
		                    $rangedate = ( $start != $end ? date( 'm/d/y', $start ) . ' - ' . date( 'm/d/y', $end ) : date( 'm/d/y', $start ) );
		                    $rangetime = ( $start != $end ? date( 'g:i A', $start ) . ' - ' . date( 'g:i A', $end ) : date( 'g:i A', $start ) );
		                    $hasPassed = ( $now > $end );
		                    include( wp_normalize_path( locate_template( 'template-parts/fb-event-large.php' ) ) );
	                    }
                    }
                    ?>
                </div>

                <h2>Past Events</h2>

                <div class="facebook-events">
		            <?php foreach ($pastevents as $result) {
			            $start = strtotime($result->start_time);
			            $end = strtotime($result->end_time);
			            $rangedate = ($start != $end ? date('m/d/y',$start) .' - '. date('m/d/y',$end) : date('m/d/y',$start));
			            $rangetime = ($start != $end ? date('g:i A',$start) .' - '. date('g:i A',$end) : date('g:i A',$start));
			            $hasPassed = ($now > $end);
                        include(wp_normalize_path(locate_template('template-parts/fb-event-large.php')));
		            } ?>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>

<?php
get_footer();