<?php
// database verbinden


// voor localhost
//
$dbServernaam = "localhost";
$dbGebruikersnaam = "jeroen1q_dakpark";
$dbWachtwoord = "Dakpark";
$dbNaam = "jeroen1q_dakpark";
//
$conn = mysqli_connect($dbServernaam, $dbGebruikersnaam, $dbWachtwoord, $dbNaam)
    or die('Error: '.mysqli_connect_error());