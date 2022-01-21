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
 
 ?>
<marquee width="100%" direction="right" height="50px" style="background-color:white;">
 <h3>Admin Dashboard.Welcome <?php echo $login_session1; ?>!!</h3> <?php //print_r($_COOKIE);?>
</marquee>
<img src="carlist_img/toyota-allion.jpg"  class="d-block w-100" alt="...">
<?php include("adfoot.php"); ?>