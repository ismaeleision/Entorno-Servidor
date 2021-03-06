<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <h3>Incidencias</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Latitud</th>
          <th>Longitud</th>
          <th>Ciudad</th>
          <th>Direccion</th>
          <th>Etiqueta</th>
          <th>Descripcion</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($incidencias as $inc)
        <tr>
          <td>{{ $inc->latitud }}</td>
          <td>{{ $inc->longitud }}</td>
          <td>{{ $inc->ciudad }}</td>
          <td>{{ $inc->direccion }}</td>
          <td>{{ $inc->etiqueta }}</td>
          <td>{{ $inc->descripcion }}</td>
          <td>{{ $inc->estado }}</td>
          <td><a href="/incidencias/{{ $inc->id }}">X</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>