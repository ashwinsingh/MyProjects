<?php
 
$user = strip_tags(trim($_REQUEST['username']));
 
if(strlen($user) <= 0)
{
  echo json_encode(array('code'  =>  -1,
  'result'  =>  'Invalid username, please try again.'
  ));
  die;
}
 
// Query database to check if the username is available
$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERS WHERE USERNAME = '$user'");
$r = oci_execute($stid);
// Execute the above query using your own script and if it return you the
// result (row) we should return negative, else a success message.
 
$available = true;
 
if(!$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
{
  echo json_encode(array('code'  =>  1,
  'result'  =>  "Success,username $user is still available"
  ));
  die;
}
else
{
  echo  json_encode(array('code'  =>  0,
  'result'  =>  "Sorry but username $user is already taken."
  ));
  die;
}
die;
?>