<?php
	$host ="localhost";
	$db_username="jeroen1q_dakpark";
	$db_password = "Dakpark";
	$database="jeroen1q_dakpark";

	$connect = mysqli_connect($host, $db_username, $db_password, $database)
		or die("Connection failure: ".mysqli_connect_error());;
