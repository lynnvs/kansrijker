<?php

include "database.php";

if(isset($_POST['submit'])){

    $fields = ['username', 'email', 'password'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){

    $username= $_POST['username'];
    $email= ($_POST['email']);
    $password= $_POST['password'];

    $database = new database();

    $database->register($username, $email, $password);
 }
}
?>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
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
            <h1>Registreer</h1>

                <label for="username">username</label>
                <input type="text" name="username"  required="" unique="">
                <br>

                <label for="email">email</label>
                <input type="text" name="email" required="" unique="">
                <br>

                <label for="password">password</label>
                <input type="password" name="password" required="">
                <br>

                <input type="submit" name="submit" value="submit">
                <a href="index.php" role="button">Login</a>
            </form>  
        </div>
</body>