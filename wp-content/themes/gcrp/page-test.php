<?php
require(wp_normalize_path(get_template_directory() . '/facebook/FacebookFeed.php'));
require(wp_normalize_path(get_template_directory() . '/facebook/FaceBookEvents.php'));
get_header();

/*
 *   FEED
 *    1. Pass any number as a parameter to the fetch() method and return that many results (up to 100). Default is 5
 */

$feed    = new FacebookFeed();
$results = $feed->fetch(2);

//display results
echo '<ul>';
foreach ($results->data as $result) {
    echo '<li>' . $result->message . '</li>';
}
echo '</ul>';

//get the link for next set of results

echo '<a href="' . $results->paging->next . '" class="btn btn-primary">Next</a>';
echo '<hr>';

///////////////////////////////////////////////////////////

/*
 *  Events
 */

$events = new FaceBookEvents();
echo '<pre>', print_r($events->fetch()), '</pre>';

get_footer();
