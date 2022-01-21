<?php
  include("dbconnect.php");
  $r_id=$_GET['r_id'];
  $sql="DELETE  FROM rating WHERE r_id='$r_id'";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
	 echo "<script>
			alert('rating deleted!');
		    window.location.href='view_your_rating.php'</script>";  
    //echo "data deleted";
  }
  else
  {
	  echo "<script>
			alert('error not deleted!');
		    window.location.href='view_your_rating.php'</script>";  
   // echo "data not deleted";
    
  }
 
?>