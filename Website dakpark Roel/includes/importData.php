<?php
require_once("dbh.php");
$score = $_GET['score'];
$location = $_GET['location'];

if (!empty($score)){
    $query ="UPDATE currentscore SET score = '$score' WHERE currentscore.id = 1";
    mysqli_query($conn, $query);
}
if (!empty($location)){
    $query ="UPDATE currentlocation SET location = '$location' WHERE currentlocation.id = 1";
    mysqli_query($conn, $query);
}
?>