<?php
	session_start();

	//connect database
	$db = mysqli_connect("localhost", "root", "", "authetication");
	if(isset($_POST['submit'])){
		
		$username = mysqli_real_escape_string($db,$_POST['username']);
	
		$password = mysqli_real_escape_string($db,$_POST['password']);

		$hashed_password = sha1($password);//remember we hashed password before storing last time
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
		$result = mysqli_query($db, $sql);

		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			echo '<script>alert("successfully login!")</script>';
			header('location: log.php'); 
		}else{
			$_SESSION['message'] = "Username/Password combination incorrect";
		}

	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
	<style type="text/css">
	body{
			background-image: url(qwe.jpg);
			background-size: cover;
			background-attachment: fixed;
		}
		</style>

	<div class="header">
		<h1>Login to the Chefa Shopping</h1>

	</div>

	  <?php
            if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>


	<form method="post" action="login1.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			<tr>
				<td></td>

				<td><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>

</body>
</html>