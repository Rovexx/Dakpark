<?php
// database verbinden


// voor localhost
//
$dbServernaam = "localhost";
$dbGebruikersnaam = "root";
$dbWachtwoord = "";
$dbNaam = "dakpark";
//
$conn = mysqli_connect($dbServernaam, $dbGebruikersnaam, $dbWachtwoord, $dbNaam)
    or die('Error: '.mysqli_connect_error());