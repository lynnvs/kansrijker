<?php
include 'database.php';
$db = new database();

if(isset($_GET['account_id'])){
    $db = new database();
    $account = $db->select("SELECT * FROM account WHERE id = :id", ['id'=>$_GET['account_id']]);
    print_r($account);
}
    
// if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE account SET username=:username, email=:email created_at=:created_at WHERE id=:id";

    $placeholders = [
        'username'=>$_POST['username'],
        'email'=>$_POST['email']
    ];

    
    $db->update_or_delete($sql, $placeholders);
    header('location:medewerker.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit medewerker</title>

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
    <h2>Edit medewerker</h2>
        <form action="edit_medewerker.php" method="POST">
            <input type="hidden" name="id" value="<?php echo isset($_GET['account_id']) ? $_GET['account_id'] : '' ?>">
            <label for="username">username</label>
            <input type="text" name="username" placeholder="username" value="<?php echo isset($medewerker) ? $medewerker[0]['username'] : ''?>">
            <br>
            <label for="email">email</label>
            <input type="text" name="email" placeholder="email" value="<?php echo isset($medewerker) ? $medewerker[0]['email'] : ''?>">
            <br>
            <br>
            <input type="submit" name="submit" value="Edit">
            <a href="medewerker.php"> go back</a><br>
        </form>
    </div>

    
</body>
</html>