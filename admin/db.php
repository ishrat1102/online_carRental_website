<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'carrental');
  
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Checking connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else
{
	//echo"connected";
}
?>
