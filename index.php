<?php 
  error_reporting(0);
  session_start();
  require_once (__DIR__).("/system/config.php");
  require_once (__DIR__).("/system/database.php");
  if(isset($_SESSION["user_id"])){
    echo '<script>window.location.href="member.php?page=home";</script>';
    exit();
  }
?>

  <!--Header-->
  <?php require_once (__DIR__).("/template/object/header.php");?>

  
  <!--Body-->
  <?php 
    if(empty($_GET["page"])){
      include_once (__DIR__).("/template/page_home.php");
    }else{
      include_once (__DIR__).("/template/page_".$_GET["page"].".php");
    }
  ?>

  <!--Footer-->
  <?php require_once (__DIR__).("/template/object/footer.php");?>