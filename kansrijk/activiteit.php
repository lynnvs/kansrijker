<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>activiteiten overzicht</title>

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
    <?php
        $db = new database();
        $activiteit = $db->select("SELECT * FROM activiteit", []);
        //print_r($activiteit);

        $columns = array_keys($activiteit[0]);
        $row_data = array_values($activiteit);

    ?>
<div>
<table>
<h2>activiteiten overzicht</h2>
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
            <td>
                    <a type="button" href="edit_activiteit.php?activiteit_actiecode=<?php echo $row['actiecode']?>">Edit</a>
                </td>
                <td>
                    <a type="button" href="delete_activiteit.php?activiteit_actiecode=<?php echo $row['actiecode']?>">Delete</a>
            </td>			
		</tr>
	    <?php } ?>
	</table>
    <br><br>
    <a href="add_activiteit.php"> activiteit toevoegen</a><br>
    <a href="activiteit-per-deelnemer.php">Activiteit per deelnemer bekijken</a><br>
	<a href="home.php"> Back home</a><br>

    </div>
</body>
</html>