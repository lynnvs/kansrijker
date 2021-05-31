<?php

include 'database.php';

if(isset($_POST['submit'])){
	echo 1;
	$fieldnames = array(
		'actiecode','jongerecode'
	);

	if($fields_validated){	
	
		$db = new database;
		echo "connected";
		$activiteitcode = $_POST["activiteitcode"];
		$jongerecode = $_POST["jongerecode"];		

		echo 'New jonger is added'."<br>";

		$db->koppel($activiteitcode, $jongerecode);
	}
}
?>
<html>	
	<head>	
    <style>
		div{
			float: center;
			text-align: center;			
			margin-left: 30%;
			margin-right:30%;
			border-style: inset;
			background-color: white;
		}
		body{
			background-color: gray;
		}
	</style>
	</head>
		<div>

			<form action="" method="post">
				<label for="Jongere"><b>Jongere</b><br></label>
				<input type="" placeholder="Fill in your Jongere" name="jongerecode" required><br><br>
				<label for="activiteit"><b>Activiteit</b><br></label>
				<input type="text" placeholder="Fill in your Activiteit" name="activiteitcode" required><br><br>
				<input type="submit" name="submit">
		
		<a href="jongeren.php"> Back home</a><br>
        </div>
</html>