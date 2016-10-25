<?php 
	//ühendan sessiooniga
	require("functions.php");
	
	//kui ei ole sisseloginud, suunan login lehele
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");
		exit();
	}
	
	
	//kas aadressireal on logout
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		exit();
		
	}
	
	

?>
<h1>Data</h1>

<!--<?php echo $_SESSION["userEmail"];?>-->

<!--<?=$_SESSION["userEmail"];?>-->

<!--<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a>
	<form method="POST" >
			
			<label>vanus</label><br>
			<input name="age" type="text">
			
			

			input name="color" placeholder="v2rv" type="color">
			
			<br><br>
			
			<input type="submit" value="Save">
		
	</form>
	
</p> -->

<p>
	<form method="POST">
		<label>Harjutuse nimi:</label><br> <input type="text" name="excercise"><br><br>
		
		Korduste arv: 
		<select name="reps">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
		</select>	
		<br><br>
		
		<label>Raskus:</label><br><input type="text" name="weight" size="2"><br><br>
		
		<button name="save" type="submit" value="Salvesta">Salvesta</button>
	</form>
</p>
