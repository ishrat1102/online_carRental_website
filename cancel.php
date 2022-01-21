<?php
  include("dbconnect.php");
  $ren_id=$_GET['ren_id'];
 $dat=$_GET['dat'];
  $sql="SELECT pdate FROM rented WHERE ren_id='$ren_id' ";
  $res = mysqli_query($conn,$sql);
  $data = mysqli_fetch_assoc($res);
 //echo  $start= $data['pdate'];
    $start= $data['pdate'];
	// Converting to timestamp
	$dat_ts = strtotime($dat);
	$start_ts = strtotime($start);
	
	if($dat_ts>= $start_ts)
	{
		echo "<script>
			alert('can only cancel before pickup date!');
		    window.location.href='view_your_renting.php'</script>"; 
		//echo"can only cancel before pickup date";  
	}
	else
	{
		  $sql1="DELETE  FROM rented WHERE ren_id='$ren_id'";
		  $result= mysqli_query($conn,$sql1);
		  if($result)
		  {
			 echo "<script>
			alert('booking is cancelled !');
		    window.location.href='view_your_renting.php'</script>" ;
			//echo "data deleted";
		  }
		  else
		  {
			   echo "<script>
			alert('error cannot delete !');
		    window.location.href='view_your_renting.php'</script>" ;
			//echo "error cannot delete";
			
		  } 
	}
 
 
?>