<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

    session_start();
    include 'compruebaSesion.php';


    echo "<hr>";
    echo "<h3>Estos son los datos de la sesión:</h3>";
    echo "<p>Nombre de la sesión: ".session_name()."</p>";
    echo "<p>Identificador de la sesión: " . session_id()."</p>";
    echo "<p>El usuario es: " . $_SESSION['userName'];
    echo "<p>El Token es: " . $_SESSION['token'];



    echo "<a href='verDatos.php'><button>Ver Datos Usuario</button></a>";
    echo "<a href='cambiarPassword.php'><button>Cambiar Password</button></a>";
    echo "<a href='fin.php'><button>Cerrar sesión</button></a>";
    echo "<a href='cambiarToken.php'><button>Cambiar Token</button></a>";


?>


</body>
</html>

