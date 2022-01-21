 <?php include("h&f/guesthead.php"); ?>
 <?php
	include("dbconnect.php");



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

 			td {
 				padding: 5px 5px 5px 5px;
 				font-weight: bold;
 			}

 			th {
 				padding: 5px 5px 5px 5px;
 				font-weight: bold;
 				position: absolute;
 			}

 			#s1 {
 				color: cornflowerblue;
 			}
 		</style>
 	</head>

 	<body>
 		<span id="s1">
 			<h4><u>View Ratings of All Users: </u></h4>
 		</span>
 		<br><br>


 		<?php

			$sql = mysqli_query($conn, "SELECT * FROM rating  ");

			$total = mysqli_num_rows($sql);
			if ($total != 0) {

				while (($fetch = mysqli_fetch_assoc($sql))) { ?>

 				<div class="card w-50">
 					<div class="card-body">
 						<h5 class="card-title"><u>REVIEW OF <?php echo $fetch['username']; ?></u></h5>
 						<p class="card-text">
 						<table>
 							<tr>
 								<td>Rating:</td>


 								<td>
 									<?php $value = $fetch['rating'];
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
										} ?>
 								</td>
 							</tr>
 							<tr>
 								<td>Comment</td>
 								<td><?php echo $fetch['comment']; ?></td>
 							</tr>
 						</table>
 						</p>
 					</div>
 				</div><br>


 		<?php
				}
			} else {
			}



			?>


 	</body>
 </div>

 </html>
 <?php include("h&f/footer.php");   ?>