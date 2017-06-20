<div class="col-md-8 text-center">
<?php

function assemble_error_codes($error_lists_string, $error_codes_string) {
	$legend = array (
		'0'       => "Unknown error. Please resubmit the subscription form.",
		'1'       => "Sorry, but we're at our maximum number of subscribers. Try again later.",
		'2'       => "You must have missed a required field. Please try again.",
		'3'       => "Thanks, but you're already on our list.",
		'4'       => "This e-mail address has been processed in the past to be subscribed, however your subscription was never confirmed.",
		'5'       => "This e-mail address cannot be added to list.",
		'6'       => "Got it. Please check your email to confirm your subscription.",
		'7'       => "Got it. Thanks for subscribing!",
		'8'       => "E-mail address is invalid.",
		'9'       => "Subscription could not be processed since you did not select a list. Please select a list and try again.",
		'10'      => "This e-mail address has been processed. Please check your email to confirm your unsubscription.",
		'11'      => "This e-mail address has been unsubscribed from the list.",
		'12'      => "This e-mail address was not subscribed to the list.",
		'13'      => "Thank you for confirming your subscription.",
		'14'      => "Thank you for confirming your unsubscription.",
		'15'      => "Your changes have been saved.",
		'16'      => "Your subscription request for this list could not be processed as you must type your name.",
		'17'      => "This e-mail address is on the global exclusion list.",
		'18'      => "Please type the correct text that appears in the image.",
		'19'      => "Subscriber ID is invalid.",
		'20'      => "You are unable to be added to this list at this time.",
		'21'      => "Thanks, but you're already on our list! Would you like to add another?",
		'22'      => "This e-mail address could not be unsubscribed.",
		'23'      => "This subscriber does not exist.",
		'24'      => "The link to modify your account has been sent. Please check your email.",
		'25'      => "The image text you typed did not register. Please go back, reload the page, and try again.",
	);

	$error_lists = explode(',', $error_lists_string);
	$error_codes = explode(',', $error_codes_string);

	$message = "";

	foreach ( $error_lists as $k => $listid ) {
		$code = ( isset($error_codes[$k]) ? (int)$error_codes[$k] : 0 );
		if ( isset($legend[$code]) ) {
			$message .= ' <p>'.$legend[$code] . '</p>';
		}
	}

	return $message;
}

if ( isset($_GET['lists']) && isset($_GET['codes']) ){
	echo assemble_error_codes($_GET['lists'], $_GET['codes']);
}else{ ?>
	<p>Sign up to receive information about news, events, meetings and classes by email.</p>
<?php } ?>
</div>
<div class="col-md-4 text-center">
<form class="form form-inline" method="post" action="http://kmailer.kerigan.com/box.php">
    <input type="hidden" name="field[]">
    <input type="hidden" name="nlbox[]" value="66">
    <input type="hidden" name="funcml" value="add">
    <input type="hidden" name="p" value="1043">
    <input type="hidden" name="_charset" value="utf-8">
	<div class="input-group">
		<input type="text" class="email-signup-field form-control" name="email" placeholder="Enter your email" >
        <span class="input-group-btn">
            <input type="submit" class="btn btn-primary email-signup-button" value="Subscribe" >
        </span>
	</div>
</form>
</div>
