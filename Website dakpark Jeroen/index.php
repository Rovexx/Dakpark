<?php
	require_once("Includes/FlickrAPI.php");
	require_once("Includes/Connection.php");
	$queryEternal = "SELECT ID, Naam, max(Score) FROM Scores";
	$queryresult = mysqli_query($connect, $queryEternal);
	$Result;
									
	while ($Result = mysqli_fetch_assoc($queryresult)) {
		$EternalNaam = $Result['Naam'];
		$EternalScore = $Result['max(Score)'];
	}
	//SELECT * FROM `Scores` WHERE Datum = CURRENT_DATE ORDER BY Score DESC LIMIT 3

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="Css/Stylesheet.css" type="text/css"/>
		<script type="text/javascript" src="Js/Slider.js">
		</script>
		<link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto+Slab" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Website Dakpark</title>
	</head>
	<body>
	  	 <div class="slide1 container Slides">
			<div class="part-50 wrapper-right-score">
				<h1 class="headtitle">Highscore allertijden:</h1>
				<div class="body-score">
					<div class="containernames">
						<p class="paragraphnames">
							<ol class="ol-eternal-score">
								<li class="paragraph-eternal-highscore"><?=$EternalNaam;?></li>
							</ol>
						</p>
					</div>
					<div class="containerscore">
						<p class="paragraphscore">
							<ul>
								<li class="paragraph-eternal-highscore"><?=$EternalScore;?></li>
							</ul>
						</p>
					</div>
				</div>
				<h1 class="headtitle">Dag score:</h1>
				<div class="body-score">
					<div class="containernames">
						<p class="paragraphnames">
							<?php
									$queryDay = "SELECT * FROM `Scores` WHERE Datum = CURRENT_DATE ORDER BY Score DESC LIMIT 3";
									$queryDay = mysqli_query($connect, $queryDay);
									$ResultDay;
									while ($Result = mysqli_fetch_assoc($queryDay)) {
										$DayNaam = $Result['Naam'];
										$DayScore = $Result['Score'];
									?>
							<ol>
								<li class="paragraph">
									<?php
										echo $DayNaam;
									?>	
								</li>
							</ol>
						</p>
					</div>
					<div class="containerscore">
						<p class="paragraphscore">
							<ul>
								<li class="paragraph">
									<?php
									echo $DayScore;
									?>		
								</li>
							</ul>
							<?php
									}
								mysqli_close($connect);
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
  		<div class="slide2 container Slides">
  			<div class="part-30-slide2">

  			</div>
  			<div class="part-70-slide2 body-playrules">
  				<h1 class="headtitle">Spelregels:</h1>
					<p class= "">
						<ol class="">
							<li class="paragraph-playrules">Minimaal 4 personen in de trein per rondje.</li>
							<li class="paragraph-playrules">Deze trein is geschikt voor kinderen ouder dan drie en jonger als 14 jaar.</li>
							<li class="paragraph-playrules">Iedereen doet zijn best. Help elkaar om de beste score neer te zetten!</li>
							<li class="paragraph-playrules">Schiet alleen op konijnen. Het is verboden om op mensen te schieten.</li>
							<li class="paragraph-playrules">Doe voorzichtig met de trein. Andere kinderen willen er ook nog mee spelen.</li>
							<li class="paragraph-playrules">En boven alles MAKE FUN!</li>
						</ol>
					</p>
  			</div>
		</div>
		<div class="slide3 container Slides">
			<div class="slide3-body">
				<h1 class="headtitle headtitle-slide3">Tweet of the day:</h1>
				<div class="tweet-style">
				<?php
					require_once("Includes/Twitter/index.php");
				?>
				</div>
			</div> 
		</div>
		<div class="slide4 container Slides">
			<div class="slide4-body">
				<h1 class="headtitle headtitle-slide4">Flickr:</h1>
				<?php
				foreach ($imgsrc as $value){
					foreach($value as $key){
				?>
				<img src= "<?=$key?>" class="image_slide3"?>
				<?php
					}}
				?>
			</div> 
		</div>
		<script>
			Timer();
		</script>
	</body>
</html>