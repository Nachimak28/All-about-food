
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="quizcss.css">
		<style type=“text/css”>
			a:link{color:blue}
			a:visited{color:green}
			a:active{color:purple}
			a:yellow{color:green}
      </style>
</head>

<body background="Signupbg2.jpg">
<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

// Set session variables
$_SESSION["user"] = $_POST['username'];
echo "Session variables are set.";

if ($username&&$password)
{
$connect = mysql_connect("localhost","root","")or die(mysql_error());

mysql_select_db("a2f") or die("couldn't find database");
$query = mysql_query("select * from login where username='$username'");
$numrows = mysql_num_rows($query);

if($numrows!=0)
{
while($row = mysql_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbpassword = $row['password'];
}
if($username==$dbusername&&$password==$dbpassword)
{
 echo '<script type="text/javascript">alert("It works.");</script>';
 //header("Location: home1.html");
 $_SESSION['username']= $dbusername;
}
else
echo 'Incorrect Password';
}
else
die("That username doesnt exist");
}
else
die("Please enter username and password");
mysql_close($connect);
?>
	<div class="design">
		<br><br><br>
		<table align="center" width="75%" bgcolor="white" border="0" fillborder="purple">
		<tr>
		<td align="center">
					<center><img src="logo1.png">
		</center><br><hr>
		<?php
		echo "Welcome $username";
		?>
		<br>
			<font size="5">
			<a href="home1.html"><b>Home</b></a> &nbsp; &nbsp; &nbsp; 
			<a href="Signupnew.html" target="_self"><b>Signup</b></a> &nbsp; &nbsp; &nbsp;
			<a href="Login.html" target="_self"s><b>Login</b></a> &nbsp; &nbsp; &nbsp;
			<a href="people.html" target="_self"><b>About</b></a> &nbsp; &nbsp; &nbsp; 
			<a href="contact.html" target="_self"><b>Contact</b></a>
			</font>
			<hr>
			<br>
			<!--content-->
			</tr>
		<tr><td align="center"><br><iframe src="baner1.html" style="border:none" width="760"height="250" ></iframe></td></tr>				
				<tr><td align="center"><br><iframe src="Recipes.html" style="border:none" width="760" height="250" ></iframe></td></tr>
				<tr><td align="center"><br><iframe src="Profile.html" style="border:none" width="760"height="420" ></iframe><br><br><br><br></td></tr>
		</table>
		<br>
		
<!--Footer Content -->
<footer>
<table width="75%" align="center" bgcolor="white" border="0">
		<tr>
			<td align="center" colspan="3">		<font face="Kristen ITC" color="purple" size="3">	Follow us on:	<br>	</font>	</td>	
		</tr>
		<tr>
			<td colspan="3" align="center">	
						<a href="https://www.facebook.com/"><img src="fb.png" width="50" height="50">	</img></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://www.instagram.com"><img src="insta.png" width="50" height="50"></img></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://twitter.com"><img src="twitter.png" width="50" height="50"></img></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="www.stumbleupon.com"><img src="stumbleupon.png" width="50" height="50"></img></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://www.reddit.com"><img src="reddit.jpg" width="50" height="50"></img></a> &nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
</table>
</footer>

</body>
</html>