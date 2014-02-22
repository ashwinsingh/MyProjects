<?php
session_start();
echo $_SESSION['userid'];
echo $_SESSION['usertype'];
if (!isset($_SESSION['userid']))
{echo "muhahaha1";
if (isset($_COOKIE["user"]))
   {echo "muhahaha";
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	$userid=$_COOKIE["user"];
    $stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid'");
	 $r = oci_execute($stid);
	 $row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	 setcookie("user",$row2['USERID'],time()+3600*24);
	 session_start();
	 $_SESSION['userid']=$row2['USERID'];
	 $_SESSION['username']=$row2['FIRSTNAME']." ".$row2['MIDDLENAME.']." ".$row2['LASTNAME'];
	 $_SESSION['usertype'] =$row2['USERTYPE'];
	 oci_free_statement($stid);
	 oci_close($connection); 
	}
	
}
if(isset($_SESSION['userid'])){	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PadhaiLikhai.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="announcements_view.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		
		<h1><a href="#"><img src="images/padhai_logo.jpg"></a></h1>
		
	</div>
	<div id="menu">
		<ul>
			<li><a href="home.php">home</a></li>
			<li><a href="aboutus.php">about us</a></li>
			<li><a href="faq.php">faq</a></li>
			<li><a href="blog.php">blog</a></li>
			<li><a href="help.php">help</a></li>
			<li><a href="contactus.php">contact us</a></li>
			<li><a href="logout.php">logout</a></li>
		</ul>
	</div>

</div>




<div id="middle">  
<div id="sidebar">
					<?php
if(file_exists("profile_pics/".$_SESSION['userid'].".jpg"))
{
echo "<img src=\"profile_pics/".$_SESSION['userid'].".jpg\" class=\"resize\" alt=\"my photo\" />";
}
else
{ ?>					<img src="face.jpg" class="resize" alt="my photo" />   <?php } ?>
					<div id="menu2">
						<ul>
							<br/>
							<li><a href="profilehome.php">Profile</a></li>
							<li><a href="#">Classroom</a></li>
							<li><a href="#">Assignments</a></li>
							<li><a href="testmodule.php">Tests</a></li>
							<li><a href="#">Scheduler</a></li>
							<li><a href="progress_report.php">Progress Report</a></li>
							<li class="current_page_item"><a href="announcements_view.php">Announcements</a></li>
							<li><a href="account_settings.php">Account Settings</a></li>
						</ul>
					</div>
</div>
				<!-- end #sidebar -->
<div id="content">
					<div class="post">

					
<?php
	echo "<P>".$_COOKIE["user"]."</p>";
	$userid_active=$_SESSION['userid'];
	
	
	 
?>	
						<h2 class="title"><?php echo "Welcome ".$_SESSION['username']; ?>. Ready to take tests? </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
							<?php
//..........................................................php................................................
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');

$stid = oci_parse($connection, "SELECT * FROM ANNOUNCEMENTS ORDER BY ANNOUNCE_ID DESC");


$r = oci_execute($stid);

// Fetch the results of the query

echo "<table id=\"blog\">\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
{
$announcerid=$row['ANNOUNCER_ID_FOREIGN'];
$stid2 = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$announcerid'");
$r2 = oci_execute($stid2);
$row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS);
echo "<tr><td>Announcement Id:".$row['ANNOUNCE_ID']."</td></tr>";
echo "<tr><td><h>Subject: ".$row['SUBJECT']."</h></td></tr>";
echo "<tr><td><p>".$row['BODY']."</p></td></tr>";
echo "<tr><td><h2>Posted by:".$row2['FIRSTNAME']." ".$row2['MIDDLENAME']." ".$row2['LASTNAME']."</h2></td></tr>";
echo "<tr></tr>";
}
echo "</table>\n";

oci_free_statement($stid);
oci_close($connection);
//...................................................................end of php.......................................
?>


							
						
						</div>
					</div>
					<table>
					<tr><th><?php
if ($_SESSION['usertype']=="faculty")
{
?><a href="faculty_announcement.php">Click here to add announcements</a><?php
						}
						?></th></tr>
					</table>
					
					<br/><br/>
				</div>
<!-- end #content -->
				
</div>  



			
<div id="footer">
	<p>Copyright © 2010 Padhai Likhai.  All rights reserved.</p>
</div>



</body>
</html>
<?php
}
else
    {echo "you are currently not logged in";
    }
?>