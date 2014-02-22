<?php
session_start();

if(isset($_SESSION['userid']))
{	

$subject=$_POST["subject"];
$body=$_POST["body"];
$announcerid=$_SESSION['userid'];
$dateofannounce="";
//..........................................................php................................................
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
$stid = oci_parse($connection, "SELECT MAX(ANNOUNCE_ID) FROM ANNOUNCEMENTS");
$r = oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
$announcement_id=$row['MAX(ANNOUNCE_ID)']+1;
$stid2 = oci_parse($connection, "INSERT INTO ANNOUNCEMENTS VALUES('$announcement_id', '$subject', '$body', '$announcerid', '$dateofannounce')");
$r2 = oci_execute($stid2);

// Fetch the results of the query

oci_free_statement($stid);
oci_close($connection);
header("Location:announcements_view.php");
}
else
    {echo "you are currently not logged in";
    }
//...................................................................end of php..........................................	
?>
