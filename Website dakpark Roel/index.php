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
        <h1>De huidige score is: <?= $score[0]["score"] ?></h1>
    </div>
    <div id="container">
        <map>
            <img src="images/Darkpark.png" alt="Dakpark Background">
            <marker id="marker">
                <script>
                    <?php   // locatie 1
                    if ($location[0]["location"] == 0){
                    ?>
                    document.getElementById("marker").style.top = "67%";
                    document.getElementById("marker").style.left = "21%";
                    <?php } ?>

                    <?php   // locatie 2
                    if ($location[0]["location"] == 1){
                            ?>
                    document.getElementById("marker").style.top = "73%";
                    document.getElementById("marker").style.left = "50%";
                    <?php } ?>

                    <?php   // locatie 3
                    if ($location[0]["location"] == 2){
                    ?>
                    document.getElementById("marker").style.top = "0%";
                    document.getElementById("marker").style.left = "50%";
                    <?php } ?>

                    <?php   // locatie 4
                    if ($location[0]["location"] == 3){
                    ?>
                    document.getElementById("marker").style.top = "35%";
                    document.getElementById("marker").style.left = "9.4%";
                    <?php } ?>
                </script>
            </marker>
        </map>
    </div>
</body>
</html>
