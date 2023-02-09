<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        session_regenerate_id();
    ?>


    <form action="compruebaAcceso.php" method="post">
        Login: <input type="text" name="user">
        Pass: <input type="text" name="pass">
        <input type="submit">
    </form>

    
    <?php
        if (isset($_SESSION['userName'])) {
            echo "<script>alert('Ya has iniciado la sesión. No puedes estar aqui');</script>";
            echo "<script> window.location='verDatos.php';</script>";
        }
    ?>



</body>
</html>