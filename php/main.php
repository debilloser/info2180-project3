<?php
if (isset($_POST['SUBMIT'])){
	require 'index.php';
	
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
	$password=$_POST['pass'];
	$username=$_POST['email'];
	$phone=$_POST['phone'];
	
   
    $sql= "INSERT INTO users(firstname,lastname, password, email, telephone) VALUES('admin','admin','password123',admin@hireme.com,876454444)";
	if (emty($firstname)||(emty($lastname)||(emty($password)||(emty($username)||(emty($phone)){
		header("Location:../register.html?error=emptyfields&fname"=$firstname."&lname=".$lastname."&phone=".$phone."&email=".$username);
		exit();
		
	}elseif(!filter_var($username, FILTER_VALIDATE_EMAIL)){
	header("Location:../register.html?error=invalidemail&fname"=$firstname."&lname=".$lastname."&phone=".$phone);
	exit();
	
	}elseif(!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}",$password)){
	header("Location:../register.html?error=invalidemail&email"=$username);
	exit();
	
	}else{
		$sql="SELECT*FROM users WHERE email=?;";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../register.html?error= error");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s",$email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result=mysqli_stmt_num_rows($stmt);
			if($resultCheck>0){
				header("Location:../register.html?error=emailalreadyregistered");
			}else{
				$sql= "INSERT INTO users(firstname,lastname, password, email, telephone) VALUES(?,?,?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location:../register.html?error=emailalreadyregistered");
					exit();
				}else{
					$hashedpass= password_hash($password,PASSWORD_DEFAULT );
					mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$hashpass, $username,$phone);
					mysqli_stmt_execute($stmt);
					header("Location:../register.html?success=yeah");
					exit();
				}
			}
		}
	}
}else{
	header("Location:../register.html?error=notsubitted");
	exit();
}

?>