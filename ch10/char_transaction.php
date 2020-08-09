<?php
  require 'db.inc.php';

  $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die("X_X");
  mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));

  switch ($_POST['action']) {
    case 'Add Character':
      // escape incoming values to protect database
      $alias = mysqli_real_escape_string($db, $_POST['alias']);
      $real_name = mysqli_real_escape_string($db, $_POST['real_name']);
      $address = mysqli_real_escape_string($db, $_POST['address']);
      $city = mysqli_real_escape_string($db, $_POST['city']);
      $state = mysqli_real_escape_string($db, $_POST['state']);
      $zipcode_id = mysqli_real_escape_string($db, $_POST['zipcode_id']);
      $alignment = mysqli_real_escape_string($db, $_POST['alignment']);

      // add character information into database tables
      $query = 'INSERT IGNORE INTO comic_zipcode
        (zipcode_id, city, state)
      VALUES
        ("' . $zipcode_id . '", "' . $city . '", "' . $state . '")';
      mysqli_query($db, $query) or die(mysqli_error($db));

      $query = 'INSERT INTO comic_lair
        (lair_id, zipcode_id, address)
      VALUES
        (NULL, "' . $zipcode_id .'","' . $address . '")';
      mysqli_query($db, $query) or die(mysqli_error($db));

      // retrieve new lair_id generated by MySQL
      $lair_id = mysqli_insert_id($db);
      $query = 'INSERT INTO comic_character
        (character_id, alias, real_name, lair_id, alignment)
      VALUES
        (NULL, "'. $alias .'","' . $real_name . '",' .$lair_id . ',"'
        . $alignment . '")';
      mysqli_query($db, $query) or die(mysqli_error($db));

      // retrieve new character_id generated by MySQL
      $character_id = mysqli_insert_id($db);
      if(!empty($_POST['powers'])) {
        $values = array();
        foreach ($_POST['powers'] as $power_id) {
          $values[] = sprintf('(%d, %d)', $character_id, $power_id);
        }

        $query = 'INSERT IGNORE INTO comic_character_power
            (character_id, power_id)
          VALUES ' .
            implode(',',$values);
        mysqli_query($db, $query) or die(mysqli_error($db));
      }
      if(!empty($_POST['rivalries'])) {
        $values = array();
        foreach ($_POST['rivalries'] as $rival_id) {
          $values[] = sprintf('(%d, %d)', $character_id, $rival_id);
        }

        // aligment will affect column order
        $columns = ($alignment = 'good') ? '(hero_id, villain_id)' : '(villain_id, hero_id)';
        $query = 'INSERT IGNORE INTO comic_rivalry' . $columns . '
          VALUES
            ' . implode(',', $values);
        mysqli_query($db, $query) or die(mysqli_error($db));
      }
      $redirect = 'list_characters.php';
    break;

    case 'Delete Character':
      // make sure character_id is a number just to be safe
    break;
  }
