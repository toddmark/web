<?php
if ($_POST['submit'] == 'Add') {
  if ($_POST['type'] == 'movei' && $_POST['movie_type'] == '') {
    header('Location: form4.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multipurpose form</title>
  <title><?php echo $_POST['submit'] . ' ' . $_POST['type'] .': ' . $_POST['name']; ?></title>
</head>
<body>
  <?php
    if ($_POST['submit'] == 'Add') {
      echo '<h1>Add ' . ucfirst($_POST['type']) . '</h1>';
  ?>

  <form action="./form4b.php" method="post">
    <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>">
    <table>
      <tr>
        <td>Name</td>
        <td><?php echo $_POST['name']; ?>
          <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
        </td>
      </tr>
      <?php if($_POST['type'] == 'movie') { ?>
      <tr>
        <td>Movie Type</td>
        <td><?php echo $_POST['movie_type']; ?>
          <input type="hidden" name="movie_type" value="<?php echo $_POST['movie_type']; ?>">
        </td>
      </tr>
      <tr>
        <td>Year</td>
        <td>
          <input type="text" name="year" id="">
        </td>
      </tr>
      <tr>
        <td>Movie Description</td>
      <?php
        } else {
          echo '<tr><td>Biography</td>';
        }
      ?>
        <td><textarea name="extra" id="" cols="60" rows="3"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center;">
        <?php
          if (isset($_POST['debug'])) {
            echo '<input type="hidden" name="debug" value="on" />';
          }
        ?>
          <input type="submit" value="Add">
        </td>
      </tr>
    </table>
  </form>
  <?php
    } else if($_POST['submit'] == 'Search') {
      echo '<h1> Search for ' . ucfirst($_POST['type']) . '</h1>';
      echo '<p>Searching for ' . $_POST['name'] . '... </p>';
    }

  if (isset($_POST['debug'])) {
    echo '<pre><strong>DEBUG:</strong>' . '<br/>';
    print_r($_POST);
    echo '</pre>';
  }

  ?>

</body>
</html>
