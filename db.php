<?php
    function conectardb() {
        $servidor = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $docentedb = 'app_web';

        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $docentedb);

        return $conexion;
    }
?>