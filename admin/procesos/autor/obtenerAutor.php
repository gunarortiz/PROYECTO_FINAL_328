<?php

require_once "../../clases/Autor.php";
$Autor = new Autor();

echo json_encode($Autor->obtnerAutor($_POST['idAutor']));
