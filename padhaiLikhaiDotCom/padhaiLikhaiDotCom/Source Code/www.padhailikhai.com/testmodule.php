<?php
session_start();
echo $_SESSION['userid'];
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
<link href="testmodule.css" rel="stylesheet" type="text/css" />
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
							<li class="current_page_item"><a href="testmodule.php">Tests</a></li>
							<li><a href="#">Scheduler</a></li>
							<li><a href="progress_report.php">Progress Report</a></li>
							<li><a href="announcements_view.php">Announcements</a></li>
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
	
	// retrieving question paper list from the database
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	$stid = oci_parse($connection, "SELECT * FROM QUESTIONPAPER_LIST WHERE TESTID NOT IN (SELECT TESTID_FOREIGN FROM COMPLETED_TESTS WHERE USERID_FOREIGN='$userid_active') ORDER BY TESTID");
	 $r = oci_execute($stid);
	 
?>	
						<h2 class="title"><?php echo "Welcome ".$_SESSION['username']; ?>. Ready to take tests? </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
							<form action="taketest.php" method="POST">
							<table border=1>
							<tr>
							<th></th>
							<th>Test ID</th>
							<th>Subject</th>
							<th>Max. Marks</th>
							<th>No. of Questions</th>
							<th>Date of upload</th>
							</tr>
							<?php
							while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)){
							?>
							
							<?php 
							echo "<tr>";
							echo "<td><input type=\"radio\" name=\"testform\" value=\"".$row['TESTID']."\"></td>";
							echo "<td>".$row['TESTID']."</td>";
							echo "<td>".$row['SUBJECTNAME']."</td>";
							echo "<td>".$row['MAXMARKS']."</td>";
							echo "<td>".$row['NUMBEROFQUESTIONS']."</td>";
							echo "<td>".$row['DATEOFUPLOAD']."</td>";
							echo "</tr>";
							 }
							?>
							</table>
							<input type="submit" value="take test">
							</form>
							<p class="links"><a href="#">Read More</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Comments</a></p>
						</div>
					</div>
					<?php
					oci_free_statement($stid);
	oci_close($connection);  
?>
					<div style="clear: both;">&nbsp;</div>
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