<?php
$trimmed = wp_trim_words( $result->description, $num_words = 150, '...' );

if($start != $end){
	$range = date('m/d/y @ g:i A',$start) .' - '. date('m/d/y @ g:i A',$end);
} else {
	$range = date('m/d/y @ g:i A',$start);
}
?>

<div class="facebook-events-item large" id="<?php echo $result->id; ?>" >
	<div class="row">
		<div class="col-2 hidden-sm-down">
            <span class="date-block text-center">
                <div class="month"><?php echo date('M',$start); ?></div>
                <div class="day"><?php echo date('d',$start); ?></div>
            </span>
		</div>
		<div class="col-12 col-md-10">
			<h4 class="fb-event-title">
				<?php if(!$hasPassed){ ?><a href="https://www.facebook.com/events/<?php echo $result->id;?>" target="_blank" ><?php } ?>
					<?php echo $result->name;?>
					<?php if(!$hasPassed){ ?></a><?php } ?>
				<?php if($hasPassed){ ?><em class="passed">this event has passed</em><?php } ?>
			</h4>
			<table class="fb-event-when light"><tr><td class="event-label">When:</td><td><?php echo $range; ?></td></tr></table>
			<table class="fb-event-where light"><tr><td class="event-label">Where:</td><td><?php echo $result->place->name; ?></td></tr></table>
			<p><?php echo $trimmed; ?></p>
			<?php if(!$hasPassed){ ?>
				<a class="btn btn-primary" href="<?php echo $result->link; ?>" target="_blank" >RSVP on Facebook</a>
			<?php } ?>
		</div>
	</div>
	<hr>
</div>