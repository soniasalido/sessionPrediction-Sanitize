<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
    session_start();
    session_unset();
    session_destroy();
?>
    <div>
        <h4>Conexión cerrada.</h4>
        <hr>
        <h3>Gracias por su visita.</h3>
        <p>Haz click en el botón para volver a la página de inicio</p>
        <a href="index.php"><button>Volver a inicio</button></a>
    </div>

</body>
</html>

