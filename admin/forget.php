<?php include("header1.php");  ?>
<?php


include("db.php");

require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$email = $_POST['email'];

	if (!empty($email)) {

		$sql = "select * from admintable where email = '$email' ";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$fetch = mysqli_fetch_assoc($result);
			$i = $fetch['a_id'];
			$query = "select * from admintable where a_id = '$i' ";
			$r = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($r);
				$ud = $user_data['a_id'];

				$to_email = $email;
				//sending mail part start
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPAuth = "true";
				$mail->SMTPSecure = "tls";
				$mail->Port = "587";
				$mail->Username = "mail address from which you want to send mail to customers and admin";
				$mail->Password = "mail address password";
				$mail->IsHTML(true);
				$mail->Subject = "Verification Code";
				$mail->setFrom("mail address from which you want to send mail to customers and admin", "Ishrat");
				$se_email = $to_email;
				$body = rand(100000, 1000000);
				//$mail->Body =rand(100000,1000000);
				$mail->Body = $body;
				$mail->addAddress($se_email);
				if ($mail->Send()) {
					$mail->smtpClose();
					echo "Successful";
				} else {
					echo "error";
				}
				//sending mail part end


				$plaintext_password = $body;
				$hash = password_hash(
					$plaintext_password,
					PASSWORD_DEFAULT
				);
				header("Location: newpas1.php?i=$ud & ID=$hash");
				die;
			}
		}

		echo "wrong Email Address";
	} else {
		echo "Field is Empty!";
	}
}

?>

<!DOCTYPE html>
<html>

<head>




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
	</style>

</head>

<body>
	<div id="box">
		<span>
			<h1>Enter Your Email Here</h1>
		</span><br><br><br>
		<form method="post" action="">
			<table cellpadding="2">
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-right:15px;font-size:25px"><label for="name">Email:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px;padding-left:30px">
							<input class="form-control" style="height:50px;width:250px" type="text" name="email" placeholder="email">
						</td>
					</tr>
				</div>
			</table><br><br><br>
			<input class="btn btn-success" type="submit" value="Verify">
		</form>
	</div>
</body>

</html>
<?php include("adfoot.php"); ?>