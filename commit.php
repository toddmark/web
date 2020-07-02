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
          $error = array();
          $movie_name = isset($_POST['movie_name']) ? trim($_POST['movie_name']) : '';
          if (empty($movie_name)) {
            $error[] = urlencode('Enter a movie name');
          }
          $movie_type = isset($_POST['movie_type']) ? trim($_POST['movie_type']) : '';
          if (empty($movie_type)) {
            $error[] = urlencode('Enter a movie type');
          }
          $movie_year = isset($_POST['movie_year']) ? trim($_POST['movie_year']) : '';
          if (empty($movie_year)) {
            $error[] = urlencode('Enter a movie year');
          }
          $movie_leadactor = isset($_POST['movie_leadactor']) ? trim($_POST['movie_leadactor']) : '';
          if (empty($movie_leadactor)) {
            $error[] = urlencode('Enter a movie leadactor');
          }
          $movie_director = isset($_POST['movie_director']) ? trim($_POST['movie_director']) : '';
          if (empty($movie_director)) {
            $error[] = urlencode('Enter a movie director');
          }

          if (empty($error)) {
            $query = 'INSERT INTO movie
          (movie_name, movie_year, movie_type, movie_leadactor, movie_director) VALUES (
            "' . $_POST['movie_name'] . '",
            ' . $_POST['movie_year'] . ',
            ' . $_POST['movie_type'] . ',
            ' . $_POST['movie_leadactor'] . ',
            ' . $_POST['movie_director'] . '
            )';
          } else {
            header("Location: movie.php?action=add" . '&error=' .join($error, urlencode('<br/>')));
          }

          break;
        case 'people':
          $query = 'INSERT INTO people(people_fullname, people_isactor, people_isdirector) VALUES (
          "' . $_POST['people_fullname'] . '",
          ' . $_POST['people_isactor'] . ',
          ' . $_POST['people_isdirector'] . ')';
          break;
      }
      break;
    case 'edit':
      switch ($_GET['type']) {
        case 'movie':
          $query = 'UPDATE movie SET
            movie_name = "' . $_POST['movie_name'] . '",
            movie_year = ' . $_POST['movie_year'] . ',
            movie_type = ' . $_POST['movie_type'] . ',
            movie_leadactor = ' . $_POST['movie_leadactor'] . ',
            movie_director = ' . $_POST['movie_director'] . '
            WHERE
              movie_id = ' . $_POST['movie_id'];
          break;
        case 'people':
          $query = 'UPDATE people SET
            people_fullname = "' . $_POST['people_fullname'] . '",
            people_isactor = ' . $_POST['people_isactor'] . ',
            people_isdirector = ' . $_POST['people_isdirector'] . '
            WHERE
              people_id = ' . $_POST['people_id'];
          break;
      }
      break;
  }
  if (isset($query)) {
    echo '<pre>';
    var_dump($query);
    echo '</pre>';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    echo 'done!';
  }
  ?>
  <p>
    <h3>POST</h3>
    <pre><?php
          var_dump($_POST);
          ?></pre>
  </p>
  <p>
    <a href="./admin.php">To admin</a>
  </p>
</body>

</html>
