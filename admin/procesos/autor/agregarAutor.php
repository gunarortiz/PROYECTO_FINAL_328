<?php
session_start();
require_once "../../clases/Autor.php";
$Autor = new Autor();
$datos = array(
    "idUsuario" => $_SESSION['idUsuario'],
    "autor" => $_POST['autor'],
    "localidad" => $_POST['localidad'],
    "telefono" => $_POST['telefono'],
    "profecion" => $_POST['profecion']
);
echo $Autor->agregarAutor($datos);
?>