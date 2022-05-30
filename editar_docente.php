<!DOCTYPE html>
<html lang="en" class="h-100" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Docente</title>
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
    include 'db.php';
    $cedula = $_GET['cedula'];
    $conexiondb = conectardb();
    $query = "SELECT  docente.id, docente.cedula,  docente.nombre, docente.apellido, docente.fecha_nacimiento, docente.profesion, docente.materia_id, 
    materia.nombre_m AS materia_nombre, materia.id_m  FROM docente JOIN materia 
    ON materia.id_m =  docente.materia_id WHERE docente.cedula =" . $cedula;
    $respuesta = mysqli_query($conexiondb, $query);
    $docente = mysqli_fetch_row($respuesta);
    mysqli_close($conexiondb);
    ?>

    <?php
    $conexiondb = conectardb();
    $query = "SELECT * FROM materia ORDER BY nombre_m ASC";
    $resultado = mysqli_query($conexiondb, $query);
    mysqli_close($conexiondb);
    ?>


    <h1 id="titulo_principal" class="text-center">Editar Docente</h1>
    <div class="col-sm-4 offset-sm-4">
    <br>
        <form action="guardar_docente.php" method="post">
            <!--<input type="hidden" name="">-->


            <div class="mb-3">
                <th><b><label for="">Cedula:</label></b></th>
                <th><input class="form-control" type="text" name="cedula" id="" value='<?php echo $docente[1]; ?>' readonly></th>
            </div>

            <div class="mb-3">
                <th><b><label for="">Nombre:</label></b></th>
                <th><input class="form-control" type="text" name="nombre" id="" value='<?php echo $docente[2]; ?>'></th>
            </div>

            <div class="mb-3">
                <th><b><label for="">Apellido:</label></b></th>
                <th><input class="form-control" type="text" name="apellido" id="" value='<?php echo $docente[3]; ?>'></th>
            </div>

            <div class="mb-3">
                <th><b><label for="">Fecha_Nacimiento</label></b></th>
                <th><input class="form-control" type="text" name="fecha_nacimiento" id="" value='<?php  echo $docente[4]; ?>'></th>
            </div>

            <div class="mb-3">
                <th><b><label for="">Profesion:</label></b></th>
                <th><input class="form-control" type="text" name="profesion" id=""value='<?php if (is_array($docente)) {
                                                                            echo $docente[5];
                                                                        } ?>'></th> 
            </div>
            <div class="mb-3">
            <th><label for="">Materia:</label></th>
            <th>
                <select name="materia_id" class=" form-control" id="inputGroupSelect01">
                    <?php
                    while ($materia = mysqli_fetch_assoc($resultado)) {
                        if ($materia['id_m'] == $docente[6]) {
                            echo "<option selected value='" . $materia['id_m'] . "'>" . $materia['nombre_m'] . "</option>";
                        } else {
                            echo "<option value='" . $materia['id_m'] . "'>" . $materia['nombre_m'] . "</option>";
                        };
                    }
                    ?>
                </select>
            </th>              
                  <input type="hidden" name="editar" id="" value='si' readonly>
                  <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
        </form>
      </div>
   
    <link rel="stylesheet" href="./css/apariencia/cover.css">
</body>

</html>