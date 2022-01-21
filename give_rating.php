<?php include('session.php');
include ("h&f/loginhead.php");
 include("dbconnect.php");
$user_check = $_SESSION['login_user'];
$ses_sql = "SELECT * FROM user WHERE Email = '$user_check'  ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
    $row = mysqli_fetch_array($r);

          $login_session = $row['Email'];
		  $login_session1 = $row['Username'];
		  $login_session2 = $row['Fullname'];
		  $login_session3 = $row['Mobile Number'];
		  $login_session4 = $row['Gender'];
		  $login_session5 = $row['NationalID'];
		  $login_session6 = $row['id'];
		  //$login_session6 = $row['status'];
   
   
}


   ?>
<html>
<div class="container" style="background-color: white;">
	   <!DOCTYPE html>
<head>

<title>Rating</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
<style >
.rated{
		color:yellow;
		}
html, 
body {
height: 100%;
}

</style>
	
</head>
<body>
<form action="" method="post">
<table>
<div class="form-group">
<tr>
			<td style=" padding-top: 15px;padding-bottom: 15px;font-size:25px"><label for="name">Rating:</label></td>
          <td style=" padding-top: 15px;padding-bottom: 15px"><input type="text" name="rating" pattern="1|1.5|2|2.5|3|3.5|4|4.5|5" title="between 1-5 eg.4 or 4.5" class="form-control" style="height:25px;width:250px" required></td></tr>
			</div>
			<div class="form-group">
            <tr>
			<td style=" padding-top: 15px;padding-bottom: 15px;font-size:25px"><label for="name">Comment:</label></td>
          <td style=" padding-top: 15px;padding-bottom: 15px"><input  type="text" name="comment" maxlength="1000" class="form-control" style="height:25px;width:250px" required></td></tr>
			</div>
			<div class="form-group">
           <tr><td> <input type="submit" name="submit" class="btn btn-success" value="Rate"></td></tr>
			</div>
			</table>
		</form>
	<br>	
</body>
</div>
</html>
<?php
      
       if (isset($_POST['submit'])) {
		   $rating = $_POST['rating'];
           $comment = $_POST['comment'];
		  
           
                $sql = "INSERT INTO `rating`(`r_id`, `user_id`,`username`, `rating`, `comment`) VALUES ('null','$login_session6','$login_session1','$rating','$comment')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>
					alert('rated successfully !');
					
					</script>";
                    } 
                else {
                     echo "Error: " . $sql . "
                        " . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<?php include ("h&f/footer.php"); ?> 