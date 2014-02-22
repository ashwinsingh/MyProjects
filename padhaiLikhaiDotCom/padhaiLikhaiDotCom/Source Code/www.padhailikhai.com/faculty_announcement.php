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
<link href="faculty_announcement.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		
		<h1><a href="#"><img src="images/padhai_logo.jpg"></a></h1>
		
	</div>
	<div id="menu">
		<ul>
			<li><a href="profilehome.php">Home</a></li>
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
	$userid_active=$_COOKIE["user"];
	
	// retrieving user ifo from the database
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid_active'");
	 $r = oci_execute($stid);
	 $row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	oci_free_statement($stid);
	oci_close($connection);  
?>
						<h2 class="title"><?php echo "Welcome ".$row2['FIRSTNAME']." ".$row2['MIDDLENAME']." ".$row2['LASTNAME']; ?> to PADHAI LIKHAI.com </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<?php
						if ($_SESSION['usertype']=="faculty")
	{
?>
						<div class="entry">
							<form name "announcement_form" action="announcement_update.php" method="post">
							<table>
							
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>	
							<tr>
							<td> Subject (*) : </td>
							<td><input type="text" name="subject" maxlength=200 size="50" /></td>
							</tr>
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>	
							<tr>
							<td> Body (*) : </td>
							<td><textarea name="body" rows="5" cols="50"></textarea></td>
							</tr>
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>	
							
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>
							<tr>
							<td> Date of announcement : </td>""
							<td><input type="integer" name="date" maxlength=10 size="10"/></td>
							</tr>
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>
							<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>
							</table>
							<input type="submit" value="POST" /><br /><br />
							</form>
								
							<p class="links"><a href="#">Read More</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Comments</a></p>
						</div>
						<?php
}
else
{ echo "<p><b> this page is not available for you </b></p>";				
}
?>
					</div>
					
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