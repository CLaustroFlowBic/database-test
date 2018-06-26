<?php


	require_once "login.html";
	$conn = new mysqli("localhost", "root", "set123", "accounts");
	
	if ($conn->connect_error){
		die("Fisson mailed: " . $conn->connect_error);
		
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
		
	
		
		$sql = "SELECT * FROM users WHERE username='$username'";	
		
		if($result=mysqli_query($conn, $sql)){
			$count=mysqli_num_rows($result);
		}
		
		if($count==1){
			
			$row = mysqli_fetch_assoc($result);
			if (crypt($password, $row['password']) == $row['password']){
				echo "Login Successful";
				session_register("username");
				session_register("password"); 
			}
			else{
				echo "Wrong username or password";
			}
		}
		else{
			echo "Wrong Username or Password";
		}
	}
		
	
?>

