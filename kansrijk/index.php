<?php
include 'database.php';

if(isset($_POST['submit'])){

	$fields = ['username', 'password'];
    $error = false;
    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $error = true;
        }
    }
	
	if(!$error){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$db = new database();	
		$db->login($username, $password);
	}
}

?>
<html>
	<head>
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
			<h2>log in</h2>
			<form action="index.php" method="post">
			<label for="Username"><b>Username</b><br></label>
			<input type="text" placeholder="Fill in your username" name="username" required><br><br>
			<label for="Password"><b>Password</b><br></label>
			<input type="password" placeholder="Fill in your password" name="password" required><br><br>
			<input type="submit" name="submit"><br><br>			
		</div>
	</body>
</html>