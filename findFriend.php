<?php
require_once (__DIR__).("/system/mysqli.php");
  session_start();

    $user = $_SESSION["email"];
    $qry = $mysqli->query("SELECT email FROM users WHERE NOT email = '".$user."'");
    
    $name = array();
    
    while($info = $qry->fetch_assoc())
    {
        array_push($name,$info["email"]);
    }
    echo json_encode($name);
?>