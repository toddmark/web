<?php
$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// change this path to match your images directory
$dir = './images';

// change this path to match your thumbnail directory
$thumbdir = './thumbs';

//change this path to match your fonts directory and the desired font
putenv('GDFONTPATH=' . 'C:/Windows/Fonts');
$font = 'Arial';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

// handle the upload images
if ($_POST['submit'] == 'Upload') {
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
  $image_date = date("Y-m-d H:i:s");
  var_dump($image_date);
  list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);

  switch ($type) {
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
  "' . $image_caption . '","' . $image_username . '","' . $image_date . '")';

  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  $last_id = mysqli_insert_id($db);
  // $imagename = $last_id . $ext;

  // $query = 'UPDATE image SET image_filename ="' .$imagename .'" WHERE image_id=' . $last_id;
  // $result = mysqli_query($db, $query) or die(mysqli_error($db));

  // switch($type) {
  //   case IMAGETYPE_GIF:
  //     imagegif($image, $dir .'/' . $imagename);
  //   break;
  //   case IMAGETYPE_JPEG:
  //     imagejpeg($image, $dir .'/' . $imagename);
  //   break;
  //   case IMAGETYPE_PNG:
  //     imagepng($image, $dir .'/' . $imagename);
  //   break;
  // }
  // $imagename = $last_id . '.jpg';
  $image_id = $last_id;

  imagejpeg($image, $dir . '/' . $image_id . '.jpg');

  //set the dimensions for the thumbnail
  $thumb_width = $width * 0.1;
  $thumb_height = $height * 0.1;

  //create the thumbnail
  $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
  imagecopyresampled($thumb, $image, 0,0,0,0,$thumb_width,$thumb_height, $width, $height);
  imagejpeg($thumb, $thumbdir . '/' . $image_id .'.jpg', 100);
  imagedestroy($thumb);

  imagedestroy($image);
} else {
  $query = 'SELECT image_id, image_caption, image_username, image_date FROM image WHERE image_id=' . $_POST['id'];
  $result = mysqli_query($db, $query);
  extract(mysqli_fetch_assoc($result));

  list($width, $height, $type, $attr) = getimagesize($dir . '/' . $image_id . '.jpg');
}

if ($_POST['submit'] == 'Save') {
  if (isset($_POST['id']) && ctype_digit($_POST['id']) && file_exists($dir . '/' . $_POST['id'] . '.jpg')) {
    $image = imagecreatefromjpeg($dir . '/' . $_POST['id'] . '.jpg');
  } else {
    die('invalid image');
  }

  // apply the filter
  $effect = (isset($_POST['effect']) ? $_POST['effect'] : -1);
  switch ($effect) {
    case IMG_FILTER_NEGATE:
      imagefilter($image, IMG_FILTER_NEGATE);
      break;
    case IMG_FILTER_GRAYSCALE:
      imagefilter($image, IMG_FILTER_GRAYSCALE);
      break;
    case IMG_FILTER_EMBOSS:
      imagefilter($image, IMG_FILTER_EMBOSS);
      break;
    case IMG_FILTER_GAUSSIAN_BLUR:
      imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
      break;
  }


  // add the caption if requested
  if (isset($_POST['emb_caption'])) {
    imagettftext($image, 12, 0, 20, 20, 0, $font, $image_caption);
  }

  // add the logo watermark if requested
  if(isset($_POST['emb_logo'])) {
    // determine x and y position to center watermark
    list($wmk_width, $wmk_height) = getimagesize('./images/logo.png');
    $x = ($width - $wmk_width) / 2;
    $y = ($height - $wmk_height) / 2;

    $wmk = imagecreatefrompng('./images/logo.png');
    imagecopymerge($image, $wmk, $x, $y, 0, 0, $wmk_width, $wmk_height, 20);
    imagedestroy($wmk);
  }


  imagejpeg($image, $dir . '/' . $_POST['id'] . '.jpg', 100);
  imagedestroy($image);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Here is your pic!</title>
  </head>

  <body>
    <h1>Your image has been saved!</h1>
    <img src="./images/<?php echo $_POST['id']; ?>.jpg" alt="">
  </body>

  </html>
<?php
} else {
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
    <!-- <img src="images/<?php echo $imagename; ?>" alt="" style="float: left;"> -->
    <?php
    if ($_POST['submit'] == 'Upload') {
      $imagename = './images/' . $image_id . '.jpg';
    } else {
      $imagename  = './image_effect.php?id=' . $image_id . '&e=' . $_POST['effect'];
      if(isset($_POST['emb_caption'])) {
        $imagename .= '&capt=' . urlencode($image_caption);
      }
      if(isset($_POST['emb_logo'])) {
        $imagename .= '&logo=1';
      }
    }
    ?>
    <img style="width: 300px; float: left;" src="<?php echo $imagename; ?>" alt="">
    <table>
      <!-- <tr>
        <td>Image saved as:</td>
        <td><?php
            echo $imagename;
            ?></td>
      </tr> -->
      <!-- <tr>
      <td>Image saved as:</td>
      <td><?php
          echo $ext;
          ?></td>
    </tr> -->
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
    <p>apply special options to your image</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div>
        <input type="hidden" name="id" value="<?php echo $image_id; ?>">
        Filter: <select name="effect">
          <option value="-1">None</option>
          <?php
          echo '<option value="' . IMG_FILTER_GRAYSCALE . '"';
          if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_GRAYSCALE) {
            echo ' selected="selected"';
          }
          echo '>Black and White</option>';

          echo '<option value="' . IMG_FILTER_GAUSSIAN_BLUR . '"';
          if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_GAUSSIAN_BLUR) {
            echo ' selected="selected"';
          }
          echo '>Blur</option>';

          echo '<option value="' . IMG_FILTER_EMBOSS . '"';
          if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_EMBOSS) {
            echo ' selected="selected"';
          }
          echo '>Emboss</option>';

          echo '<option value="' . IMG_FILTER_NEGATE . '"';
          if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_NEGATE) {
            echo ' selected="selected"';
          }
          echo '>Negative</option>';
          ?>
        </select>
        <?php
          echo '<input type="checkbox" name="emb_caption"';
          if (isset($_POST['emb_caption'])) {
            echo ' checked="checked"';
          }
          echo '>Embed caption in image?';
          echo '<br/><br/><input type="checkbox" name="emb_logo"';
          if(isset($_POST['emb_logo'])) {
            echo ' checked="checked"';
          }
          echo '>Embed watermarked logo in image?';
        ?>
        <input type="submit" value="Preview" name="submit">
        <br />
        <input type="submit" value="Save" name="submit">
      </div>
    </form>
  </body>

  </html>
<?php
}
?>
