<?php
	session_start();

	//connect database
	$db = mysqli_connect("localhost","root","","authetication");
	if(isset($_POST['submit'])){
	
		$username =$_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		
			//create user
			$hashed_password = sha1($password); //hash password before storing for security purposes
			$sql = "INSERT INTO users(username, email, password) VALUES('{$username}', '{$email}', '{$hashed_password}')";
			$result = mysqli_query($db, $sql);
			if ($result) {
				$_SESSION['message']="You are now logged in";
				$_SESSION['username']=$username;
				header('location: login1.php'); // redirect to home page
			}else{
				header('Location: error.php?error');
				$_SESSION['message'] = "The two passwords do not match";

			}
			
}
		
			//failed
			
		

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
		<h1>Register to the Chefa Shopping</h1>

	</div>

  <?php
            if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>
	
	<form method="post" action="register.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" class="textInput"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			
			<tr>
				<td></td>

				<td><input type="submit" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>

</body>
</html>