<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PadhaiLikhai.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="faq.css" rel="stylesheet" type="text/css" />
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
			<?php
if (isset($_COOKIE["user"]))
{echo "<li><a href=\"logout.php\">Logout</a></li>";
}
?>
		</ul>
	</div>

</div>



<div id="middle">

<h1> Contact Us </h1>

<?php
//..........................................................php................................................
	$connection = OCILogon("hr","trg16",'//localhost/XE');

$stid = oci_parse($connection, "SELECT * FROM faq");


$r = oci_execute($stid);

// Fetch the results of the query

echo"<table id=\"blog\", border=2>\n";
print"<tr>
  <th>Question</th>
  <th>Answer</th>
  </tr>";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print "<tr>\n";
    foreach ($row as $item) {
        print "    <td><strong>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</strong></td>\n";
    }
    print "</tr>\n";
}
print "</table>\n";

oci_free_statement($stid);
oci_close($connection);
//...................................................................end of php..........................................	
?>


</div>



			
<div id="footer">
	<p>Copyright © 2010 Virtual Classroom.  All rights reserved.</p>
</div>



</body>
</html>
