
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Biblioteca Publica</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="../librerias/dataTable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="inicio.php">Pedro Poveda</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">Este Grupo es de 3 Integrantes</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mamani Chambi Idven Edwin </p>
                                <p class="app-notification__meta">8262558 L.P</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Vargas Nina Carlos</p>
                                <p class="app-notification__meta">9125276</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Ortiz Gunar</p>
                                <p class="app-notification__meta">9895242</p>
                            </div></a></li>

                </div>
                <li class="app-notification__footer"><a href="#">Materia INF - 328</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="../procesos/usuario/salir.php"><i class="fa fa-sign-out fa-lg" style="color: red"></i> Salir</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../img/folder.jpg" width="130px" alt="User Image" style="display: -moz-box;margin: auto" >
    </div>
    <div>
        <p class="app-sidebar__user-name text-center" style="color: white" ><?php echo $_SESSION['nombre'];?></p>
        <p class="app-sidebar__user-designation text-center" style="color: white"><?php echo $_SESSION['rol'];?></p>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="inicio.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio </span></a></li>
        <?php if ($_SESSION['rol'] == 1)
        {?>
            <li><a class="app-menu__item" href="usuarios.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Usuarios</span></a></li>
        <li><a class="app-menu__item" href="categorias.php"><i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Categorias</span></a></li>
        <li><a class="app-menu__item" href="autor.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Autores</span></a></li>
        <li><a class="app-menu__item" href="editorial.php"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Editorial</span></a></li>
        <li><a class="app-menu__item" href="temas.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Temas</span></a></li>
        <?php
        }?>
        <li><a class="app-menu__item" href="gestor.php"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Libros</span></a></li>




    </ul>
</aside>
