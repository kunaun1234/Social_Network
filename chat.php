<?php
require_once (__DIR__).("/system/mysqli.php");
session_start();
$user1 = $_SESSION["email"];
$user2 = $_REQUEST["name"];
$text = $_REQUEST["text"];
$time = $_REQUEST["time"];
if ($insert_stmt = $mysqli->prepare("INSERT INTO chat (send, receive, text,time) VALUES (?, ?, ?,?)")) {
    $insert_stmt->bind_param('ssss', $user1, $user2, $text,$time); 
    $insert_stmt->execute();
    return "insert success";
}else{
    return "insert fail";
}

?>