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
        case 'people':
        $query = 'INSERT INTO people(people_fullname, people_isactor, people_isdirector) VALUES (
          "'. $_POST['people_fullname'] .'",
          ' .$_POST['people_isactor'] .',
          ' .$_POST['people_isdirector'] .')';
        break;
      }
    break;
    case 'edit':
      switch($_GET['type']) {
        case 'movie':
          $query = 'UPDATE movie SET
            movie_name = "' . $_POST['movie_name'] .'",
            movie_year = ' . $_POST['movie_year'] .',
            movie_type = ' . $_POST['movie_type'] .',
            movie_leadactor = ' . $_POST['movie_leadactor'] .',
            movie_director = ' . $_POST['movie_director'] . '
            WHERE
              movie_id = ' . $_POST['movie_id'];
        break;
        case 'people':
          $query = 'UPDATE people SET
            people_fullname = "' . $_POST['people_fullname'] .'",
            people_isactor = ' .$_POST['people_isactor'] .',
            people_isdirector = ' .$_POST['people_isdirector'] .'
            WHERE
              people_id = ' .$_POST['people_id'];
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
