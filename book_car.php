<?php
include('session.php');
include("h&f/loginhead.php");
include("dbconnect.php");




require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//fetching logged in user info
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

//fetch car info
$car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '';
//echo$car_id;
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$model = isset($_GET['model']) ? $_GET['model'] : '';
$model_year = isset($_GET['model_year']) ? $_GET['model_year'] : '';
$seat = isset($_GET['seat']) ? $_GET['seat'] : '';
$fuel = isset($_GET['fuel']) ? $_GET['fuel'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';



?>
<!DOCTYPE html>
<html>

<head>
	<style>
		html,
		body {
			height: 100%;
		}


		#box {

			background-color: #c4c3bb;
			margin: auto;
			width: 500px;
			height: 960px;
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
		<form method="post" action="book_car.php">
			<span>
				<h3><b>Renting Confirmation Form</b></h3>
			</span>
			<table cellpadding="2">
				<input class="form-control" style="height:30px;width:250px" name="id" type="hidden" value="<?php echo $login_session6; ?>" required>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Full Name:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="fname" value="<?php echo $login_session2; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="email">Email:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="email" name="email" value="<?php echo $login_session; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="phone">Mobile:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="mobile" value="<?php echo $login_session3; ?>" required>
						</td>
					</tr>
				</div>

				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="phone">NationalID:</label>
						</td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="nid" value="<?php echo $login_session5; ?>" required>
						</td>
					</tr>
				</div>
				<input class="form-control" style="height:30px;width:250px" name="car_id" type="hidden" value="<?php echo $car_id; ?>" required>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Brand:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="brand" value="<?php echo $brand; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="model" value="<?php echo $model; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model Year:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="model_year" value="<?php echo $model_year; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Seating Capacity:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="seat" value="<?php echo $seat; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Fuel Type:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="fuel" value="<?php echo $fuel; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Price Per Day(BDT):</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="text" name="price" value="<?php echo $price; ?>" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Select Pickup Date:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="date" name="pdate" required>
						</td>
					</tr>
				</div>
				<div class="form-group">
					<tr>
						<td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Select Return Date:</label></td>
						<td style=" padding-top: 15px;padding-bottom: 15px">
							<input class="form-control" style="height:25px;width:250px" type="date" name="date" required>
						</td>
					</tr>
			</table><br>
			<input type="submit" class="btn btn-success" name="submit" value="Confirm">
	</div>
	</form>
	</div>
</body>

</html>
<?php

if (isset($_POST['submit'])) {
	$u_id = $_POST['id'];
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$nid = $_POST['nid'];

	$carr_id = $_POST['car_id']; //echo $carr_id;
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$model_year = $_POST['model_year'];
	$seat = $_POST['seat'];
	$fuel = $_POST['fuel'];
	$price = $_POST['price'];

	$p_date = $_POST['pdate']; //echo $p_date;
	$ren_date = $_POST['date']; //echo $ren_date;
	//m is counter for date check loop 
	$m = 0;
	if (!empty($ren_date) && !empty($p_date)) {
		$query = "SELECT * FROM `rented` WHERE carr_id='$carr_id'  ";
		$res = mysqli_query($conn, $query);
		$total = mysqli_num_rows($res);

		function check($start, $end, $p_date)
		{
			// Converting to timestamp
			$start_ts = strtotime($start);
			$end_ts = strtotime($end);
			$p_date_ts = strtotime($p_date);
			// Check if date is between start & end
			return (($p_date_ts >= $start_ts) && ($p_date_ts < $end_ts));
		}
		function check2($start, $end, $ren_date)
		{
			// Converting to timestamp
			$start_ts = strtotime($start);
			$end_ts = strtotime($end);
			$ren_date_ts = strtotime($ren_date);
			// Check if date is between start & end
			return (($ren_date_ts >= $start_ts) && ($ren_date_ts < $end_ts));
		}
		function check1($end, $p_date)
		{
			// Converting to timestamp

			$end_ts = strtotime($end);
			$p_date_ts = strtotime($p_date);
			// Check if date is between start & end
			return ($p_date_ts == $end_ts);
		}
		function check3($end, $ren_date)
		{
			// Converting to timestamp

			$end_ts = strtotime($end);
			$ren_date_ts = strtotime($ren_date);
			// Check if date is between start & end
			return ($ren_date_ts == $end_ts);
		}
		//from form dates
		function checkkk($p_date, $ren_date, $start, $end)
		{
			// Converting to timestamp
			$start_ts = strtotime($start);
			$end_ts = strtotime($end);
			$p_date_ts = strtotime($p_date);
			$ren_date_ts = strtotime($ren_date);
			// Check if date is between start & end
			return (($start_ts >= $p_date_ts) && ($start_ts <= $ren_date_ts) && ($end_ts >= $p_date_ts) && ($end_ts <= $ren_date_ts));
		}


		while ($data = mysqli_fetch_assoc($res)) {
			$start = $data['pdate']; //echo $start;
			$end = $data['ren_date']; //echo $end;

			if (check($start, $end, $p_date) || check1($end, $p_date) || check2($start, $end, $ren_date) || check3($end, $ren_date) || checkkk($p_date, $ren_date, $start, $end)) {
				$m++; //echo $m;
				echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;"> Date Taken</div></div>';
			}
		}
		if ($m == 0) {
			$date1 = date_create($p_date);
			$date2 = date_create($ren_date);
			$diff = date_diff($date1, $date2);

			$diff1 = $diff->format("%a"); //echo "diff:";echo $diff1;
			$total_bill = (($price * $diff1) + $price); //echo $total_bill;
			$query1 = "INSERT INTO `rented`(`ren_id`, `u_id`, `Fullname`, `Email`, `Mobile Number`, `NationalID`, `carr_id`, `brand`, `model`, `model_year`, `seat`, `fuel`, `price`, `pdate`, `ren_date`, `total_bill`) VALUES (null,'$u_id','$fname','$email','$mobile','$nid','$carr_id','$brand','$model','$model_year','$seat','$fuel','$price','$p_date','$ren_date','$total_bill')";

			$result = mysqli_query($conn, $query1);

			if (!$result) {
				echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;"> Try Again</div></div>';
			} else {
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
				$mail->Subject = "Booking Confirmation";
				$mail->setFrom("mail address from which you want to send mail to customers and admin", "Ishrat");
				$se_email = $email;
				$body = "Your Booking is successful";
				$mail->Body = $body;
				$mail->addAddress($se_email);
				if ($mail->Send()) {
					$mail->smtpClose();
					echo "<script>
								alert('booking is successful !');
								 window.location.href='view_your_renting.php'</script>";
				} else {
					echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;"> cannot send confirmation mail</div></div>';
				}
				//sending mail part end

			}
		} else {
			echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;"> Please Try Again</div></div>';
		}

		//}

		die;
	} else {
		echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;"> Information missing</div></div>';
	}
	mysqli_close($conn);
}

?>



<?php include("h&f/footer.php"); ?>