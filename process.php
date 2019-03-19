<?php
	$username = $_POST['user'];
	$password = $_POST['pass'];


	$connection=mysqli_connect("localhost","root","","login");
	//mysql_select_db("login");

	$result = mysqli_query($connection,"select * from users where username = '$username' and password = '$password'") or die("Failed to query database".mysqli_error());
	$row = mysqli_fetch_array($result);
	if($row['username']  == $username && $row['password'] == $password ) {
	echo "Login Sucess!!! Welcome ".$row['username'];
}
else{
	echo "Failed to login;";
}
?>