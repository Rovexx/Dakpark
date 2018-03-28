<?php
	require_once('Flickr.php');

	$flickr_api_key = "c58666d50a7137b0a66655d2aaffa404";
	$flickr_api_secret = "9c9b78d5d79231fc";
	//Create instance of class to use for communicating with Flickr webservice
	$flickr = new Flickr($flickr_api_key, $flickr_api_secret);

	$tag = "Dakpark Rotterdam";
	//Comment this section
	$imgsrc[]= $flickr->getImageUrls($tag);