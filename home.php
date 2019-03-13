<?php session_start() ?>
<?php include_once('connection.php');  ?>



<?php 
		if(isset($UserID)){
			$query = "SELECT * FROM `users` WHERE `id` = ".$UserID;
			$run =  mysqli_query($connection,$query);
			$Fetch_Selected_Data = mysqli_fetch_assoc($run);
			$User_Array['session_key_username'] = $Fetch_Selected_Data['name'];
			$User_Array['session_key_email'] = $Fetch_Selected_Data['email'];
			$User_Array['session_key_gender'] = $Fetch_Selected_Data['gender'];
			$User_Array['session_key_image'] = $Fetch_Selected_Data['image'];
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
</head>
<body>
<center>
<?php
	$USER_DETAILS = getUserDetailByID($_SESSION['id'], $connection);
 ?>
<h3>Welcome, <?php echo $USER_DETAILS['session_key_username']; ?></h3>
<br>
<span>Email :  <?php echo $USER_DETAILS['session_key_email']; ?></span>
<br>
<span>Gender :  <?php echo $USER_DETAILS['session_key_gender']; ?></span>
<br>
<span>Image :  <img src="uploade/<?php echo $USER_DETAILS['session_key_image']; ?>" width="100" height="100" /></span>
<br>
</center>
<a href="logout.php">logout</a>
</body>
</html>