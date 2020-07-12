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

<?php include 'header.php' ?>
<a target="_blank" href="./moviesite.php?favmovie=xiaoshengke">to see information about my fav</a>

<hr/>

<a href="./moviesite.php">Click to see 10 top movies</a>
<br/>
<a href="./moviesite.php?sorted=true">Click to see 10 top movies sorted</a>

<hr/>
Choose how many movies you would like to see:
<form action="./moviesite.php" method="post">
<input type="text" name="num" id="">
<input type="checkbox" name="sorted" id="">
<input type="submit" value="submit00">
</form>

</body>
</html>
