<?php
if (isset($_POST['SUBMIT'])){
	require 'index.php';
	
	$jobtitle=$_POST['jobt'];
	$jobdesc=$_POST['desc'];
	$category=$_POST['cat'];
	$company=$_POST['comp'];
	$jobloc=$_POST['jobloc'];
	if (emty($jobtitle)||(emty($jobdesc)||(emty($category)||(emty($company)||(emty($jobloc)){
		header("Location:../register.html?error=emptyfields&jobt"=$jobtitle."&desc=".$jobdesc."&jobloc=".$jobloc."&comp=".$company);
		exit();
		
	}
			else{
				$sql= "INSERT INTO users(jobtitle,jobdesc, category, comp, telejobloc) VALUES(?,?,?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				mysqli_stmt_bind_param($stmt,"sssss",$jobtitle,$jobdesc,$hashcat, $company,$jobloc);
				mysqli_stmt_execute($stmt);
				header("Location:../register.html?success=yeah");
				exit();
				}
			
		
	
}else{
	header("Location:../register.html?error=notsubitted");
	exit();
}

?>