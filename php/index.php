<?php

$servername ="localhost";
$dBusername="root";
$dBpassword="";
$dBname="proj3";


$conn= mysqli_connect($servername,$dBusername,$dBpassword,$dBname);
if (!$conn){
	die("Error faild Connection:".mysqli_connet_error());
}
?>