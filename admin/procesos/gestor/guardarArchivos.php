<?php
session_start();
require_once "../../clases/Gestor.php";
$Gestor = new Gestor();

$idUsuario = $_SESSION['idUsuario'];
$idCategoria =$_POST['categoriasArchivos'];
$idAutor =$_POST['autoresArchivos'];
$idEditorial =$_POST['editorialArchivos'];
$idTemas =$_POST['temasArchivos'];
$titulo = $_POST['titulo'];
$edicion = $_POST['edicion'];
$paginas = $_POST['paginas'];
$descripcion = $_POST['descripcion'];


if ($_FILES['archivos']['size'] > 0){
    $carpetaUsurio = '../../archivos/'.$idUsuario;
    if (!file_exists($carpetaUsurio)){
        mkdir($carpetaUsurio,0777,true);
    }

    $totalArchivos = count($_FILES['archivos']['name']);

    for ($i=0;$i < $totalArchivos;$i++){
        $nombreArchivo = $_FILES['archivos']['name'][$i];
        $explode = explode('.',$nombreArchivo);
        $tipoArchivo = array_pop($explode);

        $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];

        $rutaFinal = $carpetaUsurio . "/" . $nombreArchivo;

        $datosRegistroArchivo = array(
            "idUsuario" => $idUsuario,
            "idCategoria" =>$idCategoria,
            "idAutor"    =>$idAutor,
            "idEditorial"    =>$idEditorial,
            "idTemas"    =>$idTemas,
            "titulo"    =>$titulo,
            "edicion"    =>$edicion,
            "paginas"    =>$paginas,
            "descripcion"    =>$descripcion,
            "nombreArchivo" => $nombreArchivo,
            "tipo" =>$tipoArchivo,
            "ruta" =>$rutaFinal
        );

        if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
            $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
        }

    }
    echo $respuesta;
}else{
    echo 0;
}

