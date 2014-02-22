<?php
echo $testid_received;
?>
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
<link href="testresult.css" rel="stylesheet" type="text/css" />
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
	if(isset($_SESSION['testid'])){
	$test_id_cookie=$_SESSION["testid"];
	$userid_active=$_SESSION['userid'];
	unset($_SESSION['testid']);
	// retrieving question paper list from the database
	$connection = OCILogon("padhailikhai_db","anveshan",'//localhost/XE');
	$stid = oci_parse($connection, "SELECT * FROM PADHAILIKHAI_USERINFO WHERE USERID='$userid_active'");
	$r = oci_execute($stid);
	$row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	$stid = oci_parse($connection, "SELECT * FROM QUESTION_TABLE WHERE TESTID_FOREIGN='$test_id_cookie'");
	 $r = oci_execute($stid);
	 
?>	
						<h2 class="title"><?php echo "Welcome ".$_SESSION['username']; ?>. Here is your test analysis </h2>
						<p class="meta"><span class="date">January 10, 2010</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
							<table border=1>
							<tr>
							<th>Question</th>
							<th>Your Answer</th>
							<th>Correct Answer</th>
							<th>Status</th>
							</tr>
							
							<?php
							$rowidno=1;
							$correct=0;
							$total_questions=0;
							while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)){
							$rowid="rowidis".$rowidno;
							$answer_received=$_POST[$rowid];
							echo "<tr>";
							echo "<td>".$row['QUESTION']."</td>";
							echo "<td>".$answer_received."</td>";
							$correct_option="OPT".$row['CORRECTANSWER'];
							echo "<td>".$row[$correct_option]."</td>";
							if($answer_received==$row[$correct_option])
							{echo "<td>Correct</td>";
							$correct=$correct+1;
							}
							else
							{echo "<td>Incorrect</td>";}
							echo "</tr>";
							$rowidno=$rowidno+1;
							$correct_option="OPT".$row['CORRECTANSWER'];
							$total_questions=$total_questions+1;
							}
							$incorrect=$total_questions-$correct;
							$score=($correct*3)-$incorrect;
							echo "</table>";
							echo "<p><b>Total number of questions = ".$total_questions."</b></p>";
							echo "<p><b>Correct answers = ".$correct."</b></p>";
							echo "<p><b>Incorrect answers = ".$incorrect."</b></p>";	
							echo "<p><b>Score = ".$score."</b></p>";
							$stid = oci_parse($connection, "UPDATE COMPLETED_TESTS SET SCORE='$score', CORRECT='$correct', INCORRECT='$incorrect' WHERE TESTID_FOREIGN='$test_id_cookie'");
							$r = oci_execute($stid);
							?>
							
							</table>
							</div>
					</div>
<?php

	oci_free_statement($stid);
	oci_close($connection);  
	}
else
{echo "<p><b>this page is not available for you right now...</b></p>";}
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