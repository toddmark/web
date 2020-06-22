<?php
if ($_POST['type'] == 'movie' && $_POST['movie_type'] == '') {
  header('Location: form3.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add/Search Entry</title>
</head>
<body>
  <?php echo '<h1>' . $_POST['submit'] . ' ' . $_POST['type'] . '!</h1>';

  if (isset($_POST['debug'])) {
    echo '<pre><strong>DEBUG:</strong>' . '\\n';
    print_r($_POST);
    echo '</pre>';
  }
  ?>
</body>
</html>
