<?php

$request = "GET";

$TwitterAPIkey = "5Z6E6Pf55WbZg6voblOpuJFNe";
$TwitterSecret = "Bb6PdqrklpZGVxbnyN0ntoqeaapW2iSS3dZFbKLsgMb238m4pB";

$url ='https://api.twitter.com/1.1/search/tweets.json?q=nasa&result_type=popular' ;
$ch =  'authorization: OAuth oauth_consumer_key=".$TwitterAPIkey.", 
 oauth_nonce="generated-nonce", oauth_signature="generated-signature", 
 oauth_signature_method="HMAC-SHA1", oauth_timestamp="generated-timestamp", 
 oauth_token="978900790919270400-VxsiAzVNrY24wQP2296mpvmF93HH60O", oauth_version="1.0"';

$twurl = "/1.1/search/tweets.json?q=nasa&result_type=popular";

curlRequest($url);

function curlRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $returnCode == 200 ? unserialize($data) : null;
    }
?>