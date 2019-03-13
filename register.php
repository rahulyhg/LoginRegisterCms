<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>
	<center>
		<h1>Register Here</h1>
		<form method="post" action="" enctype="multipart/form-data">
			<label>Name:</label>
			<input type="text" name="name" placeholder="name"><br>
			<label>Email:</label>
			<input type="email" name="email" placeholder="email"><br>
			<label>Passord:</label>
			<input type="password" name="password" placeholder="password"><br>
			<label>Gender:</label>
			<input type="radio" name="gender" value="male"  checked="checked"   >Male  <!-- To rmeove the error we need to add default value -->
			<input type="radio" name="gender" value="female">Female
			<br>
			<input type="file" name="image" id="file">
			<br>
			<input type="submit" name="register" value="Register">
		</form>
	</center>
</body>
</html>
<?php 

	if(isset($_POST['register'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		move_uploaded_file($tempname, "uploade/$imagename");

			if(!empty($name) && !empty($email) && !empty($password) && !empty($gender)){
			$sql = "INSERT INTO `users`(`name`, `email`, `password`,`gender`,`image`) VALUES ('$name','$email','$password','$gender','$imagename')";
			$run = mysqli_query($connection,$sql);
			header("location:login.php");
			
	}
	else{echo 'please fill all inputs';}
	}		

?>
