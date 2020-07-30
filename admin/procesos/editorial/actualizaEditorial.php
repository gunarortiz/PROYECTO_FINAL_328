<?php
    require_once "../../clases/Editorial.php";
    $Editorial = new Editorial();

    $datos = array(
        "idEditorial" =>$_POST['idEditorial'],
        "editorial" => $_POST['editorialU'],
        "localidad" => $_POST['localidadU'],
        "telefono" => $_POST['telefonoU'],
        "descripcion" => $_POST['descripcionU']
    );
    echo $Editorial->actualizarEditorial($datos);