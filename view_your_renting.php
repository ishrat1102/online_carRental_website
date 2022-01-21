<?php
include('session.php');
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


?>
<html>
<div class="container " style="background-color: white">


	<body>
		<div class="container py-5">
			<table class="table  table-bordered table-success table-striped" style="table-layout:fixed;word-wrap:break-word ">
				<tr>
					<th>Fullname</th>
					<th>Email</th>
					<th>Mobile Number</th>
					<th>NationalID</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Model Year</th>
					<th>Seating Capacity</th>
					<th>Fuel Type</th>
					<th>Price Per Day (BDT)</th>
					<th>Pickup Date</th>
					<th>Return Date</th>
					<th>Total Bill (BDT)</th>
					<th>Recipt</th>
					<th>Cancel</th>



					<?php

					$sql = "SELECT * FROM rented WHERE u_id=$login_session6 ORDER BY pdate";
					$result = mysqli_query($conn, $sql);
					$total = mysqli_num_rows($result);
					if ($total != 0) {
						while (($fetch = mysqli_fetch_assoc($result))) {
							echo "
					<tr>
					<td>" . $fetch['Fullname'] . "</td>
					<td>" . $fetch['Email'] . "</td>
					<td>" . $fetch['Mobile Number'] . "</td>
					<td>" . $fetch['NationalID'] . "</td>
					<td>" . $fetch['brand'] . "</td>
					<td>" . $fetch['model'] . "</td>
					<td>" . $fetch['model_year'] . "</td>
					<td>" . $fetch['seat'] . "</td>
					<td>" . $fetch['fuel'] . "</td>
					<td>" . $fetch['price'] . "</td>
					<td>" . $fetch['pdate'] . "</td>
					<td>" . $fetch['ren_date'] . "</td>
					<td>" . $fetch['total_bill'] . "</td>
					
					"; ?>
							<td><a href='reciept.php?ren_id=<?php echo $fetch['ren_id']; ?>' class="btn btn-primary">Reciept</a></td>
							<td><a href='cancel.php?ren_id=<?php echo $fetch['ren_id']; ?>&dat=<?php echo date("Y-m-d") ?>' class="btn btn-danger">Cancel</a></td>
					<?php
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
<?php include("h&f/footer.php");    ?>