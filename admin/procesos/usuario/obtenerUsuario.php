<?php

require_once "../../clases/Usuario.php";
$Usuario = new Usuario();

echo json_encode($Usuario->obtnerUsuario($_POST['idUsuario']));
