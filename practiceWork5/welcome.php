<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
  echo "Welcome ", $_SESSION['name'], "!";
  echo "<br><a href='logout.php'>Sign Out</a>";
}
else {
  header('Location:login.html');
}
?>
