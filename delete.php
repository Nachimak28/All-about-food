<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

if ($username&&$password)
{
$connect = mysql_connect("localhost","root","");

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
		$sql1 ="DELETE FROM `login` WHERE username='$dbusername';";
		if(mysql_query($sql1))
		{  
			echo "Record deleted successfully";  
		}
		else
		{  
			echo "Could not deleted record: ". mysql_error($connect);  
		}  
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
</body>
</html>
