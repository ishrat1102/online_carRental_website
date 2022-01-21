 <?php include('session.php');
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
 <div class="container" style="background-color: white;">

 	<head>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<style>
 			.rated {
 				color: yellow;
 			}

 			th,
 			td {
 				padding: 5px 5px 5px 5px;
 				font-weight: bold;
 			}

 			#s1 {
 				color: Red;
 			}
 		</style>
 	</head>

 	<body>
 		<span id="s1">
 			<h4><u>View Rating of &nbsp<?php echo $login_session1; ?> : </u></h4>
 		</span>
 		<br><br>


 		<?php

			$sql = mysqli_query($conn, "SELECT * FROM rating WHERE user_id=$login_session6 ");

			$total = mysqli_num_rows($sql);
			if ($total != 0) {

				while (($fetch = mysqli_fetch_assoc($sql))) {
					echo "<table >";
					echo "<tr ><th  >Rating:</th><td>" . $fetch['rating'] . "</td> <td>";
					$value = $fetch['rating'];
					if ($value == 1) { ?>
 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}

					?>
 				<?php if ($value == 1.5) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star-half rated " style="font-size:24px"></span>&nbsp
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 2) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 2.5) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star-half rated " style="font-size:24px"></span>&nbsp
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 3) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 3.5) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star-half rated " style="font-size:24px"></span>&nbsp
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 4) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star " style="font-size:24px"></span>

 				<?php
					}


					?>
 				<?php if ($value == 4.5) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star-half rated " style="font-size:24px"></span>&nbsp

 				<?php
					}


					?>
 				<?php if ($value == 5) { ?>

 					<span class="fa fa-star rated" style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>
 					<span class="fa fa-star rated " style="font-size:24px"></span>

 				<?php
					}



					echo "</td></tr>
					
					<tr ><th  >Comment:</th><td>" . $fetch['comment'] . "</td></tr>";
					echo "</table>	"; ?>
 				<a href='update_rating.php?r_id=<?php echo $fetch['r_id']; ?>&rating=<?php echo $fetch['rating']; ?>&comment=<?php echo $fetch['comment']; ?>&u_id=<?php echo $fetch['user_id']; ?>&username=<?php echo $fetch['username']; ?>' class="btn btn-info">Update</a></td>
 				<td><a href='delete_rating.php?r_id=<?php echo $fetch['r_id']; ?>' class="btn btn-danger">Delete</a></td><br>
 		<?php
				}
			} else {
			}



			?>

 		<br>
 	</body>
 </div>

 </html>
 <?php include("h&f/footer.php");     ?>