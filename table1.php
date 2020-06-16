<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>table</title>
</head>

<body>
  <?php

  $db = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

  $query = 'SELECT
  movie_name, movie_year, movie_director, movie_leadactor, movie_type
  FROM
    movie
  ORDER BY
    movie_name ASC,
    movie_year DESC';

  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  $num_movies = mysqli_num_rows($result);

  function get_fullname($id) {
    global $db;
    $query = 'SELECT
      people_fullname
      FROM
        people
      WHERE
        people_id =' . $id;

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $people_fullname;
  }

  function get_movietype($type_id) {
    global $db;
    $query = 'SELECT
      movietype_label
    FROM
      movietype
    WHERE
      movietype_id = ' . $type_id;
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $movietype_label;
  }

  ?>

  <div style="text-align: center;">
    <table cellpadding="2" border="1" cellspacing="2" style="margin: 0 auto;">
      <tr>
        <th>Movie Title</th>
        <th>Year of release</th>
        <th>Movie Director</th>
        <th>Movie LeadActor</th>
        <th>Movie Type</th>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $director = get_fullname($movie_director);
        $leadactor = get_fullname($movie_leadactor);
        $movietype = get_movietype($movie_type);
        $table .= <<<ENDHTML
        <tr>
          <td>$movie_name</td>
          <td>$movie_year</td>
          <td>$director</td>
          <td>$leadactor</td>
          <td>$movietype</td>
        </tr>
        ENDHTML;
      }
      echo $table;
      ?>
    </table>
    <p><?php echo $num_movies; ?></p>
  </div>
  <pre>

  </pre>
</body>

</html>
