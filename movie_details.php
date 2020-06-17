<?php
  function get_fullname($id) {
    global $db;
    $query = 'SELECT
      people_fullname
      FROM
        people
      WHERE
        people_id =' . $id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $people_fullname;
  }

  function get_movietype($type_id) {
    global $db;
    $query = 'SELECT
      movietype_label
      FROM
        movietype
      WHERE
        movietype_id=' . $type_id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $movietype_label;
  }

  function calculate_diff($takings, $cost) {
    $diff = $takings - $cost;
    if ($diff < 0) {
      $color = 'red';
      $diff = '$' . abs($diff) . ' million';
    } elseif ($diff > 0) {
      $color = 'green';
      $diff = '$' . $diff . ' million';
    } else {
      $color = 'blue';
      $diff = 'broke even';
    }
    return '<span style="color: ' . $color . ';">' . $diff . '</span>';
  }

  $db = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  $query = 'SELECT
    movie_name, movie_type, movie_year, movie_leadactor,
    movie_director, movie_running_time, movie_cost, movie_takings
    FROM
      movie
    WHERE
      movie_id = ' . $_GET['movie_id'];

    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);

    $movie_name = $row['movie_name'];
    $movie_director = get_fullname($row['movie_director']);
    $movie_leadactor = get_fullname($row['movie_leadactor']);
    $movie_year = $row['movie_year'];
    $movie_running_time = $row['movie_running_time'] . ' mins';
    $movie_takings = $row['movie_takings'] . ' million';
    $movie_cost = $row['movie_cost'] . ' million';
    $movie_health = calculate_diff($row['movie_takings'], $row['movie_cost']);

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
</head>
<body>
  <?php
  echo <<<testhtml
  <table border="1" cellspacing="1">
    <tr>
      <td>Title</td>
      <td>$movie_name</td>
      <td>Release Year</td>
      <td>$movie_year</td>
    </tr>
    <tr>
      <td>Movie Director</td>
      <td>$movie_director</td>
      <td>Cost</td>
      <td>$movie_cost</td>
    </tr>
    <tr>
      <td>Lead Actor</td>
      <td>$movie_leadactor</td>
      <td>Takings</td>
      <td>$movie_takings</td>
    </tr>
    <tr>
      <td>Running Time</td>
      <td>$movie_running_time</td>
      <td>Health</td>
      <td>$movie_health</td>
    </tr>
  </table>
  testhtml;
  ?>

<hr>

<?php
function generate_ratings($rating) {
  $movie_Star = '️';
  for($i = 0; $i < $rating; $i++){
    $movie_Star = '❤️️';
  }

  return $movie_Star;
}

echo generate_ratings(3);
?>
</body>
</html>
