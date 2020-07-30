<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-home"></i>  INICIO </h1>
                <p>Este es un sistema para que pueda guardar sus libros en una biblioteca virtual  </p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
            </ul>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Usuarios</h4>
                        <p><b>5</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Categorias</h4>
                        <p><b>25</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>Autor</h4>
                        <p><b>10</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>Libros</h4>
                        <p><b>500</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Libros</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Autores</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
}else{
    header("location:../index.php");
}
?>