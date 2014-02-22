<?php
session_start();
$_SESSION['status']="your profile picture could not be uploaded";
if(isset($_SESSION['userid']))
{
if($_FILES["file"]["error"]<=0)
{
if((($_FILES["file"]["type"]=="image/jpeg")||($_FILES["file"]["type"]=="image/jpg"))&&($_FILES["file"]["size"]<2000000))
{$exten=".jpg";
 $_FILES["file"]["name"]=$_SESSION['userid'].$exten;
 move_uploaded_file($_FILES["file"]["tmp_name"],"profile_pics/" . $_FILES["file"]["name"]);
 $_SESSION['status']="Profile picture uploaded successfully";
 }
 }
 }
 header("Location:status_message.php");
?>