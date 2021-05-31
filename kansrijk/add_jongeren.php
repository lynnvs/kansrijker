<?php

include "database.php";

if(isset($_POST['submit'])){

    $fields = ['roepnaam', 'tussenvoegsel', 'achternaam', 'inschrijfdatum'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){

    $jongerecode = NULL;
    $roepnaam= $_POST['roepnaam'];
    $tussenvoegsel= isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '';
    $achternaam= $_POST['achternaam'];
    $inschrijfdatum = $_POST['inschrijfdatum'];

    $database = new database();

    $database->add_jongeren($roepnaam, $tussenvoegsel, $achternaam, $inschrijfdatum);
 }
}
?>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jongeren toevoegen</title>
    <style>
		div{
			float: center;
			text-align: center;			
			margin-left: 40%;
			margin-right:40%;
			border-style: inset;
			background-color: white;
		}
		body{
			background-color: gray;
		}
	</style>
</head>
<body> 
        <div>
            <form action="" method="post">
            <h1>jongeren toevoegen</h1>

                <label for="roepnaam">roepnaam</label>
                <input type="text" name="roepnaam"  required="">
                <br>

                <label for="tussenvoegsel">tussenvoegsel</label>
                <input type="text" name="tussenvoegsel">
                <br>

                <label for="achternaam">achternaam</label>
                <input type="text" name="achternaam" required="">
                <br>

                <label for="inschrijfdatum">inschrijfdatum</label>
                <input type="date" name="inschrijfdatum" required="">
                <br>

                <input type="submit" name="submit" value="submit">
                <a href="jongeren.php" role="button">go back</a>
            </form>  
        </div>
</body>