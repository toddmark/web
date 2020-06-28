
<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
$dir = './images';

if ($_FILES['uploadfile']['error'] != UPLOAD_ERR_OK) {
  switch ($_FILES['uploadfile']['error']) {
    case UPLOAD_ERR_INI_SIZE:
      die('file size exceeds in php ini');
      break;
    case UPLOAD_ERR_FORM_SIZE:
      die('file size exceeds in form');
      break;
    case UPLOAD_ERR_PARTIAL:
      die('The upload file was only partially upload');
      break;
    case UPLOAD_ERR_NO_FILE:
      die('No file was upload');
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
      die('server is missing a temporary folder');
    break;
    case UPLOAD_ERR_CANT_WRITE:
      die('failed to wirte the upload file to dis');
    break;
    case UPLOAD_ERR_EXTENSION:
      die('file upload stopped by extension');
    break;
  }
}

$image_caption = $_POST['caption'];
$image_username = $_POST['username'];
$image_date = date("Y-m-d");
echo '<pre>';
var_dump($_FILES['uploadfile']);
echo '</pre>';
list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
var_dump($type);
switch($type) {
  case IMAGETYPE_GIF:
    $image = imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('.gif not supported');
    $ext = '.gif';
  break;
  case IMAGETYPE_JPEG:
    $image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']) or die('.jpg not supported');
    $ext = '.jpg';
  break;
  case IMAGETYPE_PNG:
    $image = imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('.png not supported');
    $ext = '.png';
  break;
  default:
    die('other filetype error');
}

$query = 'INSERT INTO image (image_caption, image_username, image_date) VALUES (
  "' . $image_caption .'","' .$image_username . '","' . $image_date . '")';

$result = mysqli_query($db, $query) or die(mysqli_error($db));
$last_id = mysqli_insert_id($db);
$imagename = $last_id . $ext;

$query = 'UPDATE image SET image_filename ="' .$imagename .'" WHERE image_id=' . $last_id;
$result = mysqli_query($db, $query) or die(mysqli_error($db));

switch($type) {
  case IMAGETYPE_GIF:
    imagegif($image, $dir .'/' . $imagename);
  break;
  case IMAGETYPE_JPEG:
    imagejpeg($image, $dir .'/' . $imagename);
  break;
  case IMAGETYPE_PNG:
    imagepng($image, $dir .'/' . $imagename);
  break;
}
var_dump($dir .'/' . $imagename);
var_dump($image);
imagedestroy($image);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>your pic!</title>
</head>
<body>
  <h1>So how does it feel to be famous?</h1>
  <p>Here is the pic you just uploaded to our servers:</p>
  <img src="images/<?php echo $imagename; ?>" alt="" style="float: left;">
  <table>
    <tr>
      <td>Image saved as:</td>
      <td><?php
        echo $imagename;
      ?></td>
    </tr>
    <tr>
      <td>Image saved as:</td>
      <td><?php
        echo $ext;
      ?></td>
    </tr>
    <tr>
      <td>Height:</td>
      <td><?php
        echo $height;
      ?></td>
    </tr>
    <tr>
      <td>Width:</td>
      <td><?php
        echo $width;
      ?></td>
    </tr>
    <tr>
      <td>Upload Date:</td>
      <td><?php
        echo $image_date;
      ?></td>
    </tr>
  </table>
</body>
</html>
