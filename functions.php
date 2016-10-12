<?php

	// functions.php
	require("/home/martreba/config.php");
	var_dump($GLOBALS);
	//require("functions.php");
	
	function hello ($eesnimi, $perenimi)	{
		return "Tere tulemast $eesnimi $perenimi!";
		
	
	}
	//echo ("Martin", "Rebane");
	
	
	function cleanInput($input)	{
		
		//input = " xd "
		$input = trim($input);
		//input = "xd"
		
		$input = stripslashes($input);
	}
	
	function signup ($email, $password)	{
		$database = "if16_romil";
		
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
		
		echo $mysqli->error;
		
		//asendan küsimärgid
		//iga märgi kohta tuleb lisada üks täht - mis tüüpi muutuja on
		// s - string
		// i - int
		// d - double
		$stmt->bind_param("ss", $email, $password);
		
		//täida käsku
		if ( $stmt->execute() ) {
			echo "õnnestus";
		} else {
			echo "ERROR ".$stmt->error;
		}
		
		
	}
	
	function saveEvent ($age, $color)	{
		$database = "if16_romil";
		
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO whistle (age, color) VALUE (?, ?)");
		
		echo $mysqli->error;
		
		//asendan küsimärgid
		//iga märgi kohta tuleb lisada üks täht - mis tüüpi muutuja on
		// s - string
		// i - int
		// d - double
		$stmt->bind_param("is", $age, $color);
		
		//täida käsku
		if ( $stmt->execute() ) {
			echo "õnnestus";
		} else {
			echo "ERROR ".$stmt->error;
		}
	
	}
?>