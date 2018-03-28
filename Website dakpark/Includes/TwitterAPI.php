<?php
	
	require_once("Twitter.php");
	$TwitterAPIkey = "5Z6E6Pf55WbZg6voblOpuJFNe";
	$TwitterSecret = "Bb6PdqrklpZGVxbnyN0ntoqeaapW2iSS3dZFbKLsgMb238m4pB";

	$Twitter_koppeling = new Twitter($TwitterAPIkey, $TwitterSecret);
	$Searchterm = "Dakpark Rotterdam";

	$TwitterFeed[] = $Twitter_koppeling->getTwitterUrls($Searchterm);
	