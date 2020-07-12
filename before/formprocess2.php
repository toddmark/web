<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Greetings Earthing</title>
</head>
<body>
  <?php echo '<h1>' . $_POST['greeting'] . ' ' . $_POST['name'] . '!</h1>';

  if (isset($_POST['debug'])) {
    echo '<pre><strong>DEBUG:</strong>' . '\\n';
    print_r($_POST);
    echo '</pre>';
  }
  ?>
</body>
</html>
