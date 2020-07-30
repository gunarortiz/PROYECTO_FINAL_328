<?php
session_start();
require_once "../../clases/Editorial.php";
$Editorial = new Editorial();

echo $Editorial->eliminarEditorial($_POST['idEditorial']);

