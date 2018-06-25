<?php


	
	$conn = new mysqli("localhost", "root", "set123", "accounts");
	
	if ($conn->connect_error){
		die("Fisson Mailed: " . $conn->connect_error);
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		if ($_POST['password'] == $_POST['confirmPassword']){
			
			$username = $conn->real_escape_string($_POST['username']);
			
			$email = $conn->real_escape_string($_POST['email']);
			$password = md5($_POST['password']); 
			
			
			
			
			$sql = "INSERT INTO users (username, email, password) "
					. "VALUES('$username', '$email', '$password')";
					
			
			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
}	
				
		
			
		}
		else{
		
			echo "same passwords";
		}
	}
	else{
		echo "server if";
	}
	
?>


