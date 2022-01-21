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
					<th>Renting No.</th>
					<th>User ID</th>
					<th>Fullname</th>
					<th>Email</th>
					<th>Mobile Number</th>
					<th>NationalID</th>
					<th>Car ID</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Model Year</th>
					<th>Seating Capacity</th>
					<th>Fuel Type</th>
					<th>Price Per Day (BDT)</th>
					<th>Pickup Date</th>
					<th>Return Date</th>
					<th>Total Bill (BDT)</th>



					<?php

					$sql = "SELECT * FROM rented ORDER BY brand";
					$result = mysqli_query($conn, $sql);
					$total = mysqli_num_rows($result);
					if ($total != 0) {
						while (($fetch = mysqli_fetch_assoc($result))) {
							echo "
					<tr>
					<td >" . $fetch['ren_id'] . "</td>
					<td>" . $fetch['u_id'] . "</td>
					<td>" . $fetch['Fullname'] . "</td>
					<td>" . $fetch['Email'] . "</td>
					<td>" . $fetch['Mobile Number'] . "</td>
					<td>" . $fetch['NationalID'] . "</td>
					<td>" . $fetch['carr_id'] . "</td>
					<td>" . $fetch['brand'] . "</td>
					<td>" . $fetch['model'] . "</td>
					<td>" . $fetch['model_year'] . "</td>
					<td>" . $fetch['seat'] . "</td>
					<td>" . $fetch['fuel'] . "</td>
					<td>" . $fetch['price'] . "</td>
					<td>" . $fetch['pdate'] . "</td>
					<td>" . $fetch['ren_date'] . "</td>
					<td>" . $fetch['total_bill'] . "</td>
					
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