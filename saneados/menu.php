<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

    session_start();
    $_SERVER;
    function comprobarSession(){
        if (isset($_SESSION['user'])) {
            echo "<h1>Bienvenido: ".$_SESSION['user']."</h1>";
        }else{
            echo "<script>alert('ERROR!!! No iniciada la sesión.')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }

    comprobarSession();

    echo "<hr>";
    echo "<h3>Estos son los datos de la sesión:</h3>";
    echo "<p>Nombre de la sesión: ".session_name()."</p>";
    echo "<p>Identificador de la sesión: " . session_id()."</p>";
    echo "<p>El usuario es: " . $_SESSION['userName'];
    echo "<p>El Token es: " . $_SESSION['user'];

    echo "<a href='verDatos.php'><button>Ver Datos Usuario</button></a>";
    echo "<a href='cambiarPassword.php'><button>Cambiar Password</button></a>";
    echo "<a href='fin.php'><button>Cerrar sesión</button></a>";


?>


</body>
</html>

