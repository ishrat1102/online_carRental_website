 <?php include('session.php');
	include("h&f/loginhead.php");
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
	}

	$r_id = isset($_GET['r_id']) ? $_GET['r_id'] : '';
	$rating = isset($_GET['rating']) ? $_GET['rating'] : '';
	$comment = isset($_GET['comment']) ? $_GET['comment'] : '';
	$u_id = isset($_GET['u_id']) ? $_GET['u_id'] : '';
	$username = isset($_GET['username']) ? $_GET['username'] : '';
	?>
 <html>
 <div class="container " style="background-color: white;">
 	<!DOCTYPE html>

 	<head>

 		<title>Rating</title>

 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<style>
 			.rated {
 				color: yellow;
 			}

 			html,
 			body {
 				height: 100%;
 			}
 		</style>

 	</head>

 	<body>
 		<form method="post" action="update_rating.php">
 			<table>
 				<div class="form-group">
 					<tr>
 						<input class="form-control" style="height:25px;width:250px" name="u_id" type="hidden" value="<?php echo $u_id; ?>">
 						<input class="form-control" style="height:25px;width:250px" name="username" type="hidden" value="<?php echo $username; ?>">
 						<input class="form-control" style="height:25px;width:250px" name="r_id" type="hidden" value="<?php echo $r_id; ?>">
 						<td style=" padding-top: 15px;padding-bottom: 15px;font-size:25px"><label for="name">Rating:</label></td>
 						<td style=" padding-top: 15px;padding-bottom: 15px"><input type="text" name="rating" pattern="1|1.5|2|2.5|3|3.5|4|4.5|5" title="between 1-5 eg.4 or 4.5" value="<?php echo $rating; ?>" class="form-control" style="height:25px;width:250px"></td>
 					</tr>
 				</div>
 				<div class="form-group">
 					<tr>
 						<td style=" padding-top: 15px;padding-bottom: 15px;font-size:25px"><label for="name">Comment:</label></td>
 						<td style=" padding-top: 15px;padding-bottom: 15px"><input type="text" name="comment" maxlength="1000" value="<?php echo $comment; ?>" class="form-control" style="height:25px;width:250px"></td>
 					</tr>
 				</div>
 				<div class="form-group">
 					<tr>
 						<td> <input type="submit" name="submit" class="btn btn-info" value="Edit Rating"></td>
 					</tr>
 				</div>
 			</table>
 		</form>
 		<br>
 	</body>
 </div>

 </html>
 <?php
	if (isset($_POST['submit'])) {
		$r_id1 = isset($_POST['r_id']) ? $_POST['r_id'] : '';
		$user_id1 = isset($_POST['u_id']) ? $_POST['u_id'] : '';
		$username1 = isset($_POST['username']) ? $_POST['username'] : '';
		$rating1 = isset($_POST['rating']) ? $_POST['rating'] : '';
		$comment1 = isset($_POST['comment']) ? $_POST['comment'] : '';

		$sql = "UPDATE `rating` SET `r_id`='$r_id1',`user_id`='$user_id1',`username`='$username1 ',`rating`='$rating1',`comment`='$comment1' WHERE r_id = '$r_id1' ";

		$result = mysqli_query($conn, $sql);
		if ($result) {
		} else {
			echo "failed";
		}
	} ?>
 <?php include("h&f/footer.php");    ?>