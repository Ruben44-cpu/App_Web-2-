<!DOCTYPE html>
<html lang="en" class="h-100" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Datos</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>

<!-- Custom styles for this template -->
<link href="cover.css" rel="stylesheet">
</head>
  <body>
  <br>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Universidad Cátolica</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="./index.php">Registro</a>
          <a class="nav-link fw-bold py-1 px-0" href="./listar_docente.php">Listado</a>
          <a class="nav-link fw-bold py-1 px-0" href="./reporte_docente.php">Reporte</a>
        
        </nav>
    </div>
    </header>
    
</head>


<body>
    <?php
      require 'db.php';

      $cedula = $_GET['cedula'];
      
      $conexiondb = conectardb();

      $query = "DELETE FROM docente WHERE cedula=".$cedula;

      $respuesta = mysqli_query($conexiondb, $query);

      if ($respuesta) {
          echo("Se borraron los datos del docente");
          echo("<br>");
          echo("<a href='./listar_docente.php'>Listado de Personas</a>");
      } else {
          echo("Error: no se puede borrar el docente");
          echo("<br>");
          echo("<a href='./listar_docente.php'>Listado de Personas</a>");
      }
    ?>
</div>
<link rel="stylesheet" href="./css/apariencia/cover.css">
</body>
</html>