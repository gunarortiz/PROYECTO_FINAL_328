<?php

require_once "../../clases/Gestor.php";
$Gestor = new Gestor();

echo json_encode($Gestor->obtnerDatosArchivos($_POST['idArchivo']));


