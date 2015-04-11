<?php
#Include the connect.php file
include('connect.php');
#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
   print "can't find $database";
}
// get data and store in a json array
$query = "SELECT * FROM employee";


if (isset($_GET['insert']))
{
	// INSERT COMMAND 
	$insert_query = "INSERT INTO `employee`(`employee_fname`, `employee_mname`, `employee_lname`, `employee_age`, `employee_dob`, `employee_gender`, `employee_id_number`,`employee_position`,`employee_house_num`,`employee_street`,`employee_subd`,`employee_block`,`employee_lot_num`,`employee_brgy`,`employee_country`,`employee_postal`,`username`,`password`,`employee_access_level`) VALUES	 ('".$_GET['e_fn']."','".$_GET['e_mn']."','".$_GET['e_ln']."','".$_GET['e_ag']."','".$_GET['e_db']."','".$_GET['e_gd']."','".$_GET['e_en']."','".$_GET['e_po']."','".$_GET['e_hnum']."','".$_GET['e_st']."','".$_GET['e_sb']."','".$_GET['e_bl']."','".$_GET['e_lnum']."','".	$_GET['e_by']."','".$_GET['e_ct']."','".$_GET['e_pl']."','".$_GET['e_un']."','".$_GET['e_pw']."','".$_GET['e_al']."')";
	
   $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
   echo $result;

//echo "SELECT LAST_INSERT_ID()";

}
else if (isset($_GET['update']))
{
	// UPDATE COMMAND 
	$update_query = "UPDATE `employee` SET `employee_fname`='".$_GET['e_fn']."',
	`employee_mname`='".$_GET['e_mn']."',
	`employee_lname`='".$_GET['e_ln']."',
	`employee_age`='".$_GET['e_ag']."',	
	`employee_dob`='".$_GET['e_db']."',
	`employee_gender`='".$_GET['e_gd']."',
	`employee_id_number`='".$_GET['e_en']."',
	`employee_position`='".$_GET['e_po']."',
	`employee_house_num`='".$_GET['e_hnum']."',
	`employee_street`='".$_GET['e_st']."',
	`employee_subd`='".$_GET['e_sb']."',
	`employee_block`='".$_GET['e_bl']."',
	`employee_lot_num`='".$_GET['e_lnum']."',
	`employee_brgy`='".$_GET['e_by']."',
	`employee_country`='".$_GET['e_ct']."',
	`employee_postal`='".$_GET['e_pl']."',
	`username`='".$_GET['e_un']."',
	`password`='".$_GET['e_pw']."',
	`employee_access_level`='".$_GET['e_al']."' WHERE `employee_id`='".$_GET['e_id']."'";
	 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
     echo $result;
}
else if (isset($_GET['delete']))
{
	// DELETE COMMAND 
	$delete_query = "DELETE FROM `employee` WHERE `employee_id`='".$_GET['e_id']."'";	
	$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
    echo $result;
}
else
{
    // SELECT COMMAND
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$t= $row['employee_dob'];
		$formats12=date("m/d/Y", strtotime($t));

		$employees[] = array(
			'e_id' => $row['employee_id'],
			'e_fn' => $row['employee_fname'],
			'e_mn' => $row['employee_mname'],
			'e_ln' => $row['employee_lname'],
			'e_ag' => $row['employee_age'],			
			'e_gd' => $row['employee_gender'],
			'e_en' => $row['employee_id_number'],
			'e_po' => $row['employee_position'],
			'e_hnum' => $row['employee_house_num'],
			'e_st' => $row['employee_street'],
			'e_sb' => $row['employee_subd'],
			'e_bl' => $row['employee_block'],
			'e_lnum' => $row['employee_lot_num'],
			'e_by' => $row['employee_brgy'],
			'e_ct' => $row['employee_country'],
			'e_pl' => $row['employee_postal'],
			'e_un' => $row['username'],
			'e_pw' => $row['password'],
			'e_al' => $row['employee_access_level'],
			'e_db' => $formats12


		  );
	}
	 
	echo json_encode($employees);
}
?>