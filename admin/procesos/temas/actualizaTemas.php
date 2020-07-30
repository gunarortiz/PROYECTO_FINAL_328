<?php
    require_once "../../clases/Temas.php";
    $Temas = new Temas();

    $datos = array(
        "idTemas" =>$_POST['idTemas'],
        "temas" => $_POST['temasU'],
        "descripcion" => $_POST['descripcionU']
    );
    echo $Temas->actualizarTemas($datos);