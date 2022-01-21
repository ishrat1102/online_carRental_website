<?php include("header1.php"); ?>
<?php


include("db.php");

$b = $_GET['i'];
$bc = $_GET['ID'];




$sql = "select * from admintable where a_id = '$b' ";


$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

	$user_data = mysqli_fetch_assoc($result);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$password = $_POST['password'];
	$con_password = $_POST['con_password'];
	$verification = $_POST['verification'];

	$verify = password_verify($verification, $bc);

	//  if password match
	if ($verify) {
		if ($con_password === $password) {
			if (!empty($password)) {

				$hash = password_hash($password, PASSWORD_DEFAULT);
				$query = "UPDATE admintable SET  password='$hash' WHERE a_id ='$b'";

				$result = mysqli_query($conn, $query);
				if (!$result) {
					echo "Please Try Again";
				} else {
					header("Location: admin_login.php");
					die;
				}
			} else {
				echo "Please enter some valid information!";
			}
		} else {
			echo "Password did not Match";
		}
	} else {
		echo "Verification Code did not Match";
	}
}
?>


<!DOCTYPE html>
<html>

<head>

	<title>Registration</title>


	<style>
		html,
		body {
			height: 100%;
		}



		#box {

			background-color: #c4c3bb;
			margin: auto;
			width: 500px;
			height: 500px;
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

		/* unvisited link */
		a:link {
			color: blue;
		}

		/* visited link */
		a:visited {
			color: green;
		}

		/* mouse over link */
		a:hover {
			color: hotpink;
		}

		/* selected link */
		a:active {
			color: red;
		}
	</style>

</head>

<body>
	<div id="box">
		<span>
			<h4><?php echo $user_data['username']; ?> Enter New Password</h4>
		</span>
		<form method="post" action="">
			<table cellpadding="2">
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-right:15px;font-size:20px"><label for="name">Verification Code:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-left:30px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="verification">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-right:15px;font-size:20px"><label for="name">New Password:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-left:30px">
							<input class="form-control" style="height:25px;width:250px" type="password" name="password">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-right:15px;font-size:20px"><label for="name">Confirm Password:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-left:30px">
							<input class="form-control" style="height:25px;width:250px" type="password" name="con_password">
						</td>
					</tr>
				</div>
			</table><br>
			<input class="btn btn-success" type="submit" value="Submit">
		</form>
	</div>
</body>

</html>
<?php include("adfoot.php");    ?>