<?php
require_once("dbh.php");
$teamName = $_POST['name'];

if (!empty($teamName)){
    $query ="UPDATE currentinfo SET teamname = '$teamName' WHERE currentinfo.id = 1";
    mysqli_query($conn, $query);
}

header("Location: ../index.html");
exit();