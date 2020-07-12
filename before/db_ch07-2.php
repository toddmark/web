<?php
  $db = mysqli_connect('localhost', 'root', 'root') or die('unable');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  $query = 'ALTER TABLE image DROP COLUMN image_filename';
  mysqli_query($db, $query) or die(mysqli_error($db));
  echo 'Image table successfully updated.';
?>
