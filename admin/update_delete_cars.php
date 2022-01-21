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

<head>


</head>
<div class="container" style="background-color: white;">


	<body>
		<div class="container py-5">
			<form method="post" enctype="multipart/form-data">
				<table class="table table-condensed table-bordered table-striped ">
					<tr>
						<th>Car ID</th>
						<th>Image</th>
						<th>Brand</th>
						<th>Model</th>
						<th>Model Year</th>
						<th>Seating Capacity</th>
						<th>Fuel Type</th>
						<th>Price Per Day (BDT)</th>
						<th>Update</th>
						<th>Delete</th>


						<?php

						$sql = "SELECT * FROM cars ORDER BY brand";
						$result = mysqli_query($conn, $sql);
						$total = mysqli_num_rows($result);
						if ($total != 0) {
							while (($fetch = mysqli_fetch_assoc($result))) {
								echo "
					<tr>
					<td >" . $fetch['car_id'] . "</td>
					<td >";


						?>
								<img src="<?php echo "carlist_img/" . $fetch['image']; ?>" width="100px" height="100px">
								<?php
								echo "</td>
					
					<td>" . $fetch['brand'] . "</td>
					<td>" . $fetch['model'] . "</td>
					<td>" . $fetch['model_year'] . "</td>
					<td>" . $fetch['seat'] . "</td>
					<td>" . $fetch['fuel'] . "</td>
					<td>" . $fetch['price'] . "</td>
					
					<td>"; ?>
								<a href='update_c.php?car_id=<?php echo $fetch['car_id']; ?>&brand=<?php echo $fetch['brand']; ?>&model=<?php echo $fetch['model']; ?>&model_year=<?php echo $fetch['model_year'] ?>&seat=<?php echo $fetch['seat'] ?>&fuel=<?php echo $fetch['fuel'] ?>&price=<?php echo $fetch['price'] ?>&image=<?php echo $fetch['image'] ?>' class="btn btn-info">Update</a></td>
								<td><a href='delete_cars.php?car_id=<?php echo $fetch['car_id']; ?>' class="btn btn-danger">Delete</a></td>
						<?php





							}
						} else {
							//  echo"total has  no records";
						}
						?>

					</tr>
				</table>

			</form>
		</div>
	</body>
	<br>
</div>

</html>
<?php include('adfoot.php');   ?>