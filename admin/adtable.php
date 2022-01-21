<?php
include('db.php')
?>
<?php
$sql="CREATE TABLE `admintable` (
  `a_id` int(255) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE KEY NOT NULL,
  `password` varchar(255) NOT NULL
  
)  DEFAULT CHARSET=utf8mb4";
 if (mysqli_query($conn, $sql)) {
                    echo "<script>
					alert ('Table Created successfully !')</script>";
					
                    } 
                else {
                     echo "Error: " . $sql . "
                        " . mysqli_error($conn);
     }
	 mysqli_close($conn);

?>