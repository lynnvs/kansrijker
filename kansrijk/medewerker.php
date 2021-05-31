<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medewerker overzicht</title>

    <style>
		div{
			float: center;
			text-align: center;			
			margin-left: 35%;
			margin-right:35%;
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
        $medewerker = $db->select("SELECT id, username, email, created_at FROM account", []);
        //print_r($medewerker);

        $columns = array_keys($medewerker[0]);
        $row_data = array_values($medewerker);

    ?>
<div>
<table>
<h1>overzicht medewerker</h1>
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
                    <a type="button"  href="edit_medewerker.php?account_id=<?php echo $row['id']?>">Edit</a>
                
                </td>
                <td>
                    <a type="button"  href="delete_medewerker.php?account_id=<?php echo $row['id']?>">Delete</a>
                </td>			
		</tr>
	    <?php } ?>
	</table>
    <a href="register.php"> medewerker toevoegen</a><br>
	<a href="home.php"> Back home</a><br>

    </div>
</body>
</html>