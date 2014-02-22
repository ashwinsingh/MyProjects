<?php
$name1_received=$_POST["name1"];
$name2_received=$_POST["name2"];
$name3_received=$_POST["name3"];
$email_received=$_POST["e_mail"];
$address1_received=$_POST["addressline1"];
$address2_received=$_POST["addressline2"];
$address3_received=$_POST["addressline3"];
$city_received=$_POST["city"];
$state_received=$_POST["state"];
$country_received=$_POST["country"];
session_start();
if(isset($_SESSION['userid']))
{$userid_active=$_SESSION['userid'];
//$redirection_url="loginfail.php";
//..........................................................php................................................
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');

$stid = oci_parse($connection, "UPDATE PADHAILIKHAI_USERINFO SET FIRSTNAME='$name1_received', MIDDLENAME='$name2_received', LASTNAME='$name3_received', EMAIL='$email_received', ADDRESS1='$address1_received', ADDRESS2='$address2_received', ADDRESS3='$address3_received', CITY='$city_received', STATE='$state_received', COUNTRY='$country_received' WHERE USERID='$userid_active'");
if($r = oci_execute($stid))
{$_SESSION['status']="Your profile has been updated succesfully";
}
oci_free_statement($stid);
oci_close($connection); 
}
else
{$_SESSION['status']="Your profile could not be updated.";
}
 
header("Location:profile_information_update.php");


//..............................................................end of php..........................................	
?>
