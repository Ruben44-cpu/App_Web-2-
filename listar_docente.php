<!DOCTYPE html>
<html lang="en" class="h-100" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Docente</title>
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
    include 'db.php';
    $conexiondb = conectardb();
    $query = "SELECT docente.id, docente.apellido, docente.nombre, docente.cedula, docente.fecha_nacimiento, docente.profesion, 
    materia.nombre_m  FROM docente JOIN materia
    ON materia.id_m = docente.materia_id";
    $resultado = mysqli_query($conexiondb, $query);
    mysqli_close($conexiondb);
    ?>
    
    <div style="text-align:center;">
        <h2>Listado de Docentes</h2>
        <br>
        <table border="1" style="margin: 0 auto;">
            <tr>
                <td class="los">Nombre</td>
                <td class="los">Apellido</td>
                <td class= "los">Cedula</td>
                <td class= "los">Fecha_Nacimento</td>
                <td class="los">Profesion</td>
                <td class="los">Materia</td>
                <td class="los"></td>
                <td class="los"></td>
            </tr>
            <?php
            
            while ($docente = mysqli_fetch_assoc($resultado)) {
            echo ("<tr>");
            echo "<td>"  . $docente['nombre'] . "</td><td>" . $docente['apellido'] . "</td><td>" . $docente['cedula'] . "</td><td>" . $docente['fecha_nacimiento'] . "</td><td>" . $docente['profesion'] . "</td><td>" . $docente['nombre_m'] .  "</td><td> <a href='./editar_docente.php?cedula=" . $docente['cedula'] . "'>EDITAR</a>
            " . "</td><td>  <a href='./eliminar_docente.php?cedula=" . $docente['cedula'] . "'>ELIMINAR</a></td>";
            }
            ?>
          
        </table>
    </div>
    
  
  <link rel="stylesheet" href="./css/apariencia/cover.css">
</body>

</html>