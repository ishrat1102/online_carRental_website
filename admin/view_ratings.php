<?php include('adsession.php');
include("adhead.php");
include('db.php');
$user_check = $_SESSION['login_admin'];
$ses_sql = "SELECT * FROM `admintable` WHERE email='$user_check' ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
	$row = mysqli_fetch_array($r);


	$login_session1 = $row['username']; //echo $login_session1;

}
?>
<html>
<div class="container" style="background-color: white;">


	<body>
		<div class="container py-5">
			<table class="table table-bordered table-primary table-striped">
				<tr>
					<th>Rating No</th>
					<th>User ID</th>
					<th>Rating</th>
					<th>Comment</th>

					<style>
					</style>

					<?php

					$sql = "SELECT * FROM rating";
					$result = mysqli_query($conn, $sql);
					$total = mysqli_num_rows($result);
					if ($total != 0) {
						while (($fetch = mysqli_fetch_assoc($result))) {
							echo "
					<tr>
					<td >" . $fetch['r_id'] . "</td>
					<td>" . $fetch['user_id'] . "</td>
					<td>" . $fetch['rating'] . "</td>
					<td>" . $fetch['comment'] . "</td>
					
					
					
					";
						}
					} else {
						//  echo"total has  no records";
					}
					?>

				</tr>
			</table>

		</div>
	</body>
	<br>
</div>

</html>
<?php include('adfoot.php');  ?>