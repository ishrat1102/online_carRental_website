<?php include("h&f/header.php");
session_start();
include("dbconnect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	$sql = "SELECT * FROM user WHERE Email='$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$stored_pass = $row['Password'];

		//user cookie
		if (!empty($_POST["remember"])) {
			setcookie("login_na", $username, time() + (7 * 24 * 60 * 60), "/");
			setcookie("login_ema", $email, time() + (7 * 24 * 60 * 60), "/");
			setcookie("login_pas", $password, time() + (7 * 24 * 60 * 60), "/");
		} else {
			if (isset($_COOKIE["login_na"])) {
				setcookie("login_na", "", time() - (7 * 24 * 60 * 60), "/");
			}
			if (isset($_COOKIE["login_ema"])) {
				setcookie("login_ema", "", time() - (7 * 24 * 60 * 60), "/");
			}
			if (isset($_COOKIE["login_pas"])) {
				setcookie("login_pas", "", time() - (7 * 24 * 60 * 60), "/");
			}
		}


		if (password_verify($password, $stored_pass)) {
			$_SESSION['login_user'] = $email;
			echo "<script>
					alert('login successful!');window.location.href='profile.php'</script>";

			exit;
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
		<h1>Log In!</h1>
		<span>Enter Your UserName,Email and Password!</span>
		<form method="post" action="">
			<table cellpadding="2">

				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">User Name:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="username" placeholder="name" value="<?php if (isset($_COOKIE["login_na"])) {
																																					echo $_COOKIE["login_na"];
																																				} ?>">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Email:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="email" placeholder="email" value="<?php if (isset($_COOKIE["login_ema"])) {
																																				echo $_COOKIE["login_ema"];
																																			} ?>">
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="email">Password:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="password" name="password" placeholder="password" value="<?php if (isset($_COOKIE["login_pas"])) {
																																							echo $_COOKIE["login_pas"];
																																						} ?>">
						</td>
					</tr>
			</table>
			<br><input type="checkbox" name="remember" class="form-check-input" <?php if (isset($_COOKIE["login_ema"])) { ?> checked<?php } ?>>Remember Me
			<br>
			<br>
			<input type="submit" value=" Submit " class="btn btn-success">
			<br><br>
			<span class="text">
				<h5>Not registered yet? <a href='registration.php'>Register Here</a></h5>
			</span>
			<span>
				<h5 class="text"> <a href='forgpass.php'>Forget Passward?</a></h5><span>
		</form>
	</div>
</body>

</html>
<?php include("h&f/footer.php");      ?>