<?php
if (isset($_POST['LOGIN'])){
	require 'index.php';
	
	$password=$_POST['pass'];
	$username=$_POST['email'];
	if (emty($password)||(emty($username)){
		header("Location:../index.html?error=emptyfields&email=".$username);
		exit();
		
	}elseif(!filter_var($username, FILTER_VALIDATE_EMAIL)){
	header("Location:../index.html?error=invalidemail");
	exit();
	
	}elseif(!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}",$password)){
	header("Location:../index.html?error=invalidemail&email"=$username);
	exit();
	
	}else{
		$sql="SELECT*FROM users WHERE email=?;";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../index.html?error= error");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"ss",$username,$username);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result$stmt);
			if($row=mysqli_fetch_assoc($result)){
				$checkpass=password_verify($password,$row['passuser']);
				if ($checkpass==false){
					header("Location:../index.html?error=passworderror");
					exit();
				}else if($checkpass==true){
					session_start();
					$SESSION['userid']=$row['id'];
					$SESSION['useremail']=$row['email'];
				}
			} 
		}
	}
}else{
	header("Location:../register.html?error=notsubitted");
	exit();
}

?>