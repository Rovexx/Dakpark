<?php  
include_once "Website dakpark Roel\includes\dbh.php";
$query = "SELECT location FROM currentinfo";
$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$location = $result;


?>

<!DOCTYPE html>
<html>
<head>
	<title>CheatCheat</title>
</head>
<body>
	<form method="post">
		<input type="submit" value="+10 punten" name="punten"/>
		<input type="submit" value="Volgende locatie" name="locatie"/>
	</form>
</body>
</html>