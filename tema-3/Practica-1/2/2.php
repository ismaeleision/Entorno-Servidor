<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <form action="intermedio.php" method="post">
    <table class="table align-text-top">
      <tr>
        <td>
          <input type="checkbox" name="musica" value="musica">
          <label for="musica">Me gusta la musica</label>
        </td>
      </tr>

      <tr>
        <td>
          <input type="checkbox" name="deportes" value="deportes">
          <label for="deportes">Me flipan los deportes</label>
        </td>
      </tr>

      <tr>
        <td>
          <input type="checkbox" name="anime" value="anime">
          <label for="anime">Soy otakon</label>
        </td>
      </tr>

      <tr>
        <td>
          <input type="checkbox" name="animales" value="animales">
          <label for="animales">Me gustan los animales</label>
        </td>
      </tr>

      <tr>
        <td>
          <input type="submit" value="Enviar">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>