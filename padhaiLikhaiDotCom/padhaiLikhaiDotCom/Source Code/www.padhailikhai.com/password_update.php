<?php
session_start();
$redirection_url="home.php";
$_SESSION['status']="Your password could not be updated";
if(isset($_SESSION['userid']))
{$userid_active=$_SESSION['userid'];
$email=$_POST["current_email"];
$current_password=$_POST["current_password"];
$new_password=$_POST["new_password"];
$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid_active'");
$r = oci_execute($stid);
if($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
{
if($email==$row['EMAIL'])
{
$username=$row['USERNAME_FOREIGN'];
$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERS WHERE USERNAME='$username'");
$r = oci_execute($stid);
if($row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
{
if($current_password==$row2['PASSWORD'])
{
$stid = oci_parse($connection, "UPDATE PADHAILIKHAI_USERS SET PASSWORD='$new_password' WHERE USERNAME='$username'");
if($r = oci_execute($stid))
{
$_SESSION['status']="your password has been updated successfully";
}
}
}
}
}
oci_free_statement($stid);
oci_close($connection);
$redirection_url="status_message.php";
}
header("Location:$redirection_url");
?>