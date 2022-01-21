<?php include("h&f/header.php"); ?>
<!DOCTYPE html>
<html>

<head>

	<title>Registration</title>


	<style>
		html,
		body {
			height: 100%;
		}

		body {
			background-image: url("picture/car3.png");
			background-repeat: no-repeat;
			background-size: 100% 100%;
		}

		#box {

			background-color: #c4c3bb;
			margin: auto;
			width: 500px;
			height: 650px;
			padding: 50px;
			color: black;
			font-size: 20px;
		}

		input[type=submit] {


			color: white;
			background-color: green;
			border: none;
			padding-top: 10px;
			margin-left: 180px;
			padding: 4px 10px;
			font-size: 20px;

		}
	</style>

</head>

<body style="background-color:grey;">

	<div id="box">

		<form method="post" action="registration.php">
			<span>
				<h3><b>Registration</b></h3>
			</span>
			<table cellpadding="2">

				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Full Name:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="fname" maxlength="50" placeholder="max characters 50" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Username:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="username" maxlength="20" placeholder="max characters 50" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="email">Email:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" placeholder="example@gmail.com" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style="padding-top: 15px;padding-bottom: 15px"><label for="pass">Password:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="password" name="password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}" placeholder="8-20 charcters" title="Atleast 1uppercase,1lowercase,1digit, and no special characters" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="phone">Mobile:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="mobile" pattern="(\+88)\d{11}" maxlength="14" placeholder=" example:+88xxxxxxxxxxx" required>


						</td>
					</tr>
				</div>
				<div class="form-check">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="gender">Gender:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-check-input" type="radio" name="gender" value="male">Male &nbsp&nbsp
							<input class="form-check-input" type="radio" name="gender" value="female">Female
						</td>
					</tr>
				</div>

				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="phone">NationalID:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="nid" pattern="\d{9}" maxlength="9" required>
						</td>
					</tr>
			</table><br>
			<input type="submit" class="btn btn-success" name="submit" value="Register">
	</div>
	</form>

	</div>
</body>

</html>
<?php
include_once 'dbconnect.php';
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);

	$mobile = $_POST['mobile'];
	$gen = $_POST['gender'];
	$nid = $_POST['nid'];

	$sql = "INSERT INTO `user`( `id`,`Fullname`, `Username`, `Email`, `Password`, `Mobile Number`, `Gender`, `NationalID`)  VALUES (null,'$fname','$username','$email','$password','$mobile','$gen','$nid')";

	if (mysqli_query($conn, $sql)) {
		echo "<script>
					alert('registerd successfully !');
					window.location.href='login.php'
					</script>";
	} else {
		/*echo "Error: " . $sql . "
                        " . mysqli_error($conn);*/
		echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;">Error: Only one account could be created with same email ,national id.</div></div>';
	}
	mysqli_close($conn);
}
?>
<?php include("h&f/footer.php");    ?>