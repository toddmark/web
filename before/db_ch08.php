<?php
  $db = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  $query = 'ALTER TABLE movie ADD COLUMN(
    movie_release INTEGER UNSIGNED DEFAULT 0,
    movie_rating TINYINT UNSIGNED DEFAULT 5
  )';
  mysqli_query($db, $query) or die(mysqli_error($db));
  echo 'movie updated!'

?>
