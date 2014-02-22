<?php
$name1_received=$_POST["name1"];
$name2_received=$_POST["name2"];
$name3_received=$_POST["name3"];
$email_received=$_POST["e_mail"];
$username_received=$_POST["user_name"];
$password_received=$_POST["password"];
$address1_received=$_POST["addressline1"];
$address2_received=$_POST["addressline2"];
$address3_received=$_POST["addressline3"];
$city_received=$_POST["city"];
$state_received=$_POST["state"];
$country_received=$_POST["country"];
$usertype_received=$_POST["usertype"];

//$redirection_url="loginfail.php";
//..........................................................php................................................
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');

$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERS WHERE USERNAME='$username_received'");
$r = oci_execute($stid);
// Fetch the results of the query
$row1 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if (!$row1)
{
$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE EMAIL='$email_received'");
$r = oci_execute($stid);
// Fetch the results of the query
$row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if(!$row2)
{
$stid = oci_parse($connection, "INSERT INTO PADHAILIKHAI_USERS VALUES('$username_received', '$password_received')");
$r = oci_execute($stid);

	
$stid = oci_parse($connection, "SELECT MAX(USERID) FROM PADHAILIKHAI_USERINFO");
$r = oci_execute($stid);
// Fetch the results of the query
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
$userid_retrieved=$row['MAX(USERID)'];
$new_userid=$row['MAX(USERID)']+1;
$stid = oci_parse($connection, "INSERT INTO PADHAILIKHAI_USERINFO VALUES('$new_userid','$username_received','$email_received','$address1_received','$address2_received','$address3_received','$city_received','$state_received','$country_received','$usertype_received','$name1_received','$name2_received','$name3_received')");
if($r = oci_execute($stid))
{
session_start();
	  $_SESSION['userid']=$new_userid;
	  $_SESSION['username']=$name1_received." ".$name2_received." ".$name3_received;
	  $_SESSION['usertype'] =$usertype_received;
	  oci_free_statement($stid);
	  oci_close($connection); 
	  header("Location:account_settings.php");
	  }


}
else
{echo "this email has already been registered";
}
}
else
{echo "username already exists";
}
oci_free_statement($stid);
oci_close($connection);  
//header("Location:$redirection_url");
//..............................................................end of php..........................................	
?>
