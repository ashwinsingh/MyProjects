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
<link href="edit_profile.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function verify()
{
var v_name1=document.forms["reg_form"]["name1"].value
var v_name2=document.forms["reg_form"]["name2"].value
var v_name3=document.forms["reg_form"]["name3"].value
var v_email=document.forms["reg_form"]["e_mail"].value
var v_email1=document.forms["reg_form"]["email1"].value
var v_username=document.forms["reg_form"]["user_name"].value
var v_password=document.forms["reg_form"]["password"].value
var v_password1=document.forms["reg_form"]["password1"].value
var v_addressline1=document.forms["reg_form"]["addressline1"].value
var v_addressline2=document.forms["reg_form"]["addressline2"].value
var v_addressline3=document.forms["reg_form"]["addressline3"].value

if (v_name1==null || v_name1=="")
  {
  alert("First name must be filled out");
  return false;
  }
else if(v_email==null || v_email=="")
  {alert("Please enter your e-mail address");
   return false;  
  }
else if(v_email1==null || v_email1=="")
  {alert("Please re-enter your e-mail address");
   return false;  
  }
else if(v_email!=v_email1)
  {alert("E-mail addresses do not match");
   return false;
  }
else
  {
   alert("all entries suffice");
  }
}
</script>
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
							<li><a href="profilehome.php">Profile</a></li>
							<li><a href="#">Classroom</a></li>
							<li><a href="#">Assignments</a></li>
							<li><a href="testmodule.php">Tests</a></li>
							<li><a href="#">Scheduler</a></li>
							<li><a href="progress_report.php">Progress Report</a></li>
							<li><a href="announcements_view.php">Announcements</a></li>
							<li class="current_page_item"><a href="#">Account Settings</a></li>
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
	$userid=$_SESSION['userid'];
    $stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid'");
	$r = oci_execute($stid);
	$row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	oci_free_statement($stid);
	 oci_close($connection); 
	
?>
						<h2 class="title"><?php echo "Welcome ".$_SESSION['username']; ?> to PADHAI LIKHAI.com </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
						<form name="edit_profile" action="update_profile.php" method="post" onsubmit="return verify()">
	<h2 align ="center" >Edit Your Profile </h2>
	<table align="center">
	<tr>
	   <th> First Name (*) : </th>
		<td><?php echo "<input type=\"text\" name=\"name1\" maxlength=30 size=\"30\" value=\"".$row2['FIRSTNAME']."\"/><br/></td>"; ?>
	</tr>
	<tr>
	   <th> Middle Name : </th>
	   <td><?php echo "<input type=\"text\" name=\"name2\" maxlength=30 size=\"30\" value=\"".$row2['MIDDLENAME']."\"/><br/></td>"; ?>
	</tr>
	<tr>
 	   <th>Last Name : </th>
	   <td><?php echo "<input type=\"text\" name=\"name3\" maxlength=30 size=\"30\" value=\"".$row2['LASTNAME']."\"/><br/></td>"; ?>
	</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>


<tr>
<th> email (*) : </th>
<td><?php echo "<input type=\"text\" name=\"e_mail\" maxlength=100 size=\"30\" value=\"".$row2['EMAIL']."\"/><br/></td>"; ?>
</tr>

<tr>
<th> Confirm email (*) : </th>
<td><?php echo "<input type=\"text\" name=\"email1\" maxlength=100 size=\"30\" value=\"".$row2['EMAIL']."\"/><br/></td>"; ?>
</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>

<tr>
<th>Address:</th>
</tr>
<tr>
<th>Address Line 1 (*) : </th>
        <td><?php echo "<input type=\"text\" name=\"addressline1\" maxlength=100 size=\"30\" value=\"".$row2['ADDRESS1']."\"/><br/></td>"; ?>
</tr>
<tr>
<th>Address Line 2: </th>
        <td><?php echo "<input type=\"text\" name=\"addressline2\" maxlength=100 size=\"30\" value=\"".$row2['ADDRESS2']."\"/><br/></td>"; ?>
</tr>
<tr>
<th>Address Line 3: </th>
        <td><?php echo "<input type=\"text\" name=\"addressline3\" maxlength=100 size=\"30\" value=\"".$row2['ADDRESS3']."\"/><br/></td>"; ?>
</tr>

<tr>
<th>City (*) : </th>
<td><?php echo "<input type=\"text\" name=\"city\" maxlength=25 size=\"15\" value=\"".$row2['CITY']."\"/><br/></td>"; ?>
</tr>

<tr>
<th>State (*) :</th>
	<td><select name="state">
      <option value="punjab" <?php if($row2['STATE']=="punjab"){echo "selected=\"selected\"";} ?>>Punjab</option>
      <option value="up" <?php if($row2['STATE']=="up"){echo "selected=\"selected\"";} ?>>U.P.</option>
      <option value="mp" <?php if($row2['STATE']=="mp"){echo "selected=\"selected\"";} ?>>M.P.</option>
      <option value="delhi" <?php if($row2['STATE']=="delhi"){echo "selected=\"selected\"";} ?>>Delhi</option>
    </select><br/></td>
</tr>

<tr>
<th>Country (*) :</th>
<td><select name="country">
      <option value="india" <?php if($row2['COUNTRY']=="india"){echo "selected=\"selected\"";} ?>>India</option>
      <option value="usa" <?php if($row2['COUNTRY']=="usa"){echo "selected=\"selected\"";} ?>>U.S.A</option>
      <option value="uk" <?php if($row2['COUNTRY']=="uk"){echo "selected=\"selected\"";} ?>>U.K.</option>
      <option value="russia" <?php if($row2['COUNTRY']=="russia"){echo "selected=\"selected\"";} ?>>Russia</option>
    </select>
<br/></td>
</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>


<tr>
<th></th>
<td><input type="submit" value="register"/></td>
</tr>

</table>
</form>
						</div>
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