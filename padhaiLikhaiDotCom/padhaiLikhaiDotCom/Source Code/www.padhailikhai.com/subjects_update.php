<?php
session_start();
if (isset($_SESSION['userid']))
{$userid_active=$_SESSION['userid'];
$rowidno=1;
$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
while($rowidno!=$_SESSION['rowidno'])
{$rowid="rowidis".$rowidno;
 $subjectid_active=$_POST[$rowid];
 //echo $subjectid_active;
 if($subjectid_active)
 {
 $stid = oci_parse($connection, "INSERT INTO USER_SUBJECT_TABLE VALUES('$userid_active','$subjectid_active')");
 $r = oci_execute($stid);
 }
 $rowidno=$rowidno+1;
}
oci_free_statement($stid);
oci_close($connection);
header("Location:profilehome.php");
}

?>