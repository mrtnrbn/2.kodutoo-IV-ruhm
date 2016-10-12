<?php 
	//ühendan sessiooniga
	require("functions.php");
	
	//kui ei ole sisseloginud, suunan login lehele
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");
	}
	
	
	//kas aadressireal on logout
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}
	
	if ( isset($_POST["age"])&&
		 isset($_POST["color"])&&
		 !empty($_POST["age"])&&
		 !empty($_POST["color"]) ) {
		
		$color = cleanInput($_POST["color"]);
		
		saveEvent(cleanInput($_POST["age"], $_POST["color"]), $color);
		
		
		 }
?>
<h1>Data</h1>

<?php echo $_SESSION["userEmail"];?>

<?=$_SESSION["userEmail"];?>

<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a>
	<form method="POST" >
			
			<label>vanus</label><br>
			<input name="ageDB" type="text">
			
			<br><br>

			<input name="colorDB" placeholder="v2rv" type="color">
			
			<br><br>
			
			<input type="submit" value="Save">
		
	</form>
	
</p>