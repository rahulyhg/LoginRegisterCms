<?php session_start() ?>
<?php include_once('connection.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<h1>Login</h1>
	<form method="post" action="">
	<input type="text" name="email" placeholder="email"><br>
	<input type="password" name="password" placeholder="password"><br>
	<input type="submit" name="login" value="login">
	</form>
	</center>
</body>
</html> 
<?php


	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

	$query = "SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'";
	$run =  mysqli_query($connection,$query);
	if(mysqli_num_rows($run) > 0){


		$Fetch_Selected_Data = mysqli_fetch_assoc($run);
		$USER_ID = $Fetch_Selected_Data['id'];
		$_SESSION['id'] = $USER_ID;
		

		header('location:home.php');
	}else{echo "your password and email not matched";}

}
?>