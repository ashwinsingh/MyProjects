<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PadhaiLikhai.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="aboutus.css" rel="stylesheet" type="text/css" />
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

<h1> About Us </h1>
</br>
<h2> The Problem Statement </h2>
<p>In the modern times, India is lacking far behind in the global standards of imparting technical and professional education. The reason behind this lack of awareness about quality education, lack of accessibility, absence of basic infrastructure and bureaucracy in government educational organizations.
Most of the people in the country are either completely in the dark or have a vague idea about how to get quality education. They don’t know why they should get it because they do not have any idea about how beneficial professional education can be. As a result only a handful of the Indian population is able to obtain quality education, leaving the rest devoid of it. 
Many of the people in the country, who actually are aware about the education options, are unable to obtain the benefits from them because of the educational institutions either being too far away or simply being too costly to afford. Many of the professionals who want to extend their knowledge are unable to do so because they simply cannot find time enough to attend traditional institutions which impart quality education.
Thus, there is need to spread awareness about quality professional education. There is also a need to make this quality education easily available to the masses.
</p>
<h2>padhailikhai.com</h2>
<p>With the above mentioned problems in view, we propose the introduction of a Virtual Classroom System, to meet the demands of providing professional education to the masses in a non-traditional manner. 
The faculty teaches the registered students through an online interactive portal called "Whiteboard." The faculty or the teachers can use the whiteboard to broadcast relevant images, diagrams, presentations, text and other materials to the students connected to him in the session. The students and the faculty can interact with each other through a handy chat server.
Besides these features each student and faculty has his/her own profile. They can keep track of their progress in this manner. Tests can be prepared as per the faculty on a regular basis to keep the students brushed up and familiar with the courses they are pursuing.
All the classes that the student has registered for can be viewed by him later on through downloadable video files or through PPTs.
This project aims to provide the benefits of a classroom based education without the student being physically present in a conventional classroom. It is an attempt to re-invent the distant learning programme.
</p>
</br>
<h2>The Development Team</h2>
<p>The development team consists of a group of enthusiastic students, known as TEAM ANVESHAN from Dr. k. N. Modi Institute of Engineering & Technology, Modinagar, Ghaziabad</p>



</div>



			
<div id="footer">
	<p>Copyright © 2010 Virtual Classroom.  All rights reserved.</p>
</div>



</body>
</html>
