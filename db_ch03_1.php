<?php
$db = mysqli_connect('localhost', 'root', 'root');
// print_r($db);
$query = "CREATE DATABASE IF NOT EXISTS moviesite";
mysqli_query($db, $query) or die(mysqli_error($db));

mysqli_select_db($db, 'moviesite');

$query = 'CREATE TABLE movie (
    movie_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    movie_name VARCHAR(255) NOT NULL,
    movie_type TINYINT NOT NULL DEFAULT 0,
    movie_year SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    movie_leadactor INTEGER UNSIGNED NOT NULL DEFAULT 0,
    movie_director INTEGER UNSIGNED NOT NULL DEFAULT 0,

    PRIMARY KEY (movie_id),
    KEY movie_type (movie_type, movie_year)
  )
  ENGINE=MYISAM';

mysqli_query($db, $query) or die(mysqli_error($db));
