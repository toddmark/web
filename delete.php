<?php
  $db = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
  if(!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
      case 'movie':
        echo 'Delete this movie?';
      break;
      case 'people':
        echo 'Delete this people?';
      break;
    }

    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1"> yes </a>';
    echo 'or <a href="admin.php"> no</a>';
  } else {
    switch($_GET['type']) {
      case 'people':
        $query = 'UPDATE movie SET movie_leadactor = 0 WHERE movie_leadactor = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $query = 'DELETE FROM people WHERE people_id='. $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p>Movie has been deleted.
  <a href="movie_index.php">Return to index</a>
</p>
<?php
  break;
    case 'movie':
      $query = 'DELETE FROM movie WHERE movie_id=' . $_GET['id'];
      $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p>Movie has been deleted.
  <a href="movie_index.php">Return to index</a>
</p>
<?php
    break;
  }
}
?>
