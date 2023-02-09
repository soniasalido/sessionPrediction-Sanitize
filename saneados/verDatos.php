<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
    session_start();
    include 'compruebaSesion.php';
    include 'compruebaToken.php';


    if ($verificado) {
        echo "<h1>Token verificado se muestran los datos de usuario</h1>";
        include 'mostrarDatosUsuario.php';

    }else{
        echo "<script>alert('ERROOOR. TOKEN NO SE PUEDE CAMBIAR')</script>";
        echo "<script>window.location='bloquearUsuario.php'</script>";
    }

    echo "<hr>";

?>
    <br>
    <a href='menu.php'><button>Volver al menú</button></a>
    <a href='cambiarPassword.php'><button>Cambiar Password</button></a>
    <a href='cambiarToken.php'><button>Cambiar Token</button></a>
    <a href='fin.php'><button>Cerrar sesión</button></a>

</body>
</html>
