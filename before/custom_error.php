<?php
  function my_error_handler($e_type, $e_message, $e_file, $e_line) {
    switch ($e_type) {
      case E_ERROR:
        echo 'error';
      break;
      case E_WARNING:
        echo 'waring' . '<h4>' .$e_message .'</h4>' .'<h5>'. $e_file . '</h5>' .'<h6>' . $e_line .'</h6>';
      break;
      case E_NOTICE:
        echo 'notice';
      break;
    }

  }
    set_error_handler('my_error_handler');

    str_replace('wox', 'wss');
    $text = "The quick brown fox jumped over the lazy dog.";
$newtext = wordwrap($text, 1, "<br />\n");
echo $newtext;
