<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit activiteit</title>

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
require "database.php";
$db = new database();

if(isset($_GET['activiteit_actiecode'])){
    $db = new database();
    $activiteit = $db->select("SELECT * FROM activiteit WHERE actiecode = :actiecode", ['actiecode'=>$_GET['activiteit_actiecode']]);
   //print_r($activiteit);
}
    
// if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE activiteit SET activiteit=:activiteit WHERE actiecode=:actiecode";

    $placeholders = [
        'activiteit'=>$_POST['activiteit'],
        'actiecode'=>$_POST['actiecode']
    ];

    
    $db->update_or_delete($sql, $placeholders);

}
?>
<div>
    <form action="edit_activiteit.php" method="POST">
            <input type="hidden" name="actiecode" value="<?php echo isset($_GET['activiteit_actiecode']) ? $_GET['activiteit_actiecode'] : '' ?>">

            <label for="activiteit">activiteit</label>
            <input type="text"  name="activiteit" placeholder="activiteit" value="<?php echo isset($activiteit) ? $activiteit[0]['activiteit'] : ''?>">
            <input type="submit" value="Edit">
    </form>


<?php
        $db = new database();
        $activiteit = $db->select("SELECT * FROM activiteit", []);
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
	<a href="home.php"> Back home</a><br>
    </div>
</body>
</html>