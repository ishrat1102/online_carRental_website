<?php include("header1.php"); ?>
<!DOCTYPE html>
<html>

<head>

  <title>Registration</title>


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

    <form method="post" action="adreg.php">
      <span>
        <h3><b>Registration</b></h3>
      </span>
      <table cellpadding="2">
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="name">Username:</label></td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:25px;width:250px" type="text" name="username" maxlength="20" placeholder="max characters 50" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style=" padding-top: 15px;padding-bottom: 15px"><label for="email">Email:</label>
            </td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:25px;width:250px" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" placeholder="example@gmail.com" required>
            </td>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <td style="padding-top: 15px;padding-bottom: 15px"><label for="pass">Password:</label>
            </td>
            <td style=" padding-top: 15px;padding-bottom: 15px">
              <input class="form-control" style="height:25px;width:250px" type="password" name="password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}" placeholder="8-20 charcters" title="Atleast 1uppercase,1lowercase,1digit, and no special characters" required>
            </td>
          </tr>
        </div>

      </table><br>
      <input type="submit" class="btn btn-success" name="submit" value="Register">
  </div>




  </form>

  </div>
</body>

</html>
<?php
include('db.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);


  $sql = "INSERT INTO `admintable`(`a_id`, `username`,`email`, `password`) VALUES (null,'$username','$email','$password')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>
					alert('registerd successfully !');
					window.location.href='admin_login.php'
					</script>";
  } else {
    /*echo "Error: " . $sql . "
                        " . mysqli_error($conn);*/
    echo '<div style="background-color: white;"><div style="font-size: 25px;margin: 20px;color:black;">Error: Only one account could be created with same email .</div></div>';
  }
  mysqli_close($conn);
}
?>
<?php include("adfoot.php");   ?>