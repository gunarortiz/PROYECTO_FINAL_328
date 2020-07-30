<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <script></script>
    <style>

        body {
            margin: 0;
            padding: 0;
            background-image: url("img/body.png");
            width: 100%;
            height: 100vh;
            background-position: center;
        }

    </style>
</head>
<body>
    <div class="wrapper fadeInDown "  >
        <div id="formContent" style="box-shadow: 15px 15px 80px #b2bec3; border:1px solid">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/folder.jpg" style="width: 180px" id="icon" alt="User Icon"/>
                <h3>Gestor de Archivos</h3>
            </div>

            <!-- Login Form -->
            <form method="post" id="frmLogin" onsubmit="return logear()"autocomplete="off">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>

            <!-- Remind Passowrd -->

        </div>
    </div>
    <script src="librerias/jquery-3.4.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script type="text/javascript">
        function logear() {
            if ($('#login').val() == "" || $('#password').val() == ""){
                swal(":(","Debes agregar Todos los campos","error");
                $("#frmLogin")[0].reset(); //con esto reseteamos el formulario
                return false;
            }else if ($('#login').val() == 0 || $('#password').val() == 0){
                swal(":(","Debes agregar Todos los campos","error");
                $("#frmLogin")[0].reset(); //con esto reseteamos el formulario
                return false;
            }
            $.ajax({
                type:"POST",
                data:$('#frmLogin').serialize(),
                url:"procesos/usuario/login/login.php",
                success:function (respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1){
                        swal(":)","Conexion exitosa Muchas gracias !","success");
                        window.location = "vistas/inicio.php";
                    }else{
                        swal("ERROR :(","Usuario o Contraseña Invalida !","error");
                        $("#frmLogin")[0].reset(); //con esto reseteamos el formulario
                    }
                }
            });
            return false;
        }
    </script>
</body>
</html>

