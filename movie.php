<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
</head>
<body>
  <form action="commit.php?action=add&type=movie" method="post">
    <table>
      <tr>
        <td>Movie Name</td>
        <td><input type="text" name="movie_name" /></td>
      </tr>
      <tr>
        <td>Movie Type</td>
        <td>
          <select name="movie_type">
            <?php
              $query = 'SELECT * FROM movietype ORDER BY movietype_label';
              $result = mysqli_query($db, $query);
              while($row = mysqli_fetch_assoc($result)) {
                extract($row);
                echo '<option value="' . $movietype_id .'">' . $movietype_label . '</option>';
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
              for($yr = date("Y"); $yr >= 1970; $yr--) {
                echo '<option value="' . $yr .'">' . $yr . '</option>';
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
              while($row = mysqli_fetch_assoc($result)) {
                extract($row);
                echo '<option value="' . $people_id .'">' . $people_fullname . '</option>';
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
              while($row = mysqli_fetch_assoc($result)) {
                extract($row);
                echo '<option value="' . $people_id .'">' . $people_fullname . '</option>';
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo ucfirst($_GET['action']); ?>">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
