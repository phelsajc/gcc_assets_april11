<?php

$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";//server
$dbname		= "db_gcc_assets2";//database name
$dbuser		= "root";//username
$dbpass		= "";//no password

// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// new data
$user = $_POST['list'];
$password = $_POST['password'];

if($user == '') {
	$errmsg_arr[] = 'You must enter your Username';
	$errflag = true;
}
if($password == '') {
	$errmsg_arr[] = 'You must enter your Password';
	$errflag = true;
}

// query
$result = $conn->prepare("SELECT * FROM employee WHERE username= :hjhjhjh AND password= :asas");
$result->bindParam(':hjhjhjh', $user);
$result->bindParam(':asas', $password);
$result->execute();
//$rows = $result->fetch(PDO::FETCH_NUM)	;


if($sess=$result->fetch()){

session_start();
			$_SESSION['fname']=$sess['employee_fname'];
			$mname=$sess['employee_mname'];
			$_SESSION['mname']=substr($mname,0,1);
			$_SESSION['lname']=$sess['employee_lname'];
			$_SESSION['access']=$sess['employee_access_level'];
			$_SESSION['full']=$_SESSION['fname'].' '.$_SESSION['mname'].'. '.$_SESSION['lname'];

header("location: ../main.php");

}

/*if($rows > 0) {
header("location: ../main.php");
}*/
else{
	$error="username or password is incorrect";
	header("Location: ../../index.php?id=$error");	

}

?>