<?php
$dir = './images';

//change this path to match your fonts directory and the desired font
putenv('GDFONTPATH=' . 'C:/Windows/Fonts');
$font = 'Arial';

if (isset($_GET['id']) && ctype_digit($_GET['id']) && file_exists($dir . '/' . $_GET['id'] . '.jpg')) {
  $image = imagecreatefromjpeg($dir . '/' . $_GET['id'] . '.jpg');
} else {
  dir('invalid');
}

// apply the filter
$effect = isset($_GET['e']) ? $_GET['e'] : -1;
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
    for ($x = 1; $x <= 100/2; $x++) {
      imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR, 999);
    }
    break;
}

//add the caption if requested
if (isset($_GET['capt'])) {
  imagettftext($image, 24, 0 ,20, 40, 17, $font, $_GET['capt']);
}

// var_dump($image);
// show the image
header('Content-Type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
