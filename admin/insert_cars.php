<?php
include('adsession.php');
include("adhead.php");
include('db.php');
$user_check = $_SESSION['login_admin'];
$ses_sql = "SELECT * FROM `admintable` WHERE email='$user_check' ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
  $row = mysqli_fetch_array($r);


  $login_session1 = $row['username']; //echo $login_session1;

}

?>
<!DOCTYPE html>
<html>

<head>
  <title>insert cars</title>
  <style>
    html,
    body {
      height: 100%;
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
      margin-left: 180px;
      padding: 4px 10px;
      font-size: 20px;

    }
  </style>

</head>

<body style="background-color:grey;">

  <div id="box">

    <form method="post" action="insert_cars.php" enctype="multipart/form-data">
      <span>
        <h3><b>Insert Car Information</b></h3>
      </span>
      <table cellpadding="2">

        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Car Image:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="file" name="image">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Brand:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="brand" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="model" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model Year:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="model_year" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Seating Capacity:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="seat" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Fuel Type:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="fuel" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Price Per Day(BDT):</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="price" required>
            </td>
          </tr>

      </table><br>
      <input type="submit" class="btn btn-success" name="submit" value="Insert">
  </div>
  </form>

  </div>
</body>

</html>
<?php
// include( 'db.php');
if (isset($_POST['submit'])) {
  $image = $_FILES["image"]["name"];
  $brand = $_POST['brand'];
  $model = $_POST['model'];
  $model_year = $_POST['model_year'];
  $seat = $_POST['seat'];
  $fuel = $_POST['fuel'];
  $price = $_POST['price'];
  $sql = "INSERT INTO `cars`(`car_id`, `image`, `brand`, `model`, `model_year`, `seat`, `fuel`, `price`) VALUES ('null','$image',' $brand','$model','$model_year','$seat','$fuel','$price')";

  if (mysqli_query($conn, $sql)) {
    move_uploaded_file($_FILES["image"]["tmp_name"], "carlist_img/" . $_FILES["image"]["name"]);
    echo "<script>
					alert('inserted successfully !');
					window.location.href='update_delete_cars.php'
					</script>";
  } else {
    echo "Error: " . $sql . "
                        " . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>
<?php include('adfoot.php');   ?>