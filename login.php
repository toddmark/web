<?php

session_unset();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <!-- <?php include 'header.php'; ?> -->
  <form action="./movie1.php" method="post">
  <p>your name: <input type="text" name="user" /> </p>
  <p>your password: <input type="password" name="pass" /> </p>
  <p> <input type="submit" name="submit" value="submit" /> </p>
  </form>
  <?php
    $month = date('D, d, m, y, H,i,s');
    echo $month;
  ?>
</body>
</html>
