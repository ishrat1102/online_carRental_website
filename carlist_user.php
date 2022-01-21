<?php
include('session.php');

 include ("h&f/loginhead.php");?> 
<html>
<head>
<style>

</style>
  
</head>
<div class="container" style="background-color: white;">
	   

<body>

  
<form method="post" enctype="multipart/form-data">
<div class="container py-5">
<div class="row mt-4">
<?php
          include("dbconnect.php");
            $sql="SELECT * FROM cars ORDER BY brand";
            $result=mysqli_query($conn,$sql);
			$total=mysqli_num_rows($result);
			if($total!=0)
			{
				while(($fetch=mysqli_fetch_assoc($result)))
				{?>
					<div class="col-md-3 mt-3">
					<div class="card" style="width: 18rem;">
						  <img src="<?php echo "admin/carlist_img/".$fetch['image'];?>" class="card-img-top" width="100px"height="100px">
						  <div class="card-body">
							<h5 class="card-title"><u> <?php echo $fetch['brand']; ?></u></h5>
							<p class="card-text">
							<table>
							<tr><td>Model:</td><td style="padding-left:10px"><?php echo $fetch['model']; ?></td>
							</tr>
							<tr><td>Model Year:</td><td style="padding-left:10px"><?php echo $fetch['model_year']; ?></td>
							</tr>
							<tr><td>Seating Capacity:</td><td style="padding-left:10px"><?php echo $fetch['seat']; ?></td>
							</tr>
							<tr><td>Fuel Type:</td><td style="padding-left:10px"><?php echo $fetch['fuel']; ?></td>
							</tr>
							<tr><td>Price Per Day (BDT):</td><td style="padding-left:10px"><?php echo $fetch['price']; ?></td>
							</tr>
							</table>
							
							</p>
							<a href='book_car.php?car_id=<?php echo $fetch['car_id'];?>&brand=<?php echo $fetch['brand'];?>&model=<?php echo $fetch['model'];?>&model_year=<?php echo $fetch['model_year']?>&seat=<?php echo $fetch['seat']?>&fuel=<?php echo $fetch['fuel']?>&price=<?php echo $fetch['price']?>' class="btn btn-primary">Rent</a>
						  </div>
                    </div>
					</div>
					<br>
				<?php
				}
		    }
		    else
			{ 
			  //  echo"total has  no records";
			}
?>
</div>
</div>

</tr>
</table>

</form>
</body>
<br>
</div>
</html>
<?php include ("h&f/footer.php"); ?> 
			