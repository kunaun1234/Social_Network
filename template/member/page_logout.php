<?php

session_start();
$user_update = $pdo->prepare("UPDATE users SET session_login = :session_login WHERE email = :email");
$user_update->execute(array(":session_login" => 0, ":email" => $_SESSION["email"]));
session_unset($_SESSION["user_id"]);
session_unset($_SESSION["email"]);
session_unset($_SESSION["login_member"]);

session_destroy();

header("Location: index.php");