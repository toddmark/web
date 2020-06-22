<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Say My Name</title>
</head>
<body>
  <?php echo '<h1> Hello, ' . $_POST['name'] . '!</h1>'; ?>
  <strong>DEBUG:</strong>
  <?php print_r($_POST); ?>
</body>
</html>
