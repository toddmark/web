<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commit</title>
</head>

<body>
  <?php
  switch ($_GET['action']) {
    case "add":
      switch ($_GET['type']) {
        case 'movie':
          $query = 'INSERT INTO movie
          (movie_name, movie_year, movie_type, movie_leadactor, movie_director) VALUES (
            "' . $_POST['movie_name'] . '",
            ' . $_POST['movie_year'] . ',
            ' . $_POST['movie_type'] . ',
            ' . $_POST['movie_leadactor'] . ',
            ' . $_POST['movie_director'] . '
            )';
          break;
      }
      break;
  }
  if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    echo 'done!';
  }
  ?>
  <pre><?php
    echo $query;
  ?></pre>
</body>

</html>
