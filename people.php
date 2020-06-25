<?php

$db = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
$action = 'no action';
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
  $action = 'edit';
}
if (isset($_GET['action']) && $_GET['action'] == 'add') {
  $action = 'add';
}

echo empty($_GET['action']);

switch ($action) {
  case 'edit':
    $query = 'SELECT * FROM people WHERE people_id=' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    extract($row);
  break;
  case 'add':
    $people_fullname = '';
    $people_isactor = 0;
    $people_isdirector = 0;
  break;
}
echo '<pre>';
var_dump($row);
echo '</pre>';
echo '<pre> post';
var_dump($_POST);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
</head>

<body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people" method="post">

    <input type="hidden" name="people_id" value="<?php echo $people_id; ?>" />
    <table>
      <tr>
        <td>people_fullname</td>
        <td>
          <input type="text" name="people_fullname" value="<?php echo $people_fullname; ?>">
        </td>
      </tr>
      <tr>
        <td>people_isactor</td>
        <td>
          <input type="radio" name="people_isactor" value="1" <?php echo ($people_isactor == '1') ?  'checked="checked"' : "" ?>>是
          <input type="radio" name="people_isactor" value="0" <?php echo ($people_isactor == '0') ?  'checked="checked"' : "" ?>>否
        </td>
      </tr>
      <tr>
        <td>people_isdirector</td>
        <td>
          <input type="radio" name="people_isdirector" value="1" <?php echo ($people_isdirector == '1') ?  'checked="checked"' : "" ?>>是
          <input type="radio" name="people_isdirector" value="0" <?php echo ($people_isdirector == '0') ?  'checked="checked"' : "" ?>>否
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
        </td>
      </tr>
    </table>
  </form>

</body>

</html>
