<?php
if (isset($_COOKIE["user"]))
{header("Location:home.php");
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PadhaiLikhai.com - the freedom to learn</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="logout_url.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		
		<h1><a href="#"><img src="images/padhai_logo.jpg"></a></h1>
		
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="home.php">home</a></li>
			<li><a href="aboutus.php">about us</a></li>
			<li><a href="faq.php">faq</a></li>
			<li><a href="blog.php">blog</a></li>

			<li><a href="help.php">help</a></li>
			<li><a href="contactus.php">contact us</a></li>
		</ul>
	</div>

</div>



<div id="middle">
<p>
Welcome to padhai likhai .com <br/><br/>
here you can attend the virtual classroom <br/><br/>
facility that is provided by our website<br/><br/>
You can create and manage your profile<br/><br/>
You can attend virtual classes or review lectures<br/><br/>
You can even take tests and generate attendance records<br/><br/>
Our aim is to provide a portal for online education<br/><br/>
for those who want to be educated but cannot attend conventional classrooms and lectures<br/><br/>
Here you can schedule your own classes according to your convenience<br/><br/>
</p>

<?php
if (!isset($_COOKIE["user"]))
{
?>
<div id="login_area">
<br /><h1>Login</h1>
<h5>You have successfully logged out</h5>
<h6>
<form name "loginform" action="authcheck.php" method="post">
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br /><br />
<input type="checkbox" name="RememberMe" value="Yes" />Remember Me &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<input type="submit" value="Login" /><br /><br />
<a href="register.php">New User? Register Here</a><br /><br />
<a href="#"> Forgot Password? Click Here</a>
</form>
</h6>
</div>
<?php
}
?>
</div>



			
<div id="footer">
	<p>Copyright © 2010 Virtual Classroom.  All rights reserved.</p>
</div>



</body>
</html>
<?php
}
?>