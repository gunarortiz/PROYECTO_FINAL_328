<?php
    require_once "../../clases/Autor.php";
    $Autor = new Autor();

    $datos = array(
        "idAutor" =>$_POST['idAutor'],
        "autor" => $_POST['autorU'],
        "localidad" => $_POST['localidadU'],
        "telefono" => $_POST['telefonoU'],
        "profecion" => $_POST['profecionU']
    );
    echo $Autor->actualizarAutor($datos);