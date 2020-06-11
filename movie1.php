<?php
  session_start();
  $_SESSION['username'] = $_POST['user'];
  $_SESSION['userpass'] = $_POST['pass'];
  $_SESSION['authuser'] = 0;
  if (($_SESSION['username'] == "Joe" and $_SESSION['userpass'] == '12345' )) {
    $_SESSION['authuser'] = 1;
  } else {
    echo 'sorry';
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>find movie</title>
</head>
<body>

<!-- <?php include 'header.php' ?> -->
<a target="_blank" href="./moviesite.php?favmovie=xiaoshengke">to see information about my fav</a>

</body>
</html>
