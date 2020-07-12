<?php
if ($_POST['type'] == 'movie' && $_POST['movie_type'] == '') {
  echo 'adsf';
  header('Location: form3.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_POST['submit'] . ' ' . $_POST['type'] .': ' . $_POST['name']; ?></title>
</head>
<body>
  <?php

  if (isset($_POST['debug'])) {
    echo '<pre><strong>DEBUG:</strong>' . '<br/>';
    print_r($_POST);
    echo '</pre>';
  }

  $name = ucfirst($_POST['name']);
  if ($_POST['type'] == 'movie') {
    $foo = $_POST['movie_type'] . ' ' . $_POST['type'];
  } else {
    $foo = $_POST['type'];
  }

  echo '<p> You are ' . $_POST['submit'] . 'ing ';
  echo ($_POST['submit'] == 'Search') ? 'for ' : '';
  echo 'a ' . $foo . ' named ' . $name . '</p>';
  ?>

</body>
</html>
