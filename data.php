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
	
	
	$exercise = "";
	$reps = "";
	$weight = "";
	
	if ( isset($_POST["exercise"])&&
		 isset($_POST["reps"])&&
		 isset($_POST["weight"])&&
		 !empty($_POST["exercise"])&&
		 !empty($_POST["reps"])&&
		 !empty($_POST["weight"])	)
		
			{
		
		$exercise = $_POST["exercise"];
		$reps = $_POST["reps"];
		$weight = $_POST["weight"];
		
		saveExercise ($exercise, $reps, $weight);
		
		
			}

	$people = getAllPeople();

	
	//muutujad
	
	

?>
<h1>Data</h1>

<!--<?php echo $_SESSION["userEmail"];?>-->

<!--<?=$_SESSION["userEmail"];?>-->

<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a>
	
	
</p>

<p>
	<form method="POST">
		<label>Harjutuse nimi:</label><br> <input type="text" name="exercise"><br><br>
		
		<label>Korduste arv:</label><br> <input type="text" name="reps"><br><br>
		
		<label>Raskus:</label><br><input type="text" name="weight"><br><br>
		
		<input type="submit" value="Sisesta">
	</form>
</p>

	<h2>Arhiiv</h2>
	
<?php
	
		$html = "<table class='table table-striped'>";
		$html = "<table>";
			$html .= "<tr>";
				$html .= "<th>exercise</th>";
				$html .= "<th>weight</th>";
				$html .= "<th>reps</th>";
			$html .="</tr>";
		
		
		
		foreach ($people as $p) {
			
			$html .= "<tr>";
				$html .= "<td>".$p->exercise."</td>";
				$html .= "<td>".$p->weight."</td>";
				$html .= "<td>".$p->reps."</td>";
			$html .= "</tr>";
		}
		$html .= "</table>";			
	
	echo $html;
	
	
?>
