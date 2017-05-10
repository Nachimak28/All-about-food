
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$quantity = "";
$username = (isset($_POST['username']) ? $_POST['uername'] : '');
$quantity=$_POST['quantity'];
//$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : '');
$address=$_POST['address'];

$conn = mysqli_connect("localhost","root","","a2f");
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}

$sql = "INSERT INTO `order`(`username`,`quantity`,`address`) VALUES ('$username','$quantity','$address');";
if(mysqli_query($conn, $sql))
{  
	echo 'Inserted in order';
	//header("Location: home1.html");
}
else
{  
	echo "Could not insert record: ". mysqli_error($conn);  
}
	//$sql1 = "INSERT INTO login(`username`, `password`) VALUES ('$email', '$psd');";
	//if(mysqli_query($conn, $sql1))
	//{  
		//echo 'Added in login table';
		//header("Location: home1.html");
	//}
	//else
	//{  
		//echo "Could not insert record: ". mysqli_error($conn);  
	//}	 
mysqli_close($conn); 

?>
</body>
</html>
