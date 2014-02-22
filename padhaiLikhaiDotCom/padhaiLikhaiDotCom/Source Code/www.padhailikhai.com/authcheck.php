<?php
$uname_received=$_POST["username"];
$pword_received=$_POST["password"];
$rememberme=$_POST["RememberMe"];
$redirection_url="loginfail.php";
//..........................................................php................................................
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');

$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERS WHERE USERNAME='$uname_received'");

$r = oci_execute($stid);

// Fetch the results of the query

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) 
   {if($uname_received==$row['USERNAME'] && $pword_received==$row['PASSWORD'])
     {$redirection_url="profilehome.php";
	 $stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERNAME_FOREIGN='$uname_received'");
	 $r = oci_execute($stid);
	 $row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	  if($rememberme=="Yes")
	  {
	  setcookie("user",$row2['USERID'],time()+3600*24);
	  }
	  session_start();
	  $_SESSION['userid']=$row2['USERID'];
	  $_SESSION['username']=$row2['FIRSTNAME']." ".$row2['MIDDLENAME.']." ".$row2['LASTNAME'];
	  $_SESSION['usertype'] =$row2['USERTYPE'];
	  $_SESSION['email'] =$row2['EMAIL'];
	  $_SESSION['address1'] =$row2['ADDRESS1'];
	  $_SESSION['address2'] =$row2['ADDRESS2'];
	  $_SESSION['address3'] =$row2['ADDRESS3'];
	  $_SESSION['city'] =$row2['CITY'];
	  $_SESSION['state'] =$row2['STATE'];
	  $_SESSION['country'] =$row2['COUNTRY'];
	  }
	}
	/*if(isset($_SESSION['userid']))
	{echo $rememberme;
	echo $_SESSION['userid'];}*/
oci_free_statement($stid);
oci_close($connection);  
header("Location:$redirection_url");
//..............................................................end of php..........................................	
?>
