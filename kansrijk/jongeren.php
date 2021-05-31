<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jongeren overzicht</title>

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
<body>
    <?php
        $db = new database();
        $jongeren = $db->select("SELECT * FROM jongere", []);
        //print_r($activiteit);

        $columns = array_keys($jongeren[0]);
        $row_data = array_values($jongeren);

    ?>
<div>
<table>
<h2>jongeren overzicht</h2>
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
                    <a type="button" href="edit_jongeren.php?jongere_jongerecode=<?php echo $row['jongerecode']?>">Edit</a>
                </td>
                <td>
                    <a type="button" href="delete_jongeren.php?jongere_jongerecode=<?php echo $row['jongerecode']?>">Delete</a>
            </td>			
		</tr>
	    <?php } ?>
	</table>
    <br><br>
    <a href="add_jongeren.php"> jongeren toevoegen</a><br>
	<a href="home.php"> Back home</a><br>
    <br><br><br><br>
    <a href="instituutkoppel.php"> koppelen aan instituut</a><br>

    </div>
</body>
</html>