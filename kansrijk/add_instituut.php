<?php
include "database.php";
if(isset($_POST['submit'])){

    $fields = ['instituut'];

    $error = false;
    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $instituut= $_POST['instituut'];
    $telefooninstituut= $_POST['telefooninstituut'];
    $db = new database();
    $db->instituut_toevoegen($instituut, $telefooninstituut);
 }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>instituut toevoegen</title>

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
        <h1>instituut toevoegen</h1>

        <label for="instituut">instituut</label>
            <input type="text" name="instituut" required="">
            <br>
        
        <label for="telefooninstituut">telefoon</label>
            <input type="text" name="telefooninstituut" required="">
            <br>

        <input type="submit" name="submit" value="submit">
    </form>
        <br>
    <?php
        $db = new database();
        $instituut = $db->select("SELECT instituut, telefooninstituut FROM instituut", []);
        //print_r($activiteit);

        $columns = array_keys($instituut[0]);
        $row_data = array_values($instituut);

    ?>
<table>
	<thead>
		<tr>
		    <?php foreach($columns as $column){ ?>
				<th>
					<strong> <?php echo $column ?> </strong>
				</th>
			<?php } ?>					
		</tr>
	</thead>
	<?php foreach($row_data as $rows => $row){ ?>

	<?php $row_id = $row; ?>
		<tr>
			<?php   foreach($row as $data_row){?>					
				<td>
					<?php echo $data_row ?>
				</td>
			<?php } ?>			
		</tr>
	    <?php } ?>
	</table>
    <br><br>
	<a href="overzicht_instituut.php"> Back home</a><br>

    </div>
</body>