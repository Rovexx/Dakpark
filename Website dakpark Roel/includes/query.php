<?php
include_once 'dbh.php';
$returnData = [];

// score ophalen
$query = "SELECT score FROM currentinfo";
$result = mysqli_query($conn, $query)
    or die('Error '.mysqli_error($conn).' with query '.$query);

$rs = mysqli_fetch_array($result);
$returnData['score'] = $rs['score'];


// locatie ophalen
$query = "SELECT location FROM currentinfo";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$rs = mysqli_fetch_array($result);
$returnData['location'] = $rs['location'];


// team naam ophalen
$query = "SELECT teamname FROM currentinfo";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$rs = mysqli_fetch_array($result);
$returnData['teamname'] = $rs['teamname'];

header("Content-Type: application/json");
echo json_encode($returnData);
exit;
?>