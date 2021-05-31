<?php
include "database.php";
if(isset($_POST['submit'])){

    $fields = ['activiteit'];

    $error = false;
    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $activiteit= $_POST['activiteit'];
    $db = new database();
    $db->activiteit_toevoegen($activiteit);
 }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>activiteit toevoegen</title>

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
        <h1>activiteit toevoegen</h1>

        <label for="activiteit">activiteit</label>
            <input type="text" name="activiteit" required="">
            <br>

        <input type="submit" name="submit" value="submit">
    </form>
        <br>
    <?php
        $db = new database();
        $activiteit = $db->select("SELECT activiteit FROM activiteit", []);
        //print_r($activiteit);

        $columns = array_keys($activiteit[0]);
        $row_data = array_values($activiteit);

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
	<a href="activiteit.php"> Back home</a><br>

    </div>
</body>