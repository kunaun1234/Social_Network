<?php 
  //error_reporting(0);
  session_start();
  require_once (__DIR__).("/system/config.php");
  require_once (__DIR__).("/system/database.php");
  if(!isset($_SESSION["user_id"])){
      header("location: index.php/?page=login");
      exit();
  }
  $records = $pdo->prepare("SELECT * FROM users WHERE email = '".$_SESSION['email']."'");
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
?>

  <!--Header-->
  <?php require_once (__DIR__).("/template/object/member_header.php");?>

  
  <!--Body-->
  <?php 
    if($_GET["page"] == NULL){
      include_once (__DIR__).("/template/member/page_home.php");
    }else{
      include_once (__DIR__).("/template/member/page_".$_GET["page"].".php");
    }
  ?>

  <!--Footer-->
  <?php require_once (__DIR__).("/template/object/footer.php");?>
 