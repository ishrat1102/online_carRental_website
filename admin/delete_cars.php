<?php
include('adsession.php');
include("adhead.php");
include('db.php');
$user_check = $_SESSION['login_admin'];
$ses_sql = "SELECT * FROM `admintable` WHERE email='$user_check' ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
  $row = mysqli_fetch_array($r);


  $login_session1 = $row['username'];
}

$car_id = $_GET['car_id'];
$sql1 = "SELECT * FROM cars WHERE cars.car_id='$car_id'";
$result1 = mysqli_query($conn, $sql1);
$total = mysqli_num_rows($result1);
if ($total != 0) {
  while (($fetch = mysqli_fetch_assoc($result1))) {
    unlink("carlist_img/" . $fetch['image']);
  }
}
$sql = "DELETE  FROM  cars WHERE car_id='$car_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
  echo "<script>
					alert('data deleted !');
					window.location.href='update_delete_cars.php'
					</script>";
} else {
  echo "data not deleted";
}
?>
<?php //delete code 
?>