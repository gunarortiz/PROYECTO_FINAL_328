<?php

require_once "../../clases/Editorial.php";
$Editorial = new Editorial();

echo json_encode($Editorial->obtnerEditorial($_POST['idEditorial']));
