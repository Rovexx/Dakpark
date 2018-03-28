<?php
include_once 'dbh.php';
$returnData = [];

$query = "SELECT * FROM currentscore";
$result = mysqli_query($conn, $query)
    or die('Error '.mysqli_error($conn).' with query '.$query);
// data in variabele zetten

// sql data in de array zetten
$rs = mysqli_fetch_array($result);
$returnData['score'] = $rs['score'];


$query = "SELECT * FROM currentlocation";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);
// data in variabele zetten

// sql data in de array zetten
$rs = mysqli_fetch_array($result);
$returnData['location'] = $rs['location'];


header("Content-Type: application/json");
echo json_encode($returnData);
exit;
?>