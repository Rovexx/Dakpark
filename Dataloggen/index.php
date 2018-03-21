<?php 
	$Test = $_GET['ID'];
	require_once("include/Connection.php");
	$query ="INSERT INTO `test`(`ID`, `Waarde`) VALUES (NULL, '$Test')";
	mysqli_query($connect, $query); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dataloggen</title>
</head>
<body>
	<?=$Test;
	mysqli_close($connect);?>
</body>
</html>