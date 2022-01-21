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
	}


	?>
 <html>
 <div class="container" style="background-color: white;">

 	<head>
 		<style>
 			th,
 			td {
 				padding: 5px 5px 5px 5px;
 				font-weight: bold;
 			}

 			#s1 {
 				color: cornflowerblue;
 			}
 		</style>
 	</head>

 	<body>
 		<span id="s1">
 			<h4><u>Profile of <?php echo $login_session1; ?> : </u></h4>
 		</span><?php //print_r($_COOKIE);
				?>
 		<br><br>


 		<?php




			echo "<table>";
			echo "<tr ><th  >Full Name:</th><td>" . $login_session2 . "</td></tr>
					<tr >
<th  >Username:</th><td>" . $login_session1 . "</td></tr>
					<tr >
<th  >Email:</th><td>" . $login_session . "</td></tr>
					<tr >
<th  >Mobile Number:</th><td>" . $login_session3 . "</td></tr>
					<tr >
<th  >Gender:</th><td>" . $login_session4 . "</td></tr>
					<tr >
<th  >NationalID:</th><td>" . $login_session5 . "</td></tr>";
			echo "</table>	";


			?>


 	</body>
 </div>

 </html>
 <?php include("h&f/footer.php");        ?>