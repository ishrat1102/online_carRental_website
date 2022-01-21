<?php
include('dbconnect.php')
?>
<?php
$sql="CREATE TABLE `user` (
  `id` int(255)AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) UNIQUE KEY NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `NationalID` varchar(255) UNIQUE KEY NOT NULL
  
   
  
)DEFAULT CHARSET=utf8mb4";


                if (mysqli_query($conn, $sql)) {
                    echo "<script>
					alert ('Table Created successfully !')</script>";
					
                    } 
                else {
                     echo "Error: " . $sql . "
                        " . mysqli_error($conn);
     }
	 $sql1="CREATE TABLE `rating` (
  `r_id` int(255)AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
  
 
)  DEFAULT CHARSET=utf8mb4";


                if (mysqli_query($conn, $sql1)) {
                    echo "<script>
					alert ('Table Created successfully !')</script>";
					
                    } 
                else {
                     echo "Error: " . $sql1 . "
                        " . mysqli_error($conn);
     }
	 $sql2="CREATE TABLE `cars` (
  `car_id` int(255)AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `image` varchar(255) ,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_year` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
 
)  DEFAULT CHARSET=utf8mb4";


                if (mysqli_query($conn, $sql2)) {
                    echo "<script>
					alert ('Table Created successfully !')</script>";
					
                    } 
                else {
                     echo "Error: " . $sql2 . "
                        " . mysqli_error($conn);
     }
	 $sql3="CREATE TABLE `rented` (
   `ren_id` int(255) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `u_id` int(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `NationalID` varchar(255) NOT NULL,
  `carr_id` int(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_year` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `ren_date` date NOT NULL,
  `total_bill` varchar(255) NOT NULL
 
  
)DEFAULT CHARSET=utf8mb4";


                if (mysqli_query($conn, $sql3)) {
                    echo "<script>
					alert ('Table Created successfully !')</script>";
					
                    } 
                else {
                     echo "Error: " . $sql3 . "
                        " . mysqli_error($conn);
     }
     mysqli_close($conn);

?>