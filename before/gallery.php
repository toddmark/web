<?php
  $db = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  $thumbdir = './thumbs';

  $query = 'SELECT * from image ORDER BY image_date DESC';
  $result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
</head>
<body>
<table>
<?php
  while($row = mysqli_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td><img src="'.$thumbdir . '/' .$image_id . '.jpg"/></td> <td>'.$image_caption.'</td> <td>'
    .$image_username .'</td> <td>'.$image_date.'</td>';
    echo '</tr>';
  }
?>
</table>

</body>
</html>
