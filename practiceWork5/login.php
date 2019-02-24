<?php
session_start();

$check = true;
if (empty($_POST["name"]) || empty($_POST["email"])|| strlen($_POST["password"]) < 6 || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $check = false;
}

if ($check) {
  $_SESSION['name'] = $_POST["name"];
  $_SESSION['email'] = $_POST["email"];
  header('Location:welcome.php');
}
else {
  header('Location:login.html');
}
?>
