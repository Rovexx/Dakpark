<?php
	require_once("Includes/FlickrAPI.php");
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
								<li class="paragraph-eternal-highscore">Jantje</li>
							</ol>
						</p>
					</div>
					<div class="containerscore">
						<p class="paragraphscore">
							<ul>
								<li class="paragraph-eternal-highscore">999</li>
							</ul>
						</p>
					</div>
				</div>
				<h1 class="headtitle">Dag score:</h1>
				<div class="body-score">
					<div class="containernames">
						<p class="paragraphnames">
							<ol>
								<li class="paragraph bold-highscore">Karel</li>
								<li class="paragraph">Pieter</li>
								<li class="paragraph">Jacob</li>
							</ol>
						</p>
					</div>
					<div class="containerscore">
						<p class="paragraphscore">
							<ul>
								<li class="paragraph bold-highscore">30</li>
								<li class="paragraph">20</li>
								<li class="paragraph">10</li>
							</ul>
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
				<h1 class="headtitle-slide3">Social Media:</h1>
				<p class="paragraph-API">Flickr:</p>
				<?php
				foreach ($imgsrc as $value){
					foreach($value as $key){
				?>
				<img src= "<?=$key?>" class="image_slide3"?>
				<?php
					}}
				?>
				<?php
					require_once("Includes/Twitter/index.php");
				?>
			</div> 
		</div>
		<script>
			Timer();
		</script>
	</body>
</html>