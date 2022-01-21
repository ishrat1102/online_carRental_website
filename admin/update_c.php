<?php include('adsession.php');
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
<?php
$car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$model = isset($_GET['model']) ? $_GET['model'] : '';
$model_year = isset($_GET['model_year']) ? $_GET['model_year'] : '';
$seat = isset($_GET['seat']) ? $_GET['seat'] : '';
$fuel = isset($_GET['fuel']) ? $_GET['fuel'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$image = isset($_GET['image']) ? $_GET['image'] : '';

?>
<!DOCTYPE html>
<html>

<head>
  <title>Update cars</title>
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

    <form method="post" action="update_c.php" enctype="multipart/form-data">
      <span>
        <h3><b>Update Car Information</b></h3>
      </span>
      <table cellpadding="2">
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Car Image:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="file" name="image">
              <input class="form-control" style="height:30px;width:250px" name="old_car_id" type="hidden" value="<?php echo $image; ?>">
            </td>
          </tr>
        </div>
        <input class="form-control" style="height:30px;width:250px" name="car_id" type="hidden" value="<?php echo $car_id; ?>">

        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Brand:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="brand" value="<?php echo $brand; ?>">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="model" value="<?php echo $model; ?>">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Model Year:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="model_year" value="<?php echo $model_year; ?>">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Seating Capacity:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="seat" value="<?php echo $seat; ?>">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Fuel Type:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="fuel" value="<?php echo $fuel; ?>">
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Price Per Day(BDT):</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:30px;width:250px" type="text" name="price" value="<?php echo $price; ?>">
            </td>
          </tr>

      </table><br>
      <input type="submit" class="btn btn-success" name="submit" value="Update">
  </div>
  </form>

  </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $car_id1 = isset($_POST['car_id']) ? $_POST['car_id'] : '';
  $brand2 = isset($_POST['brand']) ? $_POST['brand'] : '';
  $model3 = isset($_POST['model']) ? $_POST['model'] : '';
  $model_year4 = isset($_POST['model_year']) ? $_POST['model_year'] : '';
  $seat5 = isset($_POST['seat']) ? $_POST['seat'] : '';
  $fuel6 = isset($_POST['fuel']) ? $_POST['fuel'] : '';
  $price7 = isset($_POST['price']) ? $_POST['price'] : '';

  $image1 = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';
  $tmp = isset($_FILES["image"]["tmp_name"]) ? $_FILES["image"]["tmp_name"] : '';
  //$image2=   isset($_POST['old_car_id']) ? $_POST['old_car_id'] : '';
  $sql = "UPDATE cars SET image='$image1',car_id='$car_id1',brand='$brand2',model='$model3',model_year ='$model_year4 ',seat='$seat5',fuel='$fuel6',price='$price7' WHERE cars.car_id = '$car_id1' ";


  $result = mysqli_query($conn, $sql);
  if ($result) {
    move_uploaded_file($tmp, "carlist_img/" . $image1);
  } else {
    echo "failed";
  }
}
include('adfoot.php');    ?>