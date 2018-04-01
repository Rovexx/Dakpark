<?php
require_once("dbh.php");
$score = 0;
$name = 0;
$date = date('Y-m-d');

// score ophalen
$query = "SELECT score FROM currentinfo";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$rs = mysqli_fetch_array($result);
$score = $rs['score'];

// team naam ophalen
$query = "SELECT teamname FROM currentinfo";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$rs = mysqli_fetch_array($result);
$name = $rs['teamname'];

$query ="INSERT INTO highscores (score, datum, teamnaam) VALUES ('$score', '$date', '$name');";
mysqli_query($conn, $query);

exit;
?>