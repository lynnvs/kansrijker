<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>instituut overzicht</title>

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
        $instituut = $db->select("SELECT * FROM instituut", []);
        //print_r($activiteit);

        $columns = array_keys($instituut[0]);
        $row_data = array_values($instituut);

    ?>
<div>
<table>
<h2>instituut overzicht</h2>
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
                    <a type="button" href="edit_instituut.php?instituut_instituutcode=<?php echo $row['instituutcode']?>">Edit</a>
                </td>
                <td>
                    <a type="button" href="delete_instituut.php?instituut_instituutcode=<?php echo $row['instituutcode']?>">Delete</a>
            </td>			
		</tr>
	    <?php } ?>
	</table>
    <br><br>
    <a href="add_instituut.php"> instituut toevoegen</a><br>
	<a href="home.php"> Back home</a><br>

    </div>
</body>
</html>