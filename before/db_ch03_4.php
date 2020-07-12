<?php

  $db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('wrong connent');

  $query = 'ALTER TABLE movie ADD COLUMN(
    movie_running_time TiNYINT UNSIGNED NULL,
    movie_cost DECIMAL(4,1) NULL,
    movie_takings DECIMAL(4,1) NULL)';

  mysqli_query($db, $query) or die(mysqli_error($db));

  $query = 'UPDATE movie SET
    movie_running_time = 101,
    movie_cost = 8,
    movie_takings = 242.6
    WHERE
      movie_id=1';

  mysqli_query($db, $query) or die(mysqli_error($db));

  $query = 'UPDATE movie SET
    movie_running_time = 89,
    movie_cost = 10,
    movie_takings = 10.8
    WHERE
      movie_id=2';

  mysqli_query($db, $query) or die(mysqli_error($db));

  $query = 'UPDATE movie SET
    movie_running_time = 134,
    movie_cost = NULL,
    movie_takings =33.2
    WHERE
      movie_id=3';

  mysqli_query($db, $query) or die(mysqli_error($db));
?>
