<?php
require_once("dbh.php");

if(isset($_GET['score'])){
	$score = $_GET['score'];
}

if(isset($_GET['location'])){
	$score = $_GET['location'];
}

if (!empty($score)){
    $query ="UPDATE currentinfo SET score = '$score' WHERE id = 1";
    mysqli_query($conn, $query);
}
if (!empty($location)){
    $query ="UPDATE currentinfo SET location = '$location' WHERE id = 1";
    mysqli_query($conn, $query);
}
?>