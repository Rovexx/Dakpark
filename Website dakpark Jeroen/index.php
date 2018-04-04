<?php
	require_once("Includes/FlickrAPI.php");
	require_once("Includes/Connection.php");
	$queryEternal = "SELECT id, teamnaam, max(score) FROM highscores";
	$queryresult = mysqli_query($connect, $queryEternal);
	$Result;
									
	while ($Result = mysqli_fetch_assoc($queryresult)) {
		$EternalNaam = $Result['teamnaam'];
		$EternalScore = $Result['max(score)'];
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
					<div class="container-scores">
						<p class="paragraphscores">
							<ol>
								<?php
									$queryScore = "SELECT id, teamnaam, score FROM `highscores` WHERE datum = CURRENT_DATE Order by score DESC LIMIT 3";
									$queryScoreResult = mysqli_query($connect, $queryScore);
									$ResultScore;
									$Counter = 0;
									while ($ResultScore = mysqli_fetch_assoc($queryScoreResult)) {
										$Counter ++;
										$DayNaam = $Counter. ". " .$ResultScore['teamnaam'];
										$DayScore = $ResultScore['score'];
								?>
								<li class="listnames">
								<?php echo $DayNaam; ?>
								</li>
								<li class="listscore">
								<?php echo $DayScore;?>
								</li>
								<?php
									}
									$Counter = 0;
								mysqli_close($connect);
								?>
							</ol>
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