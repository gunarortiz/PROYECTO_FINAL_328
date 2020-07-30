<?php
session_start();
require_once "../../clases/Autor.php";
$Autor = new Autor();

echo $Autor->eliminarAutores($_POST['idAutor']);

