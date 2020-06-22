
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Greetings Earthling</title>
</head>
<body>
  <form action="formprocess3.php" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" id=""></td>
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
        <td>Item type</td>
        <td>
          <input type="radio" name="type" value="movie" checked="checked"  value="movie"/>
          <input type="radio" name="type" value="actor">
          <input type="radio" name="type" value="director">
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
