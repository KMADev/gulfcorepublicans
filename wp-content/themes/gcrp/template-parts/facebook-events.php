<?php

use Includes\Modules\Facebook\FacebookSettings;

$facebook = new FacebookSettings();
$results = $facebook->getEvents(2);
$now = time();

//var_dump($results);

?>
<div class="facebook-events">
	<?php foreach ($results->posts as $result) {
		$trimmed = wp_trim_words( $result->description, $num_words = 17, '...' );
		$start = strtotime($result->start_time);
		$end = ($result->end_time != '' ? strtotime($result->end_time) : $start);

		$rangedate = ($start != $end ? date('m/d/y',$start) .' - '. date('m/d/y',$end) : date('m/d/y',$start));
		$rangetime = ($start != $end ? date('g:i A',$start) .' - '. date('g:i A',$end) : date('g:i A',$start));

		$hasPassed = (date('YmdGi',$now) > date('YmdGi',$end));

		if($start != $end){
		    $range = date('m/d/y @ g:i A',$start) .' - '. date('m/d/y @ g:i A',$end);
        } else {
			$range = date('m/d/y @ g:i A',$start);
        }
    ?>

    <div class="facebook-events-item" id="<?php echo $result->id; ?>" >
        <div class="row">
            <div class="col-12">
                <h4 class="fb-event-title"><a href="https://www.facebook.com/events/<?php echo $result->id;?>" target="_blank" ><?php echo $result->name;?></a></h4>
                <p><?php echo $trimmed; ?> <a target="_blank" href="https://www.facebook.com/events/<?php echo $result->id;?>" >read more</a></p>
                <table class="fb-event-when"><tr><td class="event-label">When:</td><td><?php echo $range; ?></td></tr></table>
                <table class="fb-event-where"><tr><td class="event-label">Where:</td><td><?php echo $result->place->name; ?></td></tr></table>
            </div>
        </div>
        <hr>
        <div class="clearfix"></div>
    </div>

	<?php } ?>
    <p><a class="btn btn-primary" target="_blank" href="https://www.facebook.com/pg/GulfCountyGOP/events/" >More events on Facebook</a></p>
</div>


