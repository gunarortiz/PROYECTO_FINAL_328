<?php

require_once "../../clases/Temas.php";
$Temas = new Temas();

echo json_encode($Temas->obtnerTemas($_POST['idTemas']));
