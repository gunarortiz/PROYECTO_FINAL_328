<?php
session_start();
require_once "../../clases/Temas.php";
$Temas = new Temas();

echo $Temas->eliminarTemas($_POST['idTemas']);

