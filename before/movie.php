<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
if ($_GET['action'] == 'edit') {
  $query = 'SELECT * FROM movie WHERE movie_id=' . $_GET['id'];
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  extract($row);
  // var_dump($row);
} else {
  $movie_name = '';
  $movie_type = 0;
  $movie_year = date('Y');
  $movie_leadactor = 0;
  $movie_director = 0;
  $movie_release = time();
  $movie_rating = 5;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
          echo ucfirst($_GET['action']);
          ?> Movie</title>
</head>

<body>
  <?php
  if (isset($_GET['error'])) {
    echo '<h5 style="color: #9d0000;">';
    echo $_GET['error'];
    echo '<h5>';
  }
  ?>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=movie" method="post">
    <table>
      <tr>
        <td>Movie Name</td>
        <td><input type="text" name="movie_name" value="<?php echo $movie_name; ?>" /></td>
      </tr>
      <tr>
        <td>Movie Type</td>
        <td>
          <select name="movie_type">
            <?php
            $query = 'SELECT * FROM movietype ORDER BY movietype_label';
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              extract($row);
              if ($movie_type == $movietype_id) {
                echo '<option selected="selected" value="' . $movietype_id . '">' . $movietype_label . '</option>';
              } else {
                echo '<option value="' . $movietype_id . '">' . $movietype_label . '</option>';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Movie Year</td>
        <td>
          <select name="movie_year">
            <?php
            for ($yr = date("Y"); $yr >= 1970; $yr--) {
              if ($yr == $movie_year) {
                echo '<option selected="selected" value="' . $yr . '">' . $yr . '</option>';
              } else {
                echo '<option value="' . $yr . '">' . $yr . '</option>';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Lead Actor</td>
        <td>
          <select name="movie_leadactor">
            <?php
            $query = 'SELECT * FROM people WHERE people_isactor = 1 ORDER BY people_fullname';
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              extract($row);
              if ($people_id == $movie_leadactor) {
                echo '<option selected="selected" value="' . $people_id . '">' . $people_fullname . '</option>';
              } else {
                echo '<option value="' . $people_id . '">' . $people_fullname . '</option>';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Director</td>
        <td>
          <select name="movie_director">
            <?php
            $query = 'SELECT * FROM people WHERE people_isdirector = 1 ORDER BY people_fullname';
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              extract($row);
              if ($movie_director == $people_id) {
                echo '<option selected="selected" value="' . $people_id . '">' . $people_fullname . '</option>';
              } else {
                echo '<option value="' . $people_id . '">' . $people_fullname . '</option>';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Movie Release Date<small>(dd-mm-yyyy)</small></td>
        <td>
          <input type="text" name="movie_release" value="<?php echo date("d-m-y", $movie_release); ?>" />
        </td>
      </tr>
      <tr>
        <td>Movie Rating</td>
        <td>
          <input type="text" name="movie_rating" value="<?php echo $movie_rating; ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <?php
          if ($_GET['action'] == 'edit') {
            echo '<input type="hidden" value="' . $_GET['id'] . '" name="movie_id" />';
          }
          ?>
          <input type="submit" name="submit" value="<?php echo ucfirst($_GET['action']); ?>">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
