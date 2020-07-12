<?php
  $db = mysqli_connect('localhost', 'root', 'root') or die('mark check');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  mysqli_select_db($db, 'moviesite');
  $query = 'CREATE TABLE image(
    image_id INTEGER NOT NULL AUTO_INCREMENT,
    image_caption VARCHAR(255) NOT NULL,
    image_username VARCHAR(255) NOT NULL,
    image_filename VARCHAR(255) NOT NULL DEFAULT "",
    image_date DATE NOT NULL,
    PRIMARY KEY (image_id)
  ) ENGINE = MYISAM';

  mysqli_query($db, $query) or die(mysqli_error($db));
  echo 'Images table successfully';
?>
