<?php


	include_once 'login.html';
	$conn = new mysqli("localhost", "root", "set123", "accounts");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		
		$sql="SELECT * FROM users WHERE username='$username'";
		
		if ($result=mysqli_query($conn, $sql)){
			$count=mysqli_num_rows($result);
		}
		else{
			echo "noo";
		}
		echo $count;
		
		if($count==1){
			
			$row = mysqli_fetch_assoc($result);
			
			if (crypt($password, $row['password']) == $row['password']){
				echo "Login Successful";
				session_register("username");
				session_register("password"); 
				
				
			}
			else{
			
				echo "Wrong  Password";
				
			}
		}
		else{
			
			echo "No usernames match";
			
		}

	}
	/*
	$sql = "SELECT id, username, email FROM users";
	
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["username"] . $row['id'] . $row['email'];
		}
	} else {
			echo "0 results";
	}
	*/
	$conn->close();
?>

