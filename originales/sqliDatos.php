<html>
<head>

    <script>
        function irInicio() {
            window.location.href = "fin.php";
        }
    </script>
</head>
<body>

<?php
    session_start();
    //VERIFICAMOS QUE EL USUARIO HUBIERA REALIZADO EL PROCESO DE IDENTIFICACIÓN.
    //SI NO SE HA IDENTIFICADO, MUESTRA UN MENSAJE DE ERROR Y REDIRIGE A LA PÁGINA DE INICIO
    if(!empty($_SESSION['username'])) {
        echo 'Hola, soy el usuario: '. $_SESSION['username'];
    } else {
        echo '<script>alert("ERROR!!!!! DEBE iniciar la sesión");</script>';
        echo "<script> window.location='sqli.php.php';</script>";
    }
?>
    <input type="button" value="FINALIZAR MATRICULACIÓN" onclick="irInicio();"/>
</body>
</html>