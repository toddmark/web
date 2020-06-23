<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multipurpose Form</title>
</head>
<body>
  <form action="form4a.php" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" id=""></td>
      </tr>
      <tr>
        <td>Item type</td>
        <td>
        <label for="movie">
          <input id="movie" type="radio" name="type" value="movie" checked="checked"  value="movie"/> Movie
        </label>
        <label for="actor">
          <input id="actor" type="radio" name="type" value="actor"> Actor
        </label>
        <label for="director">
          <input id="director" type="radio" name="type" value="director"> Director
        </label>
        </td>
      </tr>
      <tr>
        <td>Movie Type</td>
        <td>
          <select name="movie_type">
            <option value="">Select a movie type</option>
            <option value="Action">Action</option>
            <option value="Drama">Drama</option>
            <option value="Comedy">Comedy</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="War">War</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="checkbox" name="debug" checked="checked" />
          Display Debug info
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center;">
          <input type="submit" name="submit" value="Search" />
          <input type="submit" name="submit" value="Add" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
