
<html> 
	<head>
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style>

</style>
	  
	</head>
		<div class="container py-5" style="background-color: white;">
	   

	<body>
		
<?php
    include("dbconnect.php");
	$ren_id=$_GET['ren_id'];
   $sql="SELECT * FROM rented WHERE rented.ren_id='$ren_id'";
            $result=mysqli_query($conn,$sql);
			$total=mysqli_num_rows($result);
			if($total!=0)
			{
				while(($fetch=mysqli_fetch_assoc($result)))
				{
			    ?>
					<table style="border-collapse: collapse" border="2" > 
            <tr>
                <td  align="center"  style="color:rgb(38, 106, 231)">
                    <h4>Reciept </h4>
                </td>
            </tr>
			<tr>
                <td  align="left"  >
                    <span><b>Reciept print date:  </b> <?php echo  date("Y-m-d");?> </span>
                </td>
            </tr>
            <tr >
               
                <td align="right" >
                    <table >
                        <tr>
                            <td ><b><h5>Ishrat Car Rental</h5></b></td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>Building A/1,Lane 4,Khilgaon,Dhaka,Bangladesh</td>
                        </tr>
                        <tr>
                            <td><b>Contact No:<b></td>
                            <td>02-45681237,+88 01722083434</td>
                        </tr>
                        <tr>
                            <td><b>Email Address:</b></td>
                            <td>ishratcarrental@gmail.com</td>
                        </tr>
                    </table>
                </td>
                
            </tr>
            <tr>
                <td style="color:rgb(38, 106, 231)" align="center" >
                    <h4>User Details</h4>
                </td>
                
            </tr>
            <tr>
               <td><b>Fullname:</b>  <?php  echo $fetch['Fullname']; ?></td> 

            </tr>
            <tr>
                <td><b>National ID: </b> <?php  echo $fetch['NationalID']; ?></td> 
  
            </tr>
            <tr>
                <td><b>Mobile Number:</b>  <?php  echo $fetch['Mobile Number']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Email Address: </b> <?php  echo $fetch['Email']; ?></td> 
                
            </tr>
            <tr>
                <td style="color:rgb(38, 106, 231)" align="center" >
                    <h4>Renting Details</h4>
                </td>
            </tr>
            <tr>
                <td><b>Brand: </b>   <?php  echo $fetch['brand']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Model: </b>   <?php  echo $fetch['model']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Model Year: </b>   <?php  echo $fetch['model_year']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Seating Capacity: </b>   <?php  echo $fetch['seat']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Fuel Type:  </b>  <?php  echo $fetch['fuel']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Pickup Date:</b>    <?php  echo $fetch['pdate']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Return Date: </b>   <?php  echo $fetch['ren_date']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Price Per Day(BDT):  </b>  <?php  echo $fetch['price']; ?></td> 
                
            </tr>
            <tr>
                <td><b>Total Bill (BDT): </b>   <?php  echo $fetch['total_bill']; ?></td> 
                 
            </tr>
            

        </table>
					
				<button class="btn btn-primary" id="print" onclick="window.print()">Print </button>	
				<?php
				}
			}?>
		
	</body>
		  </div>
</html>
