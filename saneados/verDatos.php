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

        }else{
            echo "<script>alert('ERROOOR. TOKEN NO SE PUEDE CAMBIAR')</script>";
            echo "<script>window.location='index.php'</script>";
        }

        echo "<hr>";

        include 'mostrarDatosUsuario.php';

?>


</body>
</html>
