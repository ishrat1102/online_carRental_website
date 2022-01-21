<?php include("header1.php");

session_start();
include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "SELECT * FROM admintable WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$stored_pass = $row['password'];
		if (!empty($_POST["remember"])) {
			setcookie("login_name", $username, time() + (7 * 24 * 60 * 60), "/");
			setcookie("login_em", $email, time() + (7 * 24 * 60 * 60), "/");
			setcookie("login_pass", $password, time() + (7 * 24 * 60 * 60), "/");
		} else {
			if (isset($_COOKIE["login_name"])) {
				setcookie("login_name", "", time() - (7 * 24 * 60 * 60), "/");
			}
			if (isset($_COOKIE["login_em"])) {
				setcookie("login_em", "", time() - (7 * 24 * 60 * 60), "/");
			}
			if (isset($_COOKIE["login_pass"])) {
				setcookie("login_pass", "", time() - (7 * 24 * 60 * 60), "/");
			}
		}

		if (password_verify($password, $stored_pass)) {
			$_SESSION['login_admin'] = $email;
			echo "<script>
					alert('login successful!');window.location.href='dashboard.php'</script>";
		} else {
			echo "<script>
					alert('Your Login Email or Password is invalid!');window.location.href='login.php'</script>";
		}
	}
}
?>
<html>

<head>
	<title>Login Page</title>
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
			margin-left: 145px;
			padding: 4px 10px;
			font-size: 20px;

		}
	</style>

</head>

<body>
	<div id="box">

		<span>Admin Panel Login</span>
		<form method="post" action="">
			<table cellpadding="2">

				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">User Name:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="username" placeholder="name" value="<?php if (isset($_COOKIE["login_name"])) {
																																					echo $_COOKIE["login_name"];
																																				} ?>">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Email:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="email" placeholder="email" value="<?php if (isset($_COOKIE["login_em"])) {
																																				echo $_COOKIE["login_em"];
																																			} ?>">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="email">Password:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="password" name="password" placeholder="password" value="<?php if (isset($_COOKIE["login_pass"])) {
																																							echo $_COOKIE["login_pass"];
																																						} ?>">
						</td>
					</tr>
			</table>
			<br><input type="checkbox" name="remember" class="form-check-input" <?php if (isset($_COOKIE["login_em"])) { ?> checked<?php } ?>>Remember Me
			<br>
			<input type="submit" value=" Submit " class="btn btn-success">
			<br><br>
			<span class="text">
				<h5> <a href='adreg.php'>Register Here</a></h5>
			</span>
			<span>
				<h5 class="text"> <a href='forget.php'>Forget Passward?</a></h5><span>
		</form>
	</div>
</body>

</html>
<?php include("adfoot.php");    ?>