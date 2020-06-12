<?php
session_start();
if ($_SESSION['authuser'] != 1) {
  echo 'sorry';
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Movie site -- <?php echo $_GET['favmovie']; ?>
    <?php
    if (isset($_GET['favmovie'])) {
      echo ' - ' . $_GET['favmovie'];
    }
    ?>
  </title>
</head>

<body>
  <?php
    include 'header.php';
    $favmovies = array(
      'life of brain',
      'stripes',
      'Office Space',
      'Matrix',
      'The holy Grail',
      'Terminator',
      'Star Trek IV',
      'Close',
      'Sixteen',
      'Caddy'
    );

  ?>
    Fav movie is:
  <?php
    if (isset($_GET['favmovie'])) {
      echo 'welcome ' . $_SESSION['username'] . '! <br/>' . 'my fav movie is ' . $_GET['favmovie'];
      $movierate = 5;
      echo '<br/>'. 'my move rating is' . $movierate;
    } else {
      echo 'my top ' . $_POST['num'] . ' movies. ' . '<br/>';
      if (isset($_POST['sorted'])) {
        sort($favmovies);
        echo 'sorted';
      }
      $numlist = 0;
      echo '<ol>';
      while($numlist < $_POST['num']) {
        echo '<li>'. $favmovies[$numlist] . '</li>';
        $numlist += 1;
      }
      echo '</ol>';
    }
    $value = <<<AC
    thisasdf asfdasfsdfsdf" '" *(^&()&)(6asdf
    AC;
    print($value);
    ?>
</body>
</html>
