<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multipupose Form</title>
</head>
<body>
  <?php
    if($_POST['type'] == 'movie') {
      echo '<h1>New ' . ucfirst($_POST['movie_type']) . ': ';
    } else {
      echo '<h1>New ' . ucfirst($_POST['type']) . ': ';
    }
    echo $_POST['name'] . '</h1>';
    echo '<table>';
    if ($_POST['type'] == 'movie') {
      echo '<tr>';
      echo '<td>Year</td>';
      echo '<td>' . $_POST['year'] . '</td>';
      echo '</tr><tr>';
      echo '<td>Movie Description</td>';
    } else {
      echo '<tr><td>Biography</td>';
    }
    echo '<td>' . nl2br($_POST['extra']) . '</td>';
    echo '</tr></table>';
    if (isset($_POST['debug'])) {
      echo '<pre>';
      print_r($_POST);
      echo '</pre>';
    }
  ?>

</body>
</html>
