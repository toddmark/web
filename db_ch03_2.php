<?php

$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));


//insert
$query = 'INSERT INTO movie
  ( movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director)
  VALUES
  (1, "Bruce Alimighty", 5, 2003, 1, 2),
  (2, "Office Space", 5, 1999, 5, 6),
  (3, "Grand Canyon", 2, 1991, 4, 3)';

mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'INSERT INTO movietype (
  movietype_id, movietype_label
) VALUES
  (1, "Sci Fi"),
  (2, "Drama"),
  (3, "Adventure"),
  (4, "War"),
  (5, "Comedy"),
  (6, "Horro"),
  (7, "Action"),
  (8, "Kids")';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'INSERT INTO people (
  people_id, people_fullname, people_isactor, people_isdirector
) VALUES
  (1, "Jim Carrey", 1, 0),
  (2, "Tom", 0, 1),
  (3, "Kasdan", 0, 1),
  (4, "Kline", 1, 1),
  (5, "Ron", 1, 1),
  (6, "Mike", 0, 1)';
mysqli_query($db, $query) or die(mysqli_error($db));

echo "Data successfully!";
