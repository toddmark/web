<?php
  session_start();
  if ($_SESSION['authuser'] != 1) {
    echo 'sorry';
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Movie site -- <?php echo $_GET['favmovie']; ?></title>
</head>
<body>
<h1>
Fav movie is:
<?php
  echo $_GET['favmovie'];
?>
</h1>
</body>
</html>
