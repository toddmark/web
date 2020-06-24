<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Datebase</title>
  <style type="text/css">
    th {background-color: #999;}
    .odd_row {background-color: #eee;}
    .even_row {background-color: #ddd;}
  </style>
</head>

<body>
  <table width="100%">
    <tr>
      <th colspan="2">Movies<a href="movie.php?action=add">[ADD]</a></th>
    </tr>
    <?php
      $query = 'SELECT * FROM movie';
      $result = mysqli_query($db, $query) or die(mysqli_error($db));
      $odd = true;
      while($row = mysqli_fetch_assoc($result)) {
        echo $odd ? '<tr class="odd_row">' : '<tr class="even_row">';
        $odd = !$odd;
        echo '<td style="width: 75%;">';
        echo $row['movie_name'];
        echo '</td><td>';
        echo '<a href="movie.php?action=edit&id=' . $row['movie_id'] . '">[EDIT]</a>';
        echo '<a href="delete.php?type=movie&id=' . $row['movie_id'] . '">[DELETE]</a>';
        echo '</td></tr>';
      }
    ?>
    <tr>
      <th colspan="2">People <a href="people.php?action=add">[ADD]</a></th>
    </tr>
    <?php
      $query = 'SELECT * FROM people';
      $result = mysqli_query($db, $query) or die(mysqli_error($db));
      $odd = true;
      while($row = mysqli_fetch_assoc($result)) {
        echo $odd ? '<tr class="odd_row">' : '<tr class="even_row">';
        $odd = !$odd;
        echo '<td style="width: 75%;">';
        echo $row['people_fullname'];
        echo '</td><td>';
        echo '<a href="people.php?action=edit&id=' . $row['people_id'] . '">[EDIT]</a>';
        echo '<a href="delete.php?type=people&id=' . $row['people_id'] . '">[DELETE]</a>';
        echo '</td></tr>';
      }
    ?>
  </table>
</body>

</html>
