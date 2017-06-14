<?php
require('vendor/autoload.php');
get_header();


$fb = new Facebook\Facebook([
    'app_id' => '140487476513677',
    'app_secret' => '8820f0a5297f4f9e82da69adfbc2686d',
    'default_graph_version' => 'v2.9',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://gulfcorepublicans.dev/callback/', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
get_footer();
