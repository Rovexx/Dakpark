<?php
	$host ="localhost";
	$db_username="root";
	$db_password = "";
	$database="dakpark";

	$connect = mysqli_connect($host, $db_username, $db_password, $database)
		or die("Connection failure: ".mysqli_connect_error());;
s