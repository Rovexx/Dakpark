<?php 
//session_start();
require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', '5Z6E6Pf55WbZg6voblOpuJFNe');
define('CONSUMER_SECRET', 'Bb6PdqrklpZGVxbnyN0ntoqeaapW2iSS3dZFbKLsgMb238m4pB');
define('OAUTH_CALLBACK', 'oob');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);


$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));


$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

$Search_Twitter = "Dakpark Rotterdam";
$statuses = $connection->get("search/tweets", ["q" => $Search_Twitter]);

header("Content-Type: application/json");
echo json_encode($statuses);
exit; 
?>