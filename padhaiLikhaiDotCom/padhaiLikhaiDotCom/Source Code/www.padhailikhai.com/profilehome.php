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
<link href="profilehome.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		
		<h1><a href="#"><img src="images/padhai_logo.jpg"></a></h1>
		
	</div>
	<div id="menu">
		<ul>
			<li><a href="home.php">Home</a></li>
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
							<li class="current_page_item"><a href="#">Profile</a></li>
							<li><a href="#">Classroom</a></li>
							<li><a href="#">Assignments</a></li>
							<li><a href="testmodule.php">Tests</a></li>
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
	
	// retrieving user ifo from the database
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	
	
?>
						<h2 class="title"><?php echo "Welcome ".$_SESSION['username']; ?> to PADHAI LIKHAI.com </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
						<table>
						<?php
						echo "<tr>";
						echo "<th>Usertype</th>";
						echo "<td>".$_SESSION['usertype']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>E-mail</th>";
						echo "<td>".$_SESSION['email']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>Address</th>";
						echo "<td>".$_SESSION['address1']." ".$_SESSION['address2']." ".$_SESSION['address3']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>City</th>";
						echo "<td>".$_SESSION['city']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>State</th>";
						echo "<td>".$_SESSION['state']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>Country</th>";
						echo "<td>".$_SESSION['country']."</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>Subjects:</th>";
						echo "<td>";
						$stid = oci_parse($connection, "SELECT * FROM SUBJECT_TABLE WHERE SUBJECT_ID IN (SELECT SUBJECT_ID_FOREIGN FROM USER_SUBJECT_TABLE WHERE USER_ID_FOREIGN='$userid_active') ORDER BY SUBJECT_ID");
						$r = oci_execute($stid);
						while($row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
						{echo $row2['SUBJECTNAME'].",   ";
						}
						echo "</td></tr>";
						
	oci_free_statement($stid);
	oci_close($connection);  
						
						?>
						
						</table>
						</div>
					</div>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
<!-- end #content -->
				
</div>  



			
<div id="footer">
	<p>Copyright � 2010 Padhai Likhai.  All rights reserved.</p>
</div>



</body>
</html>
<?php
}
else
    {echo "you are currently not logged in";
    }
?>