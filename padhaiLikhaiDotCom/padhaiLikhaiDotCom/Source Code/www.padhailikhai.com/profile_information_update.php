<?php
session_start();
if(isset($_SESSION['userid']))
{
$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	$userid=$_SESSION['userid'];
    $stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid'");
	 $r = oci_execute($stid);
	 $row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	 $_SESSION['userid']=$row2['USERID'];
	 $_SESSION['username']=$row2['FIRSTNAME']." ".$row2['MIDDLENAME.']." ".$row2['LASTNAME'];
	 $_SESSION['usertype']=$row2['USERTYPE'];
	 $_SESSION['email'] =$row2['EMAIL'];
	  $_SESSION['address1'] =$row2['ADDRESS1'];
	  $_SESSION['address2'] =$row2['ADDRESS2'];
	  $_SESSION['address3'] =$row2['ADDRESS3'];
	  $_SESSION['city'] =$row2['CITY'];
	  $_SESSION['state'] =$row2['STATE'];
	  $_SESSION['country'] =$row2['COUNTRY'];
	 oci_free_statement($stid);
	 oci_close($connection);
	 }
	 header("Location:status_message.php");
	 
	 ?>