<?php
   
   session_start();
   
   $user_check = $_SESSION['login_admin'];
   
   if(!isset($_SESSION['login_admin'])){
      header("location:admin_login.php");
      die();
   }
   //checking user already logged in or not
   if(isset($_SESSION['login_user'])){
      header("location:../homepage.php");
      die();
   }
?>