<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PadhaiLikhai.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="register.css" rel="stylesheet" type="text/css" />
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
else if(v_username==null || v_username=="")
  {alert("Please enter a username");
   return false;  
  }
else if(v_password==null || v_password=="")
  {alert("Password field left blank");
   return false;
  }
else if(v_password1==null || v_password1=="")
  {alert("Please re-enter password");
   return false;
  }
else if(v_password!=v_password1)
  {alert("Passwords do not match");
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
			<li><a href="home.php">home</a></li>
			<li><a href="aboutus.php">about us</a></li>
			<li><a href="faq.php">faq</a></li>
			<li><a href="blog.php">blog</a></li>

			<li><a href="help.php">help</a></li>
			<li><a href="contactus.php">contact us</a></li>
		</ul>
	</div>

</div>



<div id="middle">
	<form name="reg_form" action="registration_update.php" method="post" onsubmit="return verify()">
	<h2 align ="center" >Registration Form </h2>
	<table align="center">
	<tr>
	   <th> First Name (*) : </th>
		<td><input type="text" name="name1" maxlength=30 size="30" /><br/></td>
	</tr>
	<tr>
	   <th> Middle Name : </th>
	   <td><input type="text" name="name2" maxlength=30 size="30" /><br/></td>
	</tr>
	<tr>
 	   <th>Last Name : </th>
	   <td><input type="text" name="name3" maxlength=30 size="30" /><br/></td>
	</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>


<tr>
<th> email (*) : </th>
<td><input type="text" name="e_mail" maxlength=100 size="30" /><br/></td>
</tr>

<tr>
<th> Confirm email (*) : </th>
<td><input type="text" name="email1" maxlength=100 size="30" /><br/></td>
</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>

<tr>
<th> Username (*) : </th>
<td><input type="text" name="user_name" maxlength=100 size="30" /><br/></td>
</tr>

<tr>
<th> Password (*) : </th>
<td><input type="password" name="password" maxlength=100 size="30" /><br/></td>
</tr>

<tr>
<th> Confirm Password (*) : </th>
<td><input type="password" name="password1" maxlength=100 size="30" /><br/><td>
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
        <td><input type="text" name="addressline1" maxlength=100 size="30"/></td>
</tr>
<tr>
<th>Address Line 2: </th>
        <td><input type="text" name="addressline2" maxlength=100 size="30"/></td>
</tr>
<tr>
<th>Address Line 3: </th>
        <td><input type="text" name="addressline3" maxlength=100 size="30"/></td>
</tr>

<tr>
<th>City (*) : </th>
<td><input type="text" name="city" maxlength=25 size="15" /><br/></td>
</tr>

<tr>
<th>State (*) :</th>
	<td><select name="state">
      <option value="punjab">Punjab</option>
      <option value="up">U.P.</option>
      <option value="mp">M.P.</option>
      <option value="delhi">Delhi</option>
    </select><br/></td>
</tr>

<tr>
<th>Country (*) :</th>
<td><select name="country">
      <option value="india">India</option>
      <option value="usa">U.S.A</option>
      <option value="uk">U.K.</option>
      <option value="russia">Russia</option>
    </select>
<br/></td>
</tr>

<tr>
	<th>  </th>
	<td>   <br/></td>
</tr>

<tr>
<th>User type (*) : </th><br/>
		<td><input type="radio" value="student" name="usertype" maxlength=30 size="30" checked="yes"/>Student</td>
		<td><input type="radio" value="faculty" name="usertype" maxlength=30 size="30" />Faculty</td>
</tr>


<tr>
<th></th>
<td><input type="submit" value="register"/></td>
</tr>

</table>
</form>



</div>



			
<div id="footer">
	<p>Copyright © 2010 Virtual Classroom.  All rights reserved.</p>
</div>



</body>
</html>
