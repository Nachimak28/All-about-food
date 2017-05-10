<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$rGender=$_POST['rGender'];
$signupdttim=$_POST['signupdttim'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$psd=$_POST['psd'];

$conn = mysqli_connect("localhost","root","","a2f");
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}

$sql = "INSERT INTO signup(`F_Name`, `L_Name`, `Gender`, `Date_of_Birth`, `Address`, `contact`, `email`, `psd`) VALUES ('$Fname', '$Lname', '$rGender', '$signupdttim', '$address', '$contact', '$email', '$psd');";
if(mysqli_query($conn, $sql))
{  
	echo 'Inserted in signup';
	//header("Location: home1.html");
}
else
{  
	echo "Could not insert record: ". mysqli_error($conn);  
}
	$sql1 = "INSERT INTO login(`username`, `password`) VALUES ('$email', '$psd');";
	if(mysqli_query($conn, $sql1))
	{  
		echo 'Added in login table';
		header("Location: home1.html");
	}
	else
	{  
		echo "Could not insert record: ". mysqli_error($conn);  
	}	 
mysqli_close($conn); 

?>
</body>
</html>
