<?php
include_once 'dbh.php';
$query = "SELECT * FROM currentscore";
$result = mysqli_query($conn, $query)
    or die('Error '.mysqli_error($conn).' with query '.$query);
// data in variabele zetten
//array maken
$score = [];
// sql data in de array zetten
while($row = mysqli_fetch_assoc($result))
{
    $score[] = $row;
}

$query = "SELECT * FROM currentlocation";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);
// data in variabele zetten
//array maken
$location = [];
// sql data in de array zetten
while($row = mysqli_fetch_assoc($result))
{
    $location[] = $row;
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Train Map</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div>
        <h1 class="title">Dakpark Rotterdam</h1>
        <br>
        <h4 class="subtitle">Interactive Installation</h4>
    </div>
    <div class="score">
        <h1>De huidige score is:</h1>
        <br>
        <h2><?= $score[0]["score"] ?></h2>
    </div>
    <div id="container">
        <map>
            <img src="images/Darkpark.png" alt="Dakpark Background">
            <marker></marker>
        </map>
    </div>
</body>

</html>
