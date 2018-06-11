<?php

use Includes\Modules\Facebook\FacebookSettings;

$facebook = new FacebookSettings();
$results = $facebook->getFeed(2);
$now = time();

?>
<div class="facebook-feed">
    <?php foreach ($results->posts as $result) {
    $trimmed = wp_trim_words( $result->message, $num_words = 25, '...' );
    $photoUrl = isset($result->full_picture) ? $result->full_picture : null;
    ?>

        <div class="facebook-feed-item" id="<?php echo $result->id; ?>" >

            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $result->full_picture; ?>" class="img-fluid" alt="<?php echo $result->caption; ?>" >
                </div>
                <div class="col-8">
                    <p class="time-posted">posted <?php echo human_time_diff($now,strtotime($result->created_time)); ?> ago</p>
                    <p style="margin:0;"><?php echo $trimmed; ?></p>
                    <p><a target="_blank" href="<?php echo $result->link; ?>" >read more</a></p>
                </div>
            </div>
            <hr>
        </div>

    <?php } ?>
    <p><a class="btn btn-primary" target="_blank" href="https://www.facebook.com/pg/GulfCountyGOP/posts/" >Follow us on Facebook</a></p>
</div>
